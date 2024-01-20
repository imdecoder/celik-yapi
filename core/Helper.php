<?php

use Arrilot\DotEnv\DotEnv;
use Core\Session;
use Core\Upload;
use Core\Redirect;

function config($key, $default = null)
{
	return DotEnv::get($key, $default);
}

function session()
{
	return Session::getInstance();
}

function upload($name)
{
	return Upload::getInstance($name);
}

function redirect($url)
{
	return Redirect::getInstance($url);
}

function cookie($name)
{
	if (isset($_COOKIE[$name]))
	{
		return rawurldecode($_COOKIE[$name]);
	}

	return false;
}

function site_url($url = '')
{
	return config('BASE_URL') . '/' . $url;
}

function asset_url($url = '')
{
	return site_url('public/assets/' . $url);
}

function upload_url($url = '')
{
	return site_url('uploads/' . $url);
}
