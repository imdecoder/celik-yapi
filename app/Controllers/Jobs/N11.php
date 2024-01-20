<?php

namespace App\Controllers\Jobs;

use App\Controllers\Jobs;
use Ausi\SlugGenerator\SlugGenerator;
use Laravie\Parser\Xml\Reader;
use Laravie\Parser\Xml\Document;
use PDO;
use Exception;
use Verot\Upload\Upload;

class N11 extends Jobs
{
	public function index()
	{
		$xml = (new Reader(new Document()))->load(upload_url('files/n11.xml'));
		$generator = new SlugGenerator;

		$result = $xml->parse([
			'Urunler' => ['uses' => 'Urun[UrunKodu,Baslik,Aciklama,UrunOnayi,HazirlamaSuresi,Kategori::no>KategoriNo,Kategori::isim>KategoriIsim,Kategori.Ozellikler.Ozellik(::no=::isim)>OzellikBilgileri,Kategori.Ozellikler.Ozellik(::isim=@)>OzellikDetay,Fiyat,Stoklar.Stok.Miktar>Miktar,Stoklar.Stok.StokKodu>StokKodu,Stoklar.Stok.N11KatalogId>N11KatalogId,Resimler.Resim>Resim]']
		]);

		foreach ($result['Urunler'] as $product)
		{
			$Aciklama = preg_replace('/\s+/', ' ', trim(strip_tags($product['Aciklama'])));

			$code = hashid();
			$n11_code = $product['UrunKodu'];
			$n11_catalog_id = $product['N11KatalogId'];
			$name = $product['Baslik'];
			$slug = $generator->generate($name);
			$description = mb_substr($Aciklama, 0, 250, 'utf-8');
			$tags = NULL;
			$content = $Aciklama;
			$quantity = $product['Miktar'];
			$price = $product['Fiyat'];
			$discount_ratio = NULL;
			$sku = NULL;
			$stock_code = $product['StokKodu'];
			$prepare_time = $product['HazirlamaSuresi'];

			$imageURL = $product['Resim'];
			$imageDIR = 'uploads/images/original/products';
			$image = $slug . '_' . hashid() . '.jpg';

			if (!is_dir($imageDIR))
			{
				mkdir($imageDIR);
			}

			try
			{
				copy($imageURL, $imageDIR . DIRECTORY_SEPARATOR . $image);
			}
			catch (Exception $e)
			{
				// TODO
			}

			//$this->thumbnail($image, 600, 600);
			//$this->thumbnail($image, 40, 40);

			$categoryN11_no = $product['KategoriNo'];
			$categoryN11_name = $product['KategoriIsim'];

			$categories = explode(' > ', $categoryN11_name);
			$category_list = [];

			$i = 0;

			foreach ($categories as $category)
			{
				$categoryName = $category;
				$categorySlug = $generator->generate($categoryName);

				$parentID = 0;

				$sql = "
					SELECT id
					FROM product_categories
					WHERE slug = '{$categorySlug}'
				";

				$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if (!$query)
				{
					$categoryParentSlug = $i > 0 ? $generator->generate($categories[$i - 1]) : NULL;

					$sql = "
						SELECT id
						FROM product_categories
						WHERE slug = '{$categoryParentSlug}'
					";

					$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

					if ($query)
					{
						$parentID = $query->id;
					}

					$sql = "
						INSERT INTO product_categories SET
						name = ?,
						slug = ?,
						parent_id = ?,						
						created_by = ?,
						updated_by = ?
					";

					$query = $this->db->prepare($sql);

					$query->execute([
						$categoryName,
						$categorySlug,
						$parentID,
						1,
						1
					]);
				}
				else
				{
					$category_list[] = $query->id;
				}

				/*$categoryParentName = $i > 0 ? $categories[$i - 1] : NULL;
				$categoryParentSlug = $i > 0 ? $generator->generate($categories[$i - 1]) : NULL;*/

				$i++;
			}

			// Default vendor id is "1" as "Diğer"
			$vendor_id = 1;
			$vendorName = 'Diğer';

			foreach ($product['OzellikDetay'] as $key => $value)
			{
				if ($key == 'Marka')
				{
					$vendorName = $value;
					$vendorSlug = $generator->generate($vendorName);

					$sql = "
						SELECT id
						FROM product_vendors
						WHERE slug = '{$vendorSlug}'
					";

					$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

					if ($query)
					{
						$vendor_id = $query->id;
					}
					else
					{
						$sql = "
							INSERT INTO product_vendors SET
							name = ?,
							slug = ?,
							created_by = ?,
							updated_by = ?
						";

						$query = $this->db->prepare($sql);

						$query->execute([
							$vendorName,
							$vendorSlug,
							1,
							1
						]);

						$vendor_id = $this->db->lastInsertId();
					}
				}

				//$attributeName = $key;
				//$attributeValue = $value;

				// TODO: Add the attribute value to database and relate this attribute to the product with update
			}

			/*foreach ($product['OzellikBilgileri'] as $key => $value)
			{
				$attributeId = $key;
				$attributeName = $value;

				// TODO: Add the attribute row to database if not exist
			}*/

			//$status = $product['UrunOnayi'];

			$sql = "
				INSERT INTO products SET
				code = ?,
				n11_code = ?,
				n11_catalog_id = ?,
				name = ?,
				slug = ?,
				description = ?,
				tags = ?,
				content = ?,
				quantity = ?,
				price = ?,
				discount_ratio = ?,
				sku = ?,
				stock_code = ?,
				prepare_time = ?,
				image = ?,
				vendor_id = ?,
				n11_category_no = ?,
				n11_category_name = ?,
				status = ?,
				created_by = ?,
				updated_by = ?
			";

			$query = $this->db->prepare($sql);

			$query->execute([
				$code,
				$n11_code,
				$n11_catalog_id,
				$name,
				$slug . '_' . $code,
				$description,
				$tags,
				$content,
				$quantity,
				$price,
				$discount_ratio,
				$sku,
				$stock_code,
				$prepare_time,
				$image,
				$vendor_id,
				$categoryN11_no,
				$categoryN11_name,
				1,
				1,
				1
			]);

			$product_id = $this->db->lastInsertId();

			foreach ($category_list as $category_id)
			{
				$sql = "
					INSERT INTO product_to_category SET
					category_id = ?,
					product_id = ?
				";

				$query = $this->db->prepare($sql);

				$query->execute([
					$category_id,
					$product_id
				]);
			}
		}
	}

	public function thumbnail($image, $width, $height)
	{
		$handle = new Upload('./uploads/images/original/products/' . $image);
		$name = explode('.', $image);

		$handle->allowed = ['image/*'];
		$handle->file_new_name_body = $name[0];
		$handle->image_convert = 'jpeg';
		$handle->image_resize = true;
		$handle->image_x = $width;
		$handle->image_y = $height;
		$handle->image_ratio_crop = true;
		$handle->process('./uploads/images/cache/products/' . $width . 'x' . $height);

		$handle->clean();
	}
}
