<?php

namespace Core;

use Jenssegers\Blade\Blade;
use Valitron\Validator;

class View
{
	private $validator;

	public function __construct(Validator $validator)
	{
		$this->validator = $validator;
	}

	public function show($view, $data)
	{
		$blade = new Blade(
			dirname(__DIR__) . '/public/views',
			dirname(__DIR__) . '/public/cache'
		);

		$blade->share('errors', $this->validator->errors());

		return $blade->render($view, $data);
	}
}
