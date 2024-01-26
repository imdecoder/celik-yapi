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

		$shipping_cost = 0; // TODO

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

			$basket['shipping_cost'] = turkishLira($shipping_cost);
			$basket['subtotal'] = turkishLira($subtotal);
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
				$note = $data['note'] ? $data['note'] : null;

				if ($firstname && $lastname && $email && $phone && $address)
				{
					$code = hashid();
					$customer_id = null;
					$status_id = 4; // Ödeme Bekleniyor

					$products = [];
					$subtotal = 0;
					$total = 0;

					$shipping_cost = 0; // TODO

					if ($cart = $this->cart)
					{
						foreach ($cart as $item)
						{
							$product_code = $item['code'];
							$qty = $item['qty'];

							$sql = "
								SELECT
									id,
									name,
									price,
									discount
								FROM products
								WHERE
									code = '{$product_code}'
							";

							$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

							if ($query)
							{
								$products[] = [
									'id' => $query->id,
									'qty' => $qty
								];

								$price = $query->discount ?? $query->price;
								$subtotal += $price * $qty;
							}
						}
					}

					$total = $subtotal + $shipping_cost;

					$sql = "
						INSER INTO orders SET
						code = ?,
						customer_id = ?,
						subtotal = ?,
						total = ?,
						customer_name = ?,
						customer_email = ?,
						customer_phone = ?,
						address_1 = ?,
						status_id = ?,
						note = ?
					";

					$query = $this->db->prepare($sql);

					$insert = $query->execute([
						$code,
						$customer_id,
						$subtotal,
						$total,
						$firstname . ' ' . $lastname,
						$email,
						$phone,
						$address,
						$status_id,
						$note
					]);

					if ($insert)
					{
						$order_id = $this->db->lastInsertId();

						foreach ($products as $product)
						{
							$sql = "
								INSER INTO order_products SET
								order_id = ?,
								product_id = ?,
								product_quantity = ?,
								price = ?
							";

							$query = $this->db->prepare($sql);

							$insert = $query->execute([
								$order_id,
								$product['id'],
								$product['qty'],
								$price
							]);

							if (!$insert)
							{
								$error = true;
							}
						}

						if (!$error)
						{
							$pay = new Pay();

							$pay->merchant_oid = $code;
							$pay->user_name = $firstname . ' ' . $lastname;
							$pay->email = $email;
							$pay->user_phone = $phone;
							$pay->user_address = $address;

							$pay->get_token();

							$token = $pay->token;
						}
					}
				}
			}

			$this->data['token'] = $token;

			return $this->view('client.pages.payment.paytr', $this->data);
		}
	}

	public function notice()
	{
		$order = new Order();

		$code = $order->code;
		$status = $order->status();

		$status_id = 3;

		if ($status)
		{
			$status_id = 1;
		}

		$sql = "
			UPDATE orders SET
				status_id = :status_id
			WHERE code = :code
		";

		$query = $this->db->prepare($sql);

		$query->execute([
			'status_id' => $status_id,
			'code' => $code
		]);

		## Bildirimin alındığını PayTR sistemine bildir.
		echo 'OK';
		exit;
	}

	public function success()
	{
		$this->data['meta']['title'] = 'Ödeme Başarılı';
		$this->data['meta']['description'] = null;

		return $this->view('client.pages.payment.success', $this->data);
	}

	public function error()
	{
		$this->data['meta']['title'] = 'Başarısız Ödeme';
		$this->data['meta']['description'] = null;

	    return $this->view('client.pages.payment.error', $this->data);
	}
}
