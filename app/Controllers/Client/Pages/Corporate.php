<?php

namespace App\Controllers\Client\Pages;

use App\Controllers\Client\Pages;
use PDO;

class Corporate extends Pages
{
	public function __construct()
	{
		parent::__construct();
	}

	public function about()
	{
		$this->data['meta']['title'] = 'Hakkımızda';
		$this->data['meta']['description'] = 'Açıklama.';

		$vendors = [];

		$sql = "
			SELECT
				name,
				slug
			FROM product_vendors
			WHERE
				status = 1 AND deleted_at IS NULL
			ORDER BY
				priorty ASC,
				name ASC
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		if ($query->rowCount())
		{
			$vendors = $query;
		}

		$this->data['vendors'] = $vendors;

		return $this->view('client.pages.corporate.about', $this->data);
	}

	public function kvkk()
	{
		$this->data['meta']['title'] = 'KVKK Müşteri Aydınlatma';
		$this->data['meta']['description'] = 'Açıklama.';

		return $this->view('client.pages.corporate.kvkk', $this->data);
	}

	public function privacy()
	{
		$this->data['meta']['title'] = 'Gizlilik ve Çerez Politikası';
		$this->data['meta']['description'] = 'Açıklama.';

		return $this->view('client.pages.corporate.privacy', $this->data);
	}
}
