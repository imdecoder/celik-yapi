<?php

namespace App\Controllers\Admin\Catalog;
use Symfony\Component\HttpFoundation\Request;
use Ausi\SlugGenerator\SlugGenerator;
use PDO;
use Exception;

use App\Controllers\Admin;

class Categories extends Admin
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
		$this->data['meta']['title'] = 'Ürün Kategorileri';
		$this->where = 'c.deleted_at IS NULL';

		return $this->list($request);
	}

	public function active(Request $request)
	{
		$this->data['meta']['title'] = 'Aktif Ürün Kategorileri';
		$this->where = '(c.status = 1 AND c.deleted_at IS NULL)';

		return $this->list($request);
	}

	public function passive(Request $request)
	{
		$this->data['meta']['title'] = 'Pasif Ürün Kategorileri';
		$this->where = '(c.status = 0 AND c.deleted_at IS NULL)';

		return $this->list($request);
	}

	public function trash(Request $request)
	{
		$this->data['meta']['title'] = 'Silinen Ürün Kategorileri';
		$this->where = 'c.deleted_at IS NOT NULL';

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
				c.id AS id,
				c.name AS name,
				c.slug AS slug,
				c.image AS image,
				c.priorty AS priorty,
				c.status AS status,
				c.created_at AS created_at,
				c.deleted_at AS deleted_at,
				pc.id AS parent_id,
				pc.name AS parent_name
			FROM product_categories c
			LEFT JOIN product_categories pc ON pc.id = c.parent_id
			WHERE
				" . $this->where . "
		";

		$search = $request->get('q');
		$parent = $request->get('parent');
		$date = $request->get('date');

		if ($search)
		{
			$sql .= "
				AND c.name LIKE '%{$search}%'
			";
		}

		if ($parent)
		{
			$sql .= "
				AND c.parent_id = '{$parent}'
			";
		}

		if ($date)
		{
			$sql .= "
				AND DATE(c.created_at) = '{$date}'
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
				ORDER BY
					c.priorty ASC,
					c.id DESC
				LIMIT {$limit}, {$list}
			";
		}

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		$this->data['pagination'] = [
			'page' => $page,
			'total' => $total,
			'pages' => $this->pagination($page, $list, $total)
		];

		$this->data['categories'] = $query;
		$this->data['parents'] = $this->categories();

		$this->data['search'] = $search;
		$this->data['parent'] = $parent;
		$this->data['date'] = $date;

		return $this->view('admin.pages.catalog.categories.index', $this->data);
	}

	public function categories($id = null)
	{
		$data = [];

		$sql = "
			SELECT
				id,
				name
			FROM product_categories
			WHERE
				(status = 1 AND deleted_at IS NULL)
		";

		if ($id)
		{
			$sql .= "
				AND id != '{$id}'
			";
		}

		$sql .= "
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
			FROM product_categories
		";

		$queryTotal = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM product_categories
			WHERE
				(status = 1 AND deleted_at IS NULL)
		";

		$queryActive = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM product_categories
			WHERE
				(status = 0 AND deleted_at IS NULL)
		";

		$queryPassive = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM product_categories
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
		$this->data['meta']['title'] = 'Ürün Kategorisi Ekle';

		$categories = $this->categories();

		$error = [];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'name'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();

				$generator = new SlugGenerator;

				$name = $data['name'];
				$slug = $generator->generate($name);
				$parent_id = $data['parent_id'];
				$status = $data['status'];
				$description = $data['description'];

				$image = NULL;

				if (!$name)
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
						->to('uploads/images/original/categories');

						$image = $upload->getFile();

						$upload->rename($slug)
						->resize(600, 600)
						->to('uploads/images/cache/categories/600x600');

						$upload->rename($slug)
						->resize(40, 40)
						->to('uploads/images/cache/categories/40x40');
					}

					$sql = "
						SELECT
							id
						FROM product_categories
						WHERE slug = '{$slug}'
					";

					$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

					if ($query)
					{
						$error = [
							'class' => 'warning',
							'text' => '<strong>Uyarı!</strong> Ürün kategorisi için oluşturulan benzersiz isim daha önce kullanılmış olamaz.'
						];
					}
					else
					{
						$user = $this->data['logged_user'];

						$sql = "
							INSERT INTO product_categories SET
							name = ?,
							slug = ?,
							description = ?,
							image = ?,
							parent_id = ?,
							status = ?,
							created_by = ?,
							updated_by = ?
						";

						$query = $this->db->prepare($sql);

						$insert = $query->execute([
							$name,
							$slug,
							$description,
							$image,
							$parent_id,
							$status,
							$user->id,
							$user->id
						]);

						if ($insert)
						{
							$id = $this->db->lastInsertId();

							header('Location: ' . site_url('admin/catalog/categories/edit/' . $id . '?action=create'));
							exit;
						}
						else
						{
							$error = [
								'class' => 'danger',
								'text' => '<strong>Hata!</strong> Bir sorun oluştu ve ürün kategorisi eklenemedi.'
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

		$this->data['error'] = $error;

		return $this->view('admin.pages.catalog.categories.add', $this->data);
	}

	public function edit($id, Request $request)
	{
		$this->data['meta']['title'] = 'Ürün Kategorisi Düzenle';

		$action = $request->get('action');

		$category = [];

		$sql = "
			SELECT
				id,
				name,
				slug,
				description,
				image,
				parent_id,
				status,
				deleted_at
			FROM product_categories
			WHERE
				id = '{$id}'
		";

		$category = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		if (!$category)
		{
			header('Location: ' . site_url('admin/catalog/categories'));
			exit;
		}

		$categories = $this->categories($id);

		$error = [];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'name'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();

				$generator = new SlugGenerator;

				$name = $data['name'];
				$slug = $generator->generate($name);
				$parent_id = $data['parent_id'];
				$status = isset($data['status']) ? 1 : 0;
				$description = $data['description'];

				$image = $category->image;

				if (!$name)
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
						->to('uploads/images/original/categories');

						$image = $upload->getFile();

						$upload->rename($slug)
						->resize(600, 600)
						->to('uploads/images/cache/categories/600x600');

						$upload->rename($slug)
						->resize(40, 40)
						->to('uploads/images/cache/categories/40x40');
					}

					$sql = "
						SELECT
							id
						FROM product_categories
						WHERE
							slug = '{$slug}'
							AND
							id != '{$id}'
					";

					$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

					if ($query)
					{
						$error = [
							'class' => 'warning',
							'text' => '<strong>Uyarı!</strong> Ürün kategorisi için oluşturulan benzersiz isim daha önce kullanılmış olamaz.'
						];
					}
					else
					{
						$user = $this->data['logged_user'];

						$sql = "
							UPDATE product_categories SET
								name = :name,
								slug = :slug,
								description = :description,
								image = :image,
								parent_id = :parent_id,
								status = :status,
								updated_by = :updated_by,
								updated_at = :updated_at
							WHERE id = :id
						";

						$query = $this->db->prepare($sql);

						$update = $query->execute([
							'name' => $name,
							'slug' => $slug,
							'description' => $description,
							'image' => $image,
							'parent_id' => $parent_id,
							'status' => $status,
							'updated_by' => $user->id,
							'updated_at' => date('Y-m-d H:i:s'),
							'id' => $id
						]);

						if ($update)
						{
							header('Location: ' . site_url('admin/catalog/categories/edit/' . $id . '?action=update'));
							exit;
						}
						else
						{
							$error = [
								'class' => 'danger',
								'text' => '<strong>Hata!</strong> Bir sorun oluştu ve ürün kategorisi eklenemedi.'
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

		$this->data['category'] = $category;
		$this->data['categories'] = $categories;

		$this->data['error'] = $error;
		$this->data['action'] = $action;

		return $this->view('admin.pages.catalog.categories.edit', $this->data);
	}

	public function delete($id)
	{
		$result = [];

		$this->data['meta']['title'] = 'Ürün Kategorisi Sil';

		$user = $this->data['logged_user'];

		$sql = "
			UPDATE product_categories SET
				deleted_by = :deleted_by,
				deleted_at = :deleted_at
			WHERE id = :id
		";

		$query = $this->db->prepare($sql);

		$update = $query->execute([
			'deleted_by' => $user->id,
			'deleted_at' => date('Y-m-d H:i:s'),
			'id' => $id
		]);

		$sql = "
			SELECT
				name
			FROM product_categories
			WHERE
				id = '{$id}'
		";

		$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);
		$name = NULL;

		if ($query)
		{
			$name = $query->name;
		}

		if ($update)
		{
			$result = [
				'class' => 'success',
				'text' => '<strong>Başarılı!</strong> Ürün kategorisi <strong>"' . $name . '"</strong> olan kategori başarılı bir şekilde silindi.'
			];
		}
		else
		{
			$result = [
				'class' => 'danger',
				'text' => '<strong>Hata!</strong> Bir hata oluştu ve <strong>"' . $name . '"</strong> ürün kategorisi silinemedi.'
			];
		}

		$this->data['result'] = $result;

		return $this->view('admin.pages.catalog.categories.action', $this->data);
	}

	public function deleteForce($id)
	{
		$result = [];

		$this->data['meta']['title'] = 'Ürün Kategorisini Tamamen Sil';

		$sql = "
			SELECT
				name,
				image
			FROM product_categories
			WHERE
				id = '{$id}'
		";

		$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);
		$name = NULL;

		if ($query)
		{
			$name = $query->name;
			$image = $query->image;

			try
			{
				unlink('./uploads/images/original/categories/' . $image);
				unlink('./uploads/images/cache/categories/600x600/' . $image);
				unlink('./uploads/images/cache/categories/40x40/' . $image);
			}
			catch (Exception $e)
			{
				// bla bla
			}
		}
		else
		{
			header('Location: ' . site_url('admin/catalog/categories'));
			exit;
		}

		$sql = "
			DELETE FROM product_categories
			WHERE id = :id
		";

		$query = $this->db->prepare($sql);

		$delete = $query->execute([
			'id' => $id
		]);

		if ($delete)
		{
			$result = [
				'class' => 'success',
				'text' => '<strong>Başarılı!</strong> Ürün kategorisi <strong>"' . $name . '"</strong> olan kategori başarılı bir şekilde tamamen silindi.'
			];
		}
		else
		{
			$result = [
				'class' => 'danger',
				'text' => '<strong>Hata!</strong> Bir hata oluştu ve <strong>"' . $name . '"</strong> ürün kategorisi tamamen silinemedi.'
			];
		}

		$this->data['result'] = $result;

		return $this->view('admin.pages.catalog.categories.action', $this->data);
	}
	
	public function restore($id)
	{
		$result = [];

		$this->data['meta']['title'] = 'Kategori Kurtar';

		$sql = "
			SELECT
				name
			FROM product_categories
			WHERE
				id = '{$id}'
		";

		$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);
		$name = NULL;

		if ($query)
		{
			$name = $query->name;
			$user = $this->data['logged_user'];

			$sql = "
				UPDATE product_categories SET
					updated_by = :updated_by,
					updated_at = :updated_at,
					deleted_by = :deleted_by,
					deleted_at = :deleted_at
				WHERE id = :id
			";

			$query = $this->db->prepare($sql);

			$update = $query->execute([
				'updated_by' => $user->id,
				'updated_at' => date('Y-m-d H:i:s'),
				'deleted_by' => NULL,
				'deleted_at' => NULL,
				'id' => $id
			]);

			if ($update)
			{
				$result = [
					'class' => 'success',
					'text' => '<strong>Başarılı!</strong> Ürün kategorisi <strong>"' . $name . '"</strong> olan kategori başarılı bir şekilde kurtarıldı.'
				];
			}
			else
			{
				$result = [
					'class' => 'danger',
					'text' => '<strong>Hata!</strong> Ürün kategorisi <strong>"' . $name . '"</strong> olan kategori kurtarılamadı.'
				];
			}
		}
		else
		{
			header('Location: ' . site_url('admin/catalog/categories'));
			exit;
		}

		$this->data['result'] = $result;

		return $this->view('admin.pages.catalog.categories.action', $this->data);
	}

	public function priorty()
	{
		$this->data['meta']['title'] = 'Ürün Kategori Sıralama';

		$sql = "
			SELECT
				id,
				name,
				image,
				priorty
			FROM product_categories
			WHERE
				status = 1 AND deleted_at IS NULL
			ORDER BY
				priorty ASC,
				id DESC
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		$this->data['categories'] = $query;

		return $this->view('admin.pages.catalog.categories.priorty', $this->data);
	}
}
