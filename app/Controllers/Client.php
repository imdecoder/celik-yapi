<?php

namespace App\Controllers;

use Core\Controller;
use PDO;

class Client extends Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();

		$this->data['navbar_categories'] = $this->navbar_categories();
		$this->data['trend_products'] = $this->trend_products();

		$this->data['cart_products'] = $this->cart_products();

		//unset($_SESSION['cart']);

		/*echo '<pre>';
		print_r($_SESSION['cart']);
		exit;*/
	}

	public function navbar_categories()
	{
		$data = [];

		$sql = "
			SELECT
				name,
				slug
			FROM product_categories
			WHERE
				status = 1 AND deleted_at IS NULL
			ORDER BY
				priorty ASC,
				name ASC,
				id DESC
			LIMIT 5
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		if ($query->rowCount())
		{
			$data = $query;
		}

		return $data;
	}

	public function trend_products()
	{
		$data = [];

		$sql = "
			SELECT
				name,
				slug
			FROM products
			WHERE
				status = 1 AND deleted_at IS NULL
			ORDER BY
				view DESC
			LIMIT 5
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		if ($query->rowCount())
		{
			$data = $query;
		}

		return $data;
	}

	public function cart_products()
	{
		$data = [];

		if (isset($_SESSION['cart']))
		{
			$data = $_SESSION['cart'];
		}

		return $data;
	}
}
