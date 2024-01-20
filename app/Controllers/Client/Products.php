<?php

namespace App\Controllers\Client;

use App\Controllers\Client;
use Symfony\Component\HttpFoundation\Request;
use PDO;

class Products extends Client
{
	public $list;

	public function __construct()
	{
		parent::__construct();

		$this->list = 12;
	}

	public function index(Request $request)
	{
		$this->data['meta']['title'] = 'Ürünler';
		$this->data['meta']['description'] = 'Açıklama.';

		$this->data['list'] = $this->list($request);

		return $this->view('client.pages.products.index', $this->data);
	}

	public function trends(Request $request)
	{
		$this->data['meta']['title'] = 'Trend Ürünler';
		$this->data['meta']['description'] = 'Açıklama.';

		$this->data['list'] = $this->list($request);

		return $this->view('client.pages.products.trends', $this->data);
	}

	public function list($request)
	{
		$data = [];

		$list = $this->list;
		$page = $request->get('s') ? (int) $request->get('s') : 1;

		$this->data['limit'] = $list;

		if ($page < 1)
		{
			$page = 1;
		}

		$sql = "
			SELECT
				p.code AS code,
				p.name AS name,
				p.slug AS slug,
				p.price AS price,
				p.discount AS discount,
				p.image AS image
			FROM products p
			INNER JOIN product_vendors pv ON pv.id = p.vendor_id
			INNER JOIN product_categories pc ON pc.id = p.category_id
			WHERE
				(p.status = 1 AND p.deleted_at IS NULL)
		";

		$vendor = $request->get('marka');
		$category = $request->get('kategori');
		$sort = $request->get('sirala');

		if ($vendor)
		{
			$sql .= "
				AND pv.slug = '{$vendor}'
			";
		}

		if ($category)
		{
			$sql .= "
				AND pc.slug = '{$category}'
			";
		}

		$order = NULL;
		$sort_name = NULL;

		switch ($sort)
		{
			case 'populer':
				$order = "p.view DESC";
				$sort_name = 'En Çok Satanlar';
				break;

			case 'fiyat_yuksek':
				$order = "p.price DESC";
				$sort_name = 'En Yüksek Fiyat';
				break;

			case 'fiyat_dusuk':
				$order = "p.price ASC";
				$sort_name = 'En Düşük Fiyat';
				break;

			default:
				$order = "p.id DESC";
				$sort_name = 'Varsayılan';
				break;
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
				ORDER BY " . $order . "
				LIMIT {$limit}, {$list}
			";
		}

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		$data['pagination'] = [
			'page' => $page,
			'total' => $total,
			'pages' => $this->pagination($page, $list, $total),
			'count' => $count
		];

		$data['products'] = $query;
		$data['vendors'] = $this->vendors();
		$data['categories'] = $this->categories();

		$data['category'] = $category;
		$data['vendor'] = $vendor;
		$data['sort'] = $sort;
		$data['sort_name'] = $sort_name;

		return $data;
	}

	public function vendors()
	{
		$data = [];

		$sql = "
			SELECT
				slug,
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

	public function categories()
	{
		$data = [];

		$sql = "
			SELECT
				slug,
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

	public function detail($slug)
	{
		if (!$slug)
		{
			header('Location: ' . site_url('urunler'));
			exit;
		}

		$product = [];

		$sql = "
			SELECT
				p.id AS id,
				p.code AS code,
				p.name AS name,
				p.slug AS slug,
				p.description AS description,
				p.tags AS tags,
				p.content AS content,
				p.quantity AS quantity,
				p.price AS price,
				p.discount AS discount,
				p.sku AS sku,
				p.image AS image,
				p.view AS view,
				p.featured AS featured,
				v.name AS vendor_name,
				v.slug AS vendor_slug,
				c.id AS category_id,
				c.name AS category_name,
				c.slug AS category_slug
			FROM products p
			INNER JOIN product_vendors v ON v.id = p.vendor_id
			INNER JOIN product_categories c ON c.id = p.category_id
			WHERE
				(p.status = 1 AND p.deleted_at IS NULL)
				AND
				p.slug = '{$slug}'
		";

		$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		if (!$query)
		{
			header('Location: ' . site_url('urunler'));
			exit;
		}

		$product = $query;

		$this->data['meta']['title'] = $product->name;
		$this->data['meta']['description'] = $product->description;

		$this->data['meta']['category'] = [
			'name' => $product->category_name,
			'slug' => $product->category_slug
		];

		$this->data['product'] = $product;
		$this->data['relatedProducts'] = $this->relatedProducts($product->id, $product->category_id);

		return $this->view('client.pages.products.detail', $this->data);
	}

	public function relatedProducts($product_id, $category_id)
	{
		$data = [];

		$sql = "
			SELECT
				code,
				name,
				slug,
				price,
				discount,
				image,
				featured
			FROM products
			WHERE
				(status = 1 AND deleted_at IS NULL)
				AND (
					id != '{$product_id}'
					AND
					category_id = '{$category_id}'
				)
			ORDER BY
				id DESC
			LIMIT 10
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		if ($query->rowCount())
		{
			$data = $query;
		}

		return $data;
	}
}
