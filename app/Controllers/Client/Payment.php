<?php

namespace App\Controllers\Client;

use App\Controllers\Client;
use App\Services\PayTR\Pay;
use App\Services\PayTR\Order;
use Symfony\Component\HttpFoundation\Request;
use PDO;

class Payment extends Client
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['meta']['title'] = 'Ödeme';
		$this->data['meta']['description'] = null;

		$data = [];
		$cart = [
			'shipping_cost' => null,
			'subtotal' => null,
			'total' => null
		];

		if (isset($_SESSION['cart']))
		{
			$cart = $_SESSION['cart'];

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

			$cart['shipping_cost'] = turkishLira($shipping_cost);
			$cart['subtotal'] = turkishLira($subtotal + $shipping_cost);
			$cart['total'] = turkishLira($subtotal + $shipping_cost);
		}

		$this->data['products'] = $data;
		$this->data['cart'] = (object) $cart;

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
