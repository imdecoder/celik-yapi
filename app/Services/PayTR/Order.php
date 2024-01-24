<?php

use App\Services\PayTR;

class Order extends PayTR
{
	public $post;

	public $hash;

	public function __construct()
	{
		parent::__construct();

		$this->post = $_POST;
		$this->hash = $this->hash();
	}

	public function status()
	{
		if ($this->hash != $this->post['hash'])
		{
			die('PAYTR notification failed: bad hash');
		}

		if ($this->post['status'] == 'success')
		{
			## Ödeme Onaylandı.
			##########################################################################
			## 1) Siparişi onaylayın.
			## 2) Müşterinize SMS veya e-posta gibi bilgilendirme yapabilirsiniz.
			##########################################################################
			## 3) payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
			## Güncel tutarı $post['total_amount'] değerinden alabilirsin.
		}
		else
		{
			## Ödemeye Onay Verilmedi.
			###########################################################
			## 1) Siparişi iptal edin.
			###########################################################
			## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz:
			## $post['failed_reason_code'] - başarısız hata kodu.
			## $post['failed_reason_msg'] - başarısız hata mesajı.
		}

		## Bildirimin alındığını PayTR sistemine bildir.
		echo 'OK';
		exit;
	}

	public function hash()
	{
		return base64_encode(
			hash_hmac(
				'sha256',
				$this->post['merchant_oid'] . $this->merchant_salt . $this->post['status'] . $this->post['total_amount'],
				$this->merchant_key,
				true
			)
		);
	}
}
