<?php

namespace App\Controllers\Admin\Catalog;

use App\Controllers\Admin;
use Symfony\Component\HttpFoundation\Request;
use Ausi\SlugGenerator\SlugGenerator;
use PDO;
use Exception;

class Products extends Admin
{
	public $list;

	public $where;

	public function __construct()
	{
		parent::__construct();

		$this->list = 10;
		$this->where = NULL;

		$this->data['catalog'] = $this->catalog();
	}

	public function index(Request $request)
	{
		$this->data['meta']['title'] = 'Ürünler';
		$this->where = 'p.deleted_at IS NULL';

		return $this->list($request);
	}

	public function active(Request $request)
	{
		$this->data['meta']['title'] = 'Aktif Ürünler';
		$this->where = '(p.status = 1 AND p.deleted_at IS NULL)';

		return $this->list($request);
	}

	public function passive(Request $request)
	{
		$this->data['meta']['title'] = 'Pasif Ürünler';
		$this->where = '(p.status = 0 AND p.deleted_at IS NULL)';

		return $this->list($request);
	}

	public function trash(Request $request)
	{
		$this->data['meta']['title'] = 'Silinen Ürünler';
		$this->where = 'p.deleted_at IS NOT NULL';

		return $this->list($request);
	}

	public function list($request)
	{
		$list = $this->list;
		$page = $request->get('p') ? (int) $request->get('p') : 1;

		if ($page < 1)
		{
			$page = 1;
		}

		$sql = "
			SELECT
				p.code AS code,
				p.hb_sku AS hb_sku,
				p.hb_sku AS hb_code,
				p.name AS name,
				p.slug AS slug,
				p.quantity AS quantity,
				p.price AS price,
				p.discount AS discount,
				p.image AS image,
				p.status AS status,
				p.deleted_at AS deleted_at,
				pv.id AS vendor_id,
				pv.name AS vendor_name
			FROM products p
			INNER JOIN product_vendors pv ON pv.id = p.vendor_id
			WHERE
				" . $this->where . "
		";

		$search = $request->get('q');
		$code = $request->get('code');
		$category = $request->get('category');
		$vendor = $request->get('vendor');
		$price = $request->get('price') ? (float) $request->get('price') : NULL;
		$date = $request->get('date');

		if ($search)
		{
			$sql .= "
				AND (
					p.name LIKE '%{$search}%'
					OR
					pv.name LIKE '%{$search}%'
				)
			";
		}

		if ($code)
		{
			$sql .= "
				AND p.code LIKE '%{$code}%'
			";
		}
		
		if ($category)
		{
			$sql .= "
				AND p.category_id = '{$category}'
			";
		}

		if ($vendor)
		{
			$sql .= "
				AND p.vendor_id = '{$vendor}'
			";
		}

		if ($price)
		{
			$sql .= "
				AND (
					p.price = '{$price}'
					OR
					p.discount = '{$price}'
				)
			";
		}

		if ($date)
		{
			$sql .= "
				AND DATE(p.created_at) = '{$date}'
			";
		}

		$count = $this->db->query($sql, PDO::FETCH_OBJ)->rowCount();
		$total = ceil($count / $list);

		if ($page > $total)
		{
			$page = $total;
		}

		$limit = ($page - 1) * $list;

		if ($count)
		{
			$sql .= "
				ORDER BY p.id DESC
				LIMIT {$limit}, {$list}
			";
		}

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		$this->data['pagination'] = [
			'page' => $page,
			'total' => $total,
			'pages' => $this->pagination($page, $list, $total)
		];

		$this->data['products'] = $query;
		$this->data['categories'] = $this->categories();
		$this->data['vendors'] = $this->vendors();

		$this->data['search'] = $search;
		$this->data['code'] = $code;
		$this->data['category'] = $category;
		$this->data['vendor'] = $vendor;
		$this->data['price'] = $price;
		$this->data['date'] = $date;

		return $this->view('admin.pages.catalog.products.index', $this->data);
	}

	public function categories()
	{
		$data = [];

		$sql = "
			SELECT
				id,
				name
			FROM product_categories
			WHERE
				status = 1 AND deleted_at IS NULL
			ORDER BY
				priorty ASC,
				name ASC,
				id DESC
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		if ($query->rowCount())
		{
			$data = $query;
		}

		return $data;
	}

	public function vendors()
	{
		$data = [];

		$sql = "
			SELECT
				id,
				name
			FROM product_vendors
			WHERE
				status = 1 AND deleted_at IS NULL
			ORDER BY
				priorty ASC,
				name ASC,
				id DESC
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		if ($query->rowCount())
		{
			$data = $query;
		}

		return $data;
	}

	public function pagination($page, $list, $total)
	{
		$data = [];

		$pages_little_middle = ceil($list / 2);
		$pages_more_middle = ($total + 1) - $pages_little_middle;

		$pages_middle = $page;

		if ($pages_middle < $pages_little_middle)
		{
			$pages_middle = $pages_little_middle;
		}

		if ($pages_middle > $pages_more_middle)
		{
			$pages_middle = $pages_more_middle;
		}

		$pages_left = round($pages_middle - (($list - 1) / 2));
		$pages_right = round((($list - 1) / 2) + $pages_middle);

		if ($pages_left < 1)
		{
			$pages_left = 1;
		}

		if ($pages_right > $total)
		{
			$pages_right = $total;
		}

		$data = [
			'left' => $pages_left,
			'right' => $pages_right
		];

		return $data;
	}

	public function catalog()
	{
		$data = [];

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM products
		";

		$queryTotal = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM products
			WHERE
				(status = 1 AND deleted_at IS NULL)
		";

		$queryActive = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM products
			WHERE
				(status = 0 AND deleted_at IS NULL)
		";

		$queryPassive = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM products
			WHERE
				deleted_at IS NOT NULL
		";

		$queryTrash = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$data = [
			'total' => $queryTotal->count,
			'active' => $queryActive->count,
			'passive' => $queryPassive->count,
			'trash' => $queryTrash->count
		];

		return $data;
	}

	public function add(Request $request)
	{
		$this->data['meta']['title'] = 'Ürün Ekle';

		$categories = $this->categories();
		$vendors = $this->vendors();

		$error = [];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'name',
					'category',
					'vendor'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();

				$generator = new SlugGenerator;

				$code = hashid();
				$name = $data['name'];
				$slug = $generator->generate($name) . '_' . $code;
				$content = $data['content'];
				$quantity = $data['quantity'];
				$price = $data['price'] > 0 ? $data['price'] : NULL;
				$discount = $data['discount'] > 0 ? $data['discount'] : NULL;
				$sku = $data['sku'];
				$barcode = $data['barcode'];
				$vendor = $data['vendor'];
				$category = $data['category'];
				$status = $data['status'];
				$description = $data['description'];

				$image = NULL;

				if (!$name || !$category || !$vendor)
				{
					$error = [
						'class' => 'warning',
						'text' => '<strong>Uyarı!</strong> Lütfen gerekli alanları doldurun.'
					];
				}
				else
				{
					$upload = upload('image')->onlyImages();

					if (!$upload->error())
					{
						$upload->rename($slug)
						->to('uploads/images/original/products');

						$image = $upload->getFile();

						$upload->rename($slug)
						->resize(600, 600)
						->to('uploads/images/cache/products/600x600');

						$upload->rename($slug)
						->resize(40, 40)
						->to('uploads/images/cache/products/40x40');
					}

					$sql = "
						SELECT
							id
						FROM products
						WHERE code = '{$code}'
					";

					$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

					if ($query)
					{
						$error = [
							'class' => 'warning',
							'text' => '<strong>Uyarı!</strong> Ürün için oluşturulan kod daha önce kullanılmış olamaz.'
						];
					}
					else
					{
						$user = $this->data['logged_user'];

						$sql = "
							INSERT INTO products SET
							code = ?,
							name = ?,
							slug = ?,
							description = ?,
							content = ?,
							quantity = ?,
							price = ?,
							discount = ?,
							sku = ?,
							barcode = ?,
							image = ?,
							vendor_id = ?,
							category_id = ?,
							featured = ?,
							status = ?,
							created_by = ?,
							updated_by = ?
						";

						$query = $this->db->prepare($sql);

						$insert = $query->execute([
							$code,
							$name,
							$slug,
							$description,
							$content,
							$quantity,
							$price,
							$discount,
							$sku,
							$barcode,
							$image,
							$vendor,
							$category,
							0, // Featured
							$status,
							$user->id,
							$user->id
						]);

						if ($insert)
						{
							header('Location: ' . site_url('admin/catalog/products/edit/' . $code . '?action=create'));
							exit;
						}
						else
						{
							$error = [
								'class' => 'danger',
								'text' => '<strong>Hata!</strong> Bir sorun oluştu ve ürün eklenemedi.'
							];
						}
					}
				}
			}
			else
			{
				$error = [
					'class' => 'warning',
					'text' => '<strong>Uyarı!</strong> Lütfen gerekli alanları doldurun.'
				];
			}
		}

		$this->data['categories'] = $categories;
		$this->data['vendors'] = $vendors;

		$this->data['error'] = $error;

		return $this->view('admin.pages.catalog.products.add', $this->data);
	}

	public function edit($code, Request $request)
	{
		$this->data['meta']['title'] = 'Ürün Düzenle';

		$action = $request->get('action');

		$product = [];

		$sql = "
			SELECT
				id,
				code,
				name,
				slug,
				description,
				content,
				quantity,
				price,
				discount,
				sku,
				barcode,
				image,
				vendor_id,
				category_id,
				featured,
				status,
				deleted_at
			FROM products
			WHERE
				code = '{$code}'
		";

		$product = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		if (!$product)
		{
			header('Location: ' . site_url('admin/catalog/products'));
			exit;
		}

		$categories = $this->categories();
		$vendors = $this->vendors();

		$error = [];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'name',
					'category',
					'vendor'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();

				$generator = new SlugGenerator;

				$name = $data['name'];
				$slug = $generator->generate($name) . '_' . $code;
				$content = $data['content'];
				$quantity = $data['quantity'];
				$price = $data['price'] > 0 ? $data['price'] : NULL;
				$discount = $data['discount'] > 0 ? $data['discount'] : NULL;
				$sku = $data['sku'];
				$barcode = $data['barcode'];
				$vendor = $data['vendor'];
				$category = $data['category'];
				$status = isset($data['status']) ? 1 : 0;
				$description = $data['description'];

				$image = $product->image;

				if (!$name || !$category || !$vendor)
				{
					$error = [
						'class' => 'warning',
						'text' => '<strong>Uyarı!</strong> Lütfen gerekli alanları doldurun.'
					];
				}
				else
				{
					$upload = upload('image')->onlyImages();

					if (!$upload->error())
					{
						$upload->rename($slug)
						->to('uploads/images/original/products');

						$image = $upload->getFile();

						$upload->rename($slug)
						->resize(600, 600)
						->to('uploads/images/cache/products/600x600');

						$upload->rename($slug)
						->resize(40, 40)
						->to('uploads/images/cache/products/40x40');
					}

					$id = $product->id;

					$sql = "
						SELECT
							id
						FROM products
						WHERE
							code = '{$code}'
							AND
							id != '{$id}'
					";

					$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

					if ($query)
					{
						$error = [
							'class' => 'warning',
							'text' => '<strong>Uyarı!</strong> Ürün için oluşturulan kod daha önce kullanılmış olamaz.'
						];
					}
					else
					{
						$user = $this->data['logged_user'];

						$sql = "
							UPDATE products SET
								name = :name,
								slug = :slug,
								description = :description,
								content = :content,
								quantity = :quantity,
								price = :price,
								discount = :discount,
								sku = :sku,
								barcode = :barcode,
								image = :image,
								vendor_id = :vendor_id,
								category_id = :category_id,
								featured = :featured,
								status = :status,
								updated_by = :updated_by,
								updated_at = :updated_at
							WHERE code = :code
						";

						$query = $this->db->prepare($sql);

						$update = $query->execute([
							'name' => $name,
							'slug' => $slug,
							'description' => $description,
							'content' => $content,
							'quantity' => $quantity,
							'price' => $price,
							'discount' => $discount,
							'sku' => $sku,
							'barcode' => $barcode,
							'image' => $image,
							'vendor_id' => $vendor,
							'category_id' => $category,
							'featured' => 0, // TODO: Featured
							'status' => $status,
							'updated_by' => $user->id,
							'updated_at' => date('Y-m-d H:i:s'),
							'code' => $code
						]);

						if ($update)
						{
							header('Location: ' . site_url('admin/catalog/products/edit/' . $code . '?action=update'));
							exit;
						}
						else
						{
							$error = [
								'class' => 'danger',
								'text' => '<strong>Hata!</strong> Bir sorun oluştu ve ürün eklenemedi.'
							];
						}
					}
				}
			}
			else
			{
				$error = [
					'class' => 'warning',
					'text' => '<strong>Uyarı!</strong> Lütfen gerekli alanları doldurun.'
				];
			}
		}

		$this->data['product'] = $product;
		$this->data['categories'] = $categories;
		$this->data['vendors'] = $vendors;

		$this->data['error'] = $error;
		$this->data['action'] = $action;

		return $this->view('admin.pages.catalog.products.edit', $this->data);
	}

	public function delete($code)
	{
		$result = [];

		$this->data['meta']['title'] = 'Ürün Sil';

		$user = $this->data['logged_user'];

		$sql = "
			UPDATE products SET
				deleted_by = :deleted_by,
				deleted_at = :deleted_at
			WHERE code = :code
		";

		$query = $this->db->prepare($sql);

		$update = $query->execute([
			'deleted_by' => $user->id,
			'deleted_at' => date('Y-m-d H:i:s'),
			'code' => $code
		]);

		if ($update)
		{
			$result = [
				'class' => 'success',
				'text' => '<strong>Başarılı!</strong> Ürün kodu <strong>"' . $code . '"</strong> olan ürün başarılı bir şekilde silindi.'
			];
		}
		else
		{
			$result = [
				'class' => 'danger',
				'text' => '<strong>Hata!</strong> Bir hata oluştu ve <strong>"' . $code . '"</strong> kodlu ürün silinemedi.'
			];
		}

		$this->data['result'] = $result;

		return $this->view('admin.pages.catalog.products.action', $this->data);
	}

	public function deleteForce($code)
	{
		$result = [];

		$this->data['meta']['title'] = 'Ürünü Tamamen Sil';

		$sql = "
			SELECT
				image
			FROM products
			WHERE
				code = '{$code}'
		";

		$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		if ($query)
		{
			$image = $query->image;

			try
			{
				unlink('./uploads/images/original/products/' . $image);
				unlink('./uploads/images/cache/products/600x600/' . $image);
				unlink('./uploads/images/cache/products/40x40/' . $image);
			}
			catch (Exception $e)
			{
				// bla bla
			}
		}

		$sql = "
			DELETE FROM products
			WHERE code = :code
		";

		$query = $this->db->prepare($sql);

		$delete = $query->execute([
			'code' => $code
		]);

		if ($delete)
		{
			$result = [
				'class' => 'success',
				'text' => '<strong>Başarılı!</strong> Ürün kodu <strong>"' . $code . '"</strong> olan ürün başarılı bir şekilde tamamen silindi.'
			];
		}
		else
		{
			$result = [
				'class' => 'danger',
				'text' => '<strong>Hata!</strong> Bir hata oluştu ve <strong>"' . $code . '"</strong> kodlu ürün tamamen silinemedi.'
			];
		}

		$this->data['result'] = $result;

		return $this->view('admin.pages.catalog.products.action', $this->data);
	}
	
	public function restore($code)
	{
		$result = [];

		$this->data['meta']['title'] = 'Ürün Kurtar';

		$user = $this->data['logged_user'];

		$sql = "
			UPDATE products SET
				updated_by = :updated_by,
				updated_at = :updated_at,
				deleted_by = :deleted_by,
				deleted_at = :deleted_at
			WHERE code = :code
		";

		$query = $this->db->prepare($sql);

		$update = $query->execute([
			'updated_by' => $user->id,
			'updated_at' => date('Y-m-d H:i:s'),
			'deleted_by' => NULL,
			'deleted_at' => NULL,
			'code' => $code
		]);

		if ($update)
		{
			$result = [
				'class' => 'success',
				'text' => '<strong>Başarılı!</strong> Ürün kodu <strong>"' . $code . '"</strong> olan ürün başarılı bir şekilde kurtarıldı.'
			];
		}
		else
		{
			$result = [
				'class' => 'danger',
				'text' => '<strong>Hata!</strong> Bir hata oluştu ve <strong>"' . $code . '"</strong> kodlu ürün kurtarılamadı.'
			];
		}

		$this->data['result'] = $result;

		return $this->view('admin.pages.catalog.products.action', $this->data);
	}
}
