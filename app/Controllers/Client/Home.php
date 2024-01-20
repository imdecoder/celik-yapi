<?php

namespace App\Controllers\Client;

use App\Controllers\Client;
use PDO;

class Home extends Client
{
	public $limit;

	public function __construct()
	{
		parent::__construct();

		$this->limit = 9;
	}

	public function index()
	{
		$this->data['meta']['title'] = 'Çelik Yapı';
		$this->data['meta']['description'] = 'Açıklama.';

		$sql = "
			SELECT
				code,
				name,
				slug,
				price,
				discount,
				image
			FROM products
			WHERE
				(status = 1 AND deleted_at IS NULL)
				AND
				price IS NOT NULL
			ORDER BY
				id DESC
			LIMIT " . $this->limit . "
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		$this->data['products'] = $query;

		return $this->view('client.pages.home.index', $this->data);
	}
}
