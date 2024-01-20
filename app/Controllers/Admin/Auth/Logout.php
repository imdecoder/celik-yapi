<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\Admin;

class Logout extends Admin
{
	public function index()
	{
		session()->clear();

		header('Location: ' . site_url('admin/login'));
		exit;
	}
}
