<?php

namespace App\Controllers\Client;

use App\Controllers\Client;
use PDO;

class Cart extends Client
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['meta']['title'] = 'Sepetim';
		$this->data['meta']['description'] = null;

		$data = [];
		$cart = [];

		if (isset($_SESSION['cart']))
		{
			$basket = $_SESSION['cart'];

			$subtotal = 0;

			foreach ($basket as $item)
			{
				$code = $item['code'];
				$qty = $item['qty'];

				$sql = "
					SELECT
						name,
						slug,
						price,
						discount,
						image
					FROM products
					WHERE
						code = '{$code}'
				";

				$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if ($query)
				{
					$name = $query->name;
					$link = site_url('urun/' . $query->slug);
					$price = $query->discount ?? $query->price;
					$image = $query->image ? upload_url('images/cache/products/600x600/' . $query->image) : asset_url('client/img/default.jpg');

					$total = $price * $qty;

					$data[] = (object) [
						'code' => $code,
						'name' => $name,
						'link' => $link,
						'price' => turkishLira($price),
						'total' => turkishLira($total),
						'image' => $image,
						'qty' => $qty
					];

					$subtotal += $total;
				}
			}

			$shipping_cost = 0; // TODO

			$cart['shipping_cost'] = turkishLira($shipping_cost);
			$cart['subtotal'] = turkishLira($subtotal);
			$cart['total'] = turkishLira($subtotal + $shipping_cost);
		}

		$this->data['products'] = $data;
		$this->data['cart'] = (object) $cart;

		return $this->view('client.pages.cart.index', $this->data);
	}
}
