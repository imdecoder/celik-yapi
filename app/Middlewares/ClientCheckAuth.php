<?php

namespace App\Middlewares;

class ClientCheckAuth
{
	public function handle()
	{
		$userLogin = session()->segment->get('user_login');

		// TODO: 'logout' segmentini kontrol et!
		if (!$userLogin && !array_intersect(segments(), ['discord', 'login', 'register', 'logout', 'forgot']))
		{
			header('Location: ' . site_url('account/login'));
			exit;
		}

		if ($userLogin && array_intersect(segments(), ['discord', 'login', 'register', 'forgot']))
		{
			header('Location: ' . site_url('account/dashboard'));
			exit;
		}

		return true;
	}
}
