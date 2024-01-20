<?php

namespace Core;

use Arrilot\DotEnv\DotEnv;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Carbon\Carbon;
use PDO;
use Buki\Router\Router;
use Valitron\Validator;

class Bootstrap
{
	public $db;
	public $router;
	public $view;
	public $validator;

	public function __construct()
	{
		DotEnv::load(dirname(__DIR__) . '/.env.php');

		$whoops = new Run();
		$whoops->pushHandler(new PrettyPageHandler());

		if (config('DEVELOPMENT'))
		{
			$whoops->register();
		}

		Carbon::setLocale(config('LOCALE', 'tr_TR'));

		$this->db = new PDO('mysql:host=' . config('DB_HOST', 'localhost') . ';dbname=' . config('DB_NAME'), config('DB_USER'), config('DB_PASSWORD'));
		$this->db->query('SET CHARACTER SET utf8');

		$this->router = new Router([
			'base_folder' => config('BASE_FOLDER', ''),
			'paths' => [
				'controllers' => 'app/Controllers',
				'middlewares' => 'app/Middlewares'
			],
			'namespaces' => [
				'controllers' => 'App\Controllers',
				'middlewares' => 'App\Middlewares'
			],
			'debug' => config('DEVELOPMENT')
		]);

		$this->validator = new Validator($_POST);
		Validator::langDir(dirname(__DIR__) . '/public/validator');
		Validator::lang('tr');

		$this->view = new View($this->validator);
	}

	public function run()
	{
		$this->router->run();
	}
}
