<?php

namespace App\Controllers\Client;

use App\Controllers\Client;

class Error extends Client
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['meta']['title'] = 'Sayfa Bulunamadı';
		$this->data['meta']['description'] = null;

		return $this->view('client.pages.error.not-found', $this->data);
	}
}
