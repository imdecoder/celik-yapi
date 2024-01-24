<?php

namespace App\Services;

class PayTR
{
	public $merchant_id;

	public $merchant_key;

	public $merchant_salt;

	public function __construct()
	{
		$this->merchant_id = config('PAYTR_MERCHANT_ID');
		$this->merchant_key = config('PAYTR_MERCHANT_KEY');
		$this->merchant_salt = config('PAYTR_MERCHANT_SALT');
	}
}
