<?php

namespace App\Controllers\Client;

use App\Controllers\Client;
use App\Services\PayTR\Pay;
use App\Services\PayTR\Order;
use Symfony\Component\HttpFoundation\Request;
use PDO;

class Payment extends Client
{
	public $cart;

	public function __construct()
	{
		parent::__construct();

		if (isset($_SESSION['cart']))
		{
			$this->cart = $_SESSION['cart'];
		}
	}

	public function index()
	{
		$this->data['meta']['title'] = 'Ödeme';
		$this->data['meta']['description'] = null;

		$data = [];

		$basket = [
			'shipping_cost' => null,
			'subtotal' => null,
			'total' => null
		];

		if ($this->cart)
		{
			$cart = $this->cart;

			$subtotal = 0;

			foreach ($cart as $item)
			{
				$code = $item['code'];
				$qty = $item['qty'];

				$sql = "
					SELECT
						name,
						price,
						discount
					FROM products
					WHERE
						code = '{$code}'
				";

				$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if ($query)
				{
					$name = $query->name;
					$price = $query->discount ?? $query->price;

					$total = $price * $qty;

					$data[] = (object) [
						'code' => $code,
						'name' => $name,
						'price' => turkishLira($price),
						'total' => turkishLira($total),
						'qty' => $qty
					];

					$subtotal += $total;
				}
			}

			$shipping_cost = 5.0;

			$basket['shipping_cost'] = turkishLira($shipping_cost);
			$basket['subtotal'] = turkishLira($subtotal + $shipping_cost);
			$basket['total'] = turkishLira($subtotal + $shipping_cost);
		}
		else
		{
			header('Location: ' . site_url('sepet'));
			exit;
		}

		$this->data['products'] = $data;
		$this->data['cart'] = (object) $basket;

		return $this->view('client.pages.payment.index', $this->data);
	}

	public function paytr(Request $request)
	{
		$this->data['meta']['title'] = 'PayTR ile Ödeme';
		$this->data['meta']['description'] = null;

		$token = null;

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'firstname',
					'lastname',
					'email',
					'phone',
					'address'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();

				$firstname = $data['firstname'];
				$lastname = $data['lastname'];
				$email = $data['email'];
				$phone = $data['phone'];
				$address = $data['address'];

				$pay = new Pay();

				$pay->merchant_oid = 'IWpBzKPjtc0';
				$pay->payment_amount = 100;
				$pay->user_name = $firstname . ' ' . $lastname;
				$pay->email = $email;
				$pay->user_phone = $phone;
				$pay->user_address = $address;

				$token = $pay->token;
			}

			$this->data['token'] = $token;

			return $this->view('client.pages.payment.paytr', $this->data);
		}
	}

	public function notice()
	{
		$order = new Order();
	    $order->status();
	}

	public function success()
	{
	    echo 'başarılı!';
	}
	
	public function error()
	{
	    echo 'başarısız!';
	}
}
