<?php

use Carbon\Carbon;

function product_field($code, $field)
{
	global $app;

	$sql = "
		SELECT
			{$field}
		FROM products
		WHERE
			code = '{$code}'
	";

	$query = $app->db->query($sql)->fetch(PDO::FETCH_OBJ);

	if ($query)
	{
		return $query->$field;
	}
}

function short($text, $str = 10)
{
	$short = '';

	if (strlen($text) > $str)
	{
		if (function_exists('mb_substr'))
		{
			$short = mb_substr($text, 0, $str, 'UTF-8') . '...';	
		}
		else
		{
			$short = substr($text, 0, $str) . '...';
		}
	}

	return $short;
}

function timeAgo($date)
{
	return Carbon::parse($date)->diffForHumans();
}

function timeConvert($date)
{
	return Carbon::parse($date)->format('d/m/Y H:i');
}

function segments($index = null)
{
	$baseUrl = config('BASE_URL');
	$baseArray = explode('/', trim(parse_url($baseUrl, PHP_URL_PATH) ?? '', '/'));

	$requestUri = $_SERVER['REQUEST_URI'];
	$parsedUrl = parse_url($requestUri, PHP_URL_PATH);
	$requestArray = explode('/', trim($parsedUrl ?? '', '/'));

	$diffArray = array_values(array_diff($requestArray, $baseArray));

	if ($index || $index === 0)
	{
		if (isset($diffArray[$index]))
		{
			return $diffArray[$index];
		}
		else
		{
			return false;
		}
	}
	else
	{
		return $diffArray;
	}
}

function turkishNumber($par)
{
	return number_format($par, 0, null, '.');
}

function turkishLira($par)
{
	return number_format($par, 2, ',', '.');
}

function hashid($limit = 11)
{
	$chars = 'bcdfghjklmnpqrstvwxyz';
	$chars .= 'BCDFGHJKLMNPQRSTVWXYZ';
	$chars .= '0123456789';

	$key = '';

	for ($i = 0; $i < $limit; $i++)
	{
		$key .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}

	return $key;
}
