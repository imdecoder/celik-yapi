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

		$this->data['logged_user'] = $this->user();
		$this->data['logged_customer'] = $this->customer();

		$this->data['navbar_categories'] = $this->navbar_categories();
		$this->data['trend_products'] = $this->trend_products();

		$this->data['cart_products'] = $this->cart_products();

		//unset($_SESSION['cart']);

		/*echo '<pre>';
		print_r($_SESSION['cart']);
		exit;*/
	}

	public function user()
	{
		$data = [];

		if (session()->segment->get('admin_login'))
		{
			$id = session()->segment->get('user_id');

			$data['id'] = $id;
		}

		return (object) $data;
	}

	public function customer()
	{
		$data = [];

		if (session()->segment->get('customer_login'))
		{
			$id = session()->segment->get('customer_id');

			$sql = "
				SELECT
					c.email AS email,
					c.firstname AS firstname,
					c.lastname AS lastname,
					c.avatar AS avatar,
					c.last_seen AS last_seen,
					c.last_seen AS last_seen,
					ca.id AS address_id,
					ca.name AS address_name,
					ca.address_1 AS address_1,
					ca.address_2 AS address_2,
					ca.zip_code AS zip_code,
					ca.address_type AS address_type,
					ci.id AS city_id,
					ci.name AS city_name,
					di.id AS district_id,
					di.name AS district_name
					FROM customers c
				LEFT JOIN customer_addresses ca ON ca.customer_id = c.id
				LEFT JOIN cities ci ON ci.id = ca.city_id
				LEFT JOIN districts di ON di.id = ca.district_id
				WHERE
					(
						(c.status = 1 AND c.deleted_at IS NULL)
						AND
						c.id = '{$id}'
					)
					OR
					(
						ca.status = 1 AND ca.deleted_at IS NULL
					)
			";

			$customer = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

			if ($customer)
			{
				$customer->id = $id;
				$customer->avatar = $customer->avatar ? upload_url('images/cache/customers/40x40/' . $customer->avatar) : asset_url('client/img/avatar.jpg');

				$data = $customer;
			}

			return $data;
		}

		return (object) $data;
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
