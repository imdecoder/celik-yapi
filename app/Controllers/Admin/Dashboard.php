<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin;
use PDO;

class Dashboard extends Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['statistics'] = $this->statistics();
		$this->data['customers'] = $this->customers();
		$this->data['orders'] = $this->orders();

		return $this->view('admin.pages.dashboard.index', $this->data);
	}

	public function statistics()
	{
		$data = [];

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM
				customers
			WHERE
				status = 1 AND deleted_at IS NULL
		";

		$queryCustomers = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM
				product_vendors
			WHERE
				status = 1 AND deleted_at IS NULL
		";

		$queryVendors = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM
				products
			WHERE
				status = 1 AND deleted_at IS NULL
		";

		$queryProducts = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);	

		$sql = "
			SELECT
				COUNT(id) AS count
			FROM
				orders
			WHERE
				deleted_at IS NULL
		";

		$queryOrders = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);	

		$data = [
			'customers' => $queryCustomers->count,
			'vendors' => $queryVendors->count,
			'products' => $queryProducts->count,
			'orders' => $queryOrders->count
		];

		return $data;
	}

	public function customers()
	{
		$data = [];

		$sql = "
			SELECT
				id,
				email,
				firstname,
				lastname,
				avatar
			FROM customers
			WHERE
				status = 1 AND deleted_at IS NULL
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

	public function orders()
	{
		$data = [];

		$sql = "
			SELECT
				o.code AS code,
				o.customer_name AS customer_name,
				o.customer_email AS customer_email,
				o.total AS total,
				os.id AS status_id,
				os.name AS status_name
			FROM orders o
			INNER JOIN order_statuses os ON os.id = o.status_id
			WHERE
				o.deleted_at IS NULL
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
