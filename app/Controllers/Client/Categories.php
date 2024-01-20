<?php

namespace App\Controllers\Client;

use App\Controllers\Client;
use Symfony\Component\HttpFoundation\Request;
use PDO;

class Categories extends Client
{
	public $list;

	public function __construct()
	{
		parent::__construct();

		$this->list = 6;
	}

	public function index(Request $request)
	{
		$this->data['meta']['title'] = 'Kategoriler';
		$this->data['meta']['description'] = 'Açıklama.';

		return $this->view('client.pages.categories.index', $this->data);
	}

	public function list($slug)
	{
		$this->data['meta']['title'] = 'Kategori Adı';
		$this->data['meta']['description'] = 'Açıklama.';

		return $this->view('client.pages.categories.list', $this->data);
	}
}
