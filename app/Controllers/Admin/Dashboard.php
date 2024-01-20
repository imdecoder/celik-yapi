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

		$data = [
			'customers' => $queryCustomers->count,
			'vendors' => $queryVendors->count,
			'products' => $queryProducts->count,
			'orders' => 0 // TODO: Siparişlerin sayısını getir!
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
		$data = true; // []

		return $data;
	}
}
