<?php

namespace App\Controllers\Client;

use App\Controllers\Client;

class Contact extends Client
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['meta']['title'] = 'İletişim';
		$this->data['meta']['description'] = 'Açıklama.';

		return $this->view('client.pages.contact.index', $this->data);
	}
}
