<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin;

class Error extends Admin
{
	public function index()
	{
		return $this->view('admin.pages.error.not-found', $this->data);
	}
}
