<?php

namespace App\Controllers\Jobs;

use App\Controllers\Jobs;
use Aspera\Spreadsheet\XLSX\Reader;
use Ausi\SlugGenerator\SlugGenerator;
use Exception;
use PDO;

class Hepsiburada extends Jobs
{
	public function index()
	{
		$reader = new Reader();
		$reader->open('./uploads/files/hepsiburada.xlsx');

		$generator = new SlugGenerator;

		$i = 0;

		foreach ($reader as $row)
		{
			if ($i == 20)
			{
				sleep(10);
				$i = 0;
			}

			$code = hashid();
			$barcode = $row[0];
			$hb_sku = $row[1];
			$hb_code = $row[3];
			$name = $row[4];
			$image = $row[6];
			$vendor = $row[11];
			$category = $row[17];
			$parent_category = $row[18];

			$image = explode('/', $image);
			$image_code = NULL;

			if (isset($image[3]) && isset($image[4]))
			{
				$image_code = $image[3];
				$image_name = $image[4];
				$image_code = explode('_', $image_code);
				$image_code = $image_code[1];
			}	

			$slug = $generator->generate($name) . '_' . $code;

			$imageURL = 'https://productimages.hepsiburada.net/s/' . $image_code . '/1500/' . $image_name;
			$imageDIR = 'uploads/images/original/products';
			$image = $image_code ? $slug . '.jpg' : NULL;

			if (!is_dir($imageDIR))
			{
				mkdir($imageDIR);
			}

			if ($image)
			{
				try
				{
					copy($imageURL, $imageDIR . DIRECTORY_SEPARATOR . $image);
				}
				catch (Exception $e)
				{
					// TODO
				}
			}

			$categoryID = 1;
			$categorySlug = $generator->generate($category);

			$sql = "
				SELECT id
				FROM product_categories
				WHERE slug = '{$categorySlug}'
			";

			$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

			if ($query)
			{
				$categoryID = $query->id;
			}
			else
			{
				$categoryParentSlug = $generator->generate($parent_category);
				$categoryParentID = 0;

				$sql = "
					SELECT id
					FROM product_categories
					WHERE slug = '{$categoryParentSlug}'
				";

				$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if ($query)
				{
					$categoryParentID = $query->id;
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
					$category,
					$categorySlug,
					$categoryParentID,
					1,
					1
				]);

				$categoryID = $this->db->lastInsertId();
			}

			$vendorSlug = $generator->generate($vendor);

			$sql = "
				SELECT id
				FROM product_vendors
				WHERE slug = '{$vendorSlug}'
			";

			$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

			if ($query)
			{
				$vendorID = $query->id;
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
					$vendor,
					$vendorSlug,
					1,
					1
				]);

				$vendorID = $this->db->lastInsertId();
			}

			$sql = "
				INSERT INTO products SET
				code = ?,
				hb_sku = ?,
				hb_code = ?,
				name = ?,
				slug = ?,
				barcode = ?,
				image = ?,
				vendor_id = ?,
				category_id = ?,
				created_by = ?,
				updated_by = ?
			";

			$query = $this->db->prepare($sql);

			$query->execute([
				$code,
				$hb_sku,
				$hb_code,
				$name,
				$slug,
				$barcode,
				$image,
				$vendorID,
				$categoryID,
				1,
				1
			]);

			$i++;
		}

		$reader->close();
	}
}
