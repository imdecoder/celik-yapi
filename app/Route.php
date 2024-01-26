<?php

$app->router->notFound(function () {
	$error = new App\Controllers\Client\Error;

	if (segments(0) == 'admin')
	{
		$error = new App\Controllers\Admin\Error;
	}

	return $error->index();
});

$app->router->error(function () {
	$error = new App\Controllers\Client\Error;

	if (segments(0) == 'admin')
	{
		$error = new App\Controllers\Admin\Error;
	}

	return $error->index();
});

/**
 * Client Routes
 */
$app->router->get('/', 'Client.Home@index');

$app->router->any('/ara', 'Client.Search@index');

$app->router->get('/urunler', 'Client.Products@index');
$app->router->get('/trend-urunler', 'Client.Products@trends');
$app->router->any('/urun/:slug', 'Client.Products@detail');

$app->router->get('/kategoriler', 'Client.Categories@index');
$app->router->any('/kategori/:slug', 'Client.Categories@list');

$app->router->get('/sepet', 'Client.Cart@index');

$app->router->group('/odeme', function ($router) {
	$router->any('/', 'Client.Payment@index');

	$router->post('/paytr', 'Client.Payment@paytr');
	$router->post('/bildirim', 'Client.Payment@notice');

	$router->get('/basarili', 'Client.Payment@success');
	$router->get('/hata', 'Client.Payment@error');
});

$app->router->get('/hakkimizda', 'Client.Corporate@about');
$app->router->get('/kvkk', 'Client.Corporate@kvkk');
$app->router->get('/gizlilik', 'Client.Corporate@privacy');

$app->router->get('/teslimat-kosullari', 'Client.Contracts@deliveryConditions');
$app->router->get('/uyelik-sozlesmesi', 'Client.Contracts@membershipAgreement');
$app->router->get('/iptal-ve-iade-kosullari', 'Client.Contracts@refundConditions');
$app->router->get('/mesafeli-satis-sozlesmesi', 'Client.Contracts@sellingContract');

$app->router->any('/iletisim', 'Client.Contact@index');

/**
 * Admin Routes
 */
$app->router->group('/admin', function ($router) {
	$router->get('/', function () {
		header('Location: ' . site_url('admin/dashboard'));
		exit;
	});

	$router->any('/login', 'Admin.Auth.Login@index');
	$router->get('/logout', 'Admin.Auth.Logout@index');
	$router->any('/forgot', 'Admin.Auth.Forgot@index');

	$router->get('/dashboard', 'Admin.Dashboard@index');

	$router->group('/catalog', function ($router) {
		$router->group('/products', function($router) {
			$router->get('/', 'Admin.Catalog.Products@index');

			$router->get('/active', 'Admin.Catalog.Products@active');
			$router->get('/passive', 'Admin.Catalog.Products@passive');
			$router->get('/trash', 'Admin.Catalog.Products@trash');

			$router->any('/add', 'Admin.Catalog.Products@add');
			$router->any('/edit/:slug', 'Admin.Catalog.Products@edit');
			$router->get('/delete/:slug', 'Admin.Catalog.Products@delete');
			$router->get('/restore/:slug', 'Admin.Catalog.Products@restore');
			$router->get('/delete-force/:slug', 'Admin.Catalog.Products@deleteForce');
		});

		$router->group('/categories', function($router) {
			$router->get('/', 'Admin.Catalog.Categories@index');

			$router->get('/active', 'Admin.Catalog.Categories@active');
			$router->get('/passive', 'Admin.Catalog.Categories@passive');
			$router->get('/trash', 'Admin.Catalog.Categories@trash');

			$router->any('/add', 'Admin.Catalog.Categories@add');
			$router->any('/edit/:id', 'Admin.Catalog.Categories@edit');
			$router->get('/delete/:id', 'Admin.Catalog.Categories@delete');
			$router->get('/restore/:id', 'Admin.Catalog.Categories@restore');
			$router->get('/delete-force/:id', 'Admin.Catalog.Categories@deleteForce');

			$router->get('/priorty', 'Admin.Catalog.Categories@priorty');
		});
	});
}, ['before' => 'AdminCheckAuth']);

/**
 * Jobs Routes
 */
$app->router->group('/jobs', function ($router) {
	//$router->get('/n11', 'Jobs.N11@index');
	//$router->get('/hepsiburada', 'Jobs.Hepsiburada@index');
	//$router->get('/hepsiburada-meta', 'Jobs.HepsiburadaMeta@index');
	//$router->get('/thumbnail', 'Jobs.Thumbnail@index');
});

/**
 * API Routes
 */
$app->router->group('/api', function ($router) {
	$router->group('/user', function ($router) {
		$router->post('/online-check', 'Api.User@online_check');
	});

	$router->group('/product', function ($router) {
		$router->post('/status', 'Api.Product@status');
		$router->post('/cart', 'Api.Product@cart');
	});

	$router->group('/category', function ($router) {
		$router->post('/status', 'Api.Category@status');
		$router->post('/priorty', 'Api.Category@priorty');
	});
});
