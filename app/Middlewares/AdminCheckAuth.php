<?php

namespace App\Middlewares;

class AdminCheckAuth
{
	public function handle()
	{
		$remember = null;

		if (isset($_COOKIE['remember']))
		{
			$remember = $_COOKIE['remember'];
		}

		$adminLogin = session()->segment->get('admin_login');

		// TODO: 'logout' segmentini kontrol et!
		if (!$adminLogin && !array_intersect(segments(), ['login', 'logout', 'forgot']))
		{
			header('Location: ' . site_url('admin/login'));
			exit;
		}

		// TODO: 'recovery' segmentini kontrol et!
		if (($adminLogin || $remember) && array_intersect(segments(), ['login', 'forgot']))
		{
			header('Location: ' . site_url('admin/dashboard'));
			exit;
		}

		return true;
	}
}
