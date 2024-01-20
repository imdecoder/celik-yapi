<?php

namespace Core;

use Aura\Session\Segment;
use Aura\Session\SessionFactory;

class Session
{
	public Segment $segment;
	private static Session $instance;

	public static function getInstance()
	{
		if (!isset(self::$instance))
		{
			self::$instance = new Session();
		}

		return self::$instance;
	}

	public function __construct()
	{
		$session_factory = new SessionFactory();
		$session = $session_factory->newInstance($_COOKIE);
		$this->segment = $session->getSegment('AkinciArts');
	}

	public function clear()
	{
		$this->segment->clear();
	}
}
