<?php

namespace App\Services\PayTR;

use App\Services\PayTR;
use PDO;

class Pay extends PayTR
{
	public $email;

	public $payment_amount;

	public $merchant_oid;

	public $user_name;

	public $user_address;

	public $user_phone;

	public $merchant_ok_url;

	public $merchant_fail_url;

	public $user_basket;

	public $user_ip;

	public $timeout_limit;

	public $debug_on;

	public $test_mode;

	public $no_installment;

	public $max_installment;

	public $currency;

	public $token;

	public function __construct()
	{
		parent::__construct();

		## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa.
		$this->merchant_ok_url = site_url('odeme/basarili');

		## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa.
		$this->merchant_fail_url = site_url('odeme/hata');

		## Müşterinin sepet/sipariş içeriği.
		$this->user_basket = $this->user_basket();

		## Sunucuda çalıştırmıyorsanız buraya dış ip adresinizi yazmalısınız.
		## Aksi halde geçersiz "paytr_token" hatası alırsınız.
		$this->user_ip = $this->user_ip();

		## İşlem zaman aşımı süresi - dakika cinsinden.
		$this->timeout_limit = '30';

		## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde "1" olarak bırakın.
		## Daha sonra "0" yapabilirsiniz.
		$this->debug_on = 1; // TODO: "0" yapılacak!

		## Mağaza canlı modda iken test işlem yapmak için "1" olarak gönderilebilir.
		$this->test_mode = 0;

		## Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız "1" yapın.
		$this->no_installment = 0;

		## Görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
		## "Sıfır (0)" gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
		$this->max_installment = 0;

		$this->currency = 'TL';
	}

	public function token()
	{
		$token = null;

		$hash_str = $this->merchant_id . $this->user_ip . $this->merchant_oid . $this->email . $this->payment_amount . $this->user_basket . $this->no_installment . $this->max_installment . $this->currency . $this->test_mode;
		$paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $this->merchant_salt, $this->merchant_key, true));

		$post_vals = [
			'merchant_id' => $this->merchant_id,
            'user_ip' => $this->user_ip,
            'merchant_oid' => $this->merchant_oid,
            'email' => $this->email,
            'payment_amount' => $this->payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $this->user_basket,
            'debug_on' => $this->debug_on,
            'no_installment' => $this->no_installment,
            'max_installment' => $this->max_installment,
            'user_name' => $this->user_name,
            'user_address' => $this->user_address,
            'user_phone' => $this->user_phone,
            'merchant_ok_url' => $this->merchant_ok_url,
            'merchant_fail_url' => $this->merchant_fail_url,
            'timeout_limit' => $this->timeout_limit,
            'currency' => $this->currency,
            'test_mode' => $this->test_mode
		];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.paytr.com/odeme/api/get-token');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1) ;
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);

		## DİKKAT: "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
		## Aşağıdaki kodu açıp deneyebilirsiniz. Güvenlik nedeniyle sunucunuzda bu kodun kapalı kalması çok önemlidir!
		## curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$result = @curl_exec($ch);

		if (curl_errno($ch))
        {
			die('PAYTR IFRAME connection error. err:' . curl_error($ch));
		}

		curl_close($ch);

		$result = json_decode($result, 1);

		if ($result['status'] == 'success')
        {
			$token = $result['token'];
		}
    	else
        {
			die('PAYTR IFRAME failed. reason:' . $result['reason']);
		}

		$this->token = $token;
	}

	public function user_basket()
	{
		$data = null;

		global $app;

		if (isset($_SESSION['cart']))
		{
			$cart = $_SESSION['cart'];

			foreach ($cart as $item)
			{
				$code = $item['code'];
				$qty = $item['qty'];

				$sql = "
					SELECT
						name,
						price
					FROM products
					WHERE
						code = '{$code}'
				";

				$query = $app->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if ($query)
				{
					$name = $query->name;
					$price = $query->price;

					$data[] = [
						$name,
						$price,
						$qty
					];
				}
			}
		}

		$data = base64_encode(json_encode($data));

		return $data;
	}

	public function user_ip()
	{
		$ip = null;

		if (isset($_SERVER['HTTP_CLIENT_IP']))
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return $ip;
	}
}
