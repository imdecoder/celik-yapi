<?php

namespace App\Controllers\Api;

use App\Controllers\Api;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PDO;

class Product extends Api
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();

		$this->data['user_id'] = session()->segment->get('user_id');
	}

	public function status(Request $request, Response $response)
	{
		$data = [];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'code'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();
				$code = $data['code'];

				$sql = "
					SELECT
						status,
						deleted_at
					FROM products
					WHERE code = '{$code}' 
				";

				$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if ($query)
				{
					if ($query->deleted_at)
					{
						$data = [
							'class' => 'warning',
							'title' => 'Uyarı!',
							'message' => 'Silinen ürünün durumu değiştirelemez.'
						];
					}
					else
					{
						$status = !$query->status;

						$sql = "
							UPDATE products SET
								status = :status,
								updated_by = :updated_by,
								updated_at = :updated_at
							WHERE code = :code
						";

						$query = $this->db->prepare($sql);

						$update = $query->execute([
							'status' => $status,
							'updated_by' => $this->data['user_id'],
							'updated_at' => date('Y-m-d H:i:s'),
							'code' => $code
						]);

						if ($update)
						{
							$data = [
								'class' => 'success',
								'title' => 'Başarılı!',
								'message' => 'Ürün durumu değiştirildi.'
							];
						}
						else
						{
							$data = [
								'class' => 'warning',
								'title' => 'Hata!',
								'message' => 'Ürün durumu değiştirelemedi.'
							];
						}
					}
				}
				else
				{
					$data = [
						'class' => 'danger',
						'title' => 'Hata!',
						'message' => 'Ürün kodu eşleştirelemedi.'
					];
				}
			}
			else
			{
				$data = [
					'class' => 'danger',
					'title' => 'Hata!',
					'message' => 'Ürün kodu bulunamadı.'
				];
			}
		}
		else
		{
			$data = [
				'class' => 'danger',
				'title' => 'Hata!',
				'message' => 'Bilinmeyen bir hata oluştu.'
			];
		}

		$json = json_encode($data, JSON_UNESCAPED_UNICODE);

		$response->setStatusCode(200);
        $response->headers->set('Content-type', 'application/json');
        $response->setContent($json);
        $response->send();
	}

	public function cart(Request $request, Response $response)
	{
		$data = [];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'action',
					'code'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();

				$action = $data['action'];
				$code = $data['code'];
				$qty = $data['qty'] ? (int) $data['qty'] : 1;

				switch ($action)
				{
					case 'add':
						if (!empty($_SESSION['cart']))
						{
							$acol = array_column($_SESSION['cart'], 'code');

							if (in_array($code, $acol))
							{
								$_SESSION['cart'][$code]['qty'] += $qty;
							}
							else
							{
								$item = [
									'code' => $code,
									'qty' => $qty
								];

								$_SESSION['cart'][$code] = $item;
							}
						}
						else
						{
							$item = [
								'code' => $code,
								'qty' => $qty
							];

							$_SESSION['cart'][$code] = $item;
						}

						$data = [
							'icon' => 'success',
							'title' => 'Başarılı!',
							'text' => 'Ürün sepete eklendi. Sayfa yeniden yüklenecek.'
						];

						break;
					case 'update':
						$acol = array_column($_SESSION['cart'], 'code');

						if (in_array($code, $acol))
						{
							$_SESSION['cart'][$code]['qty'] = $qty;
						}
						else
						{
							$item = [
								'code' => $code,
								'qty' => 1
							];

							$_SESSION['cart'][$code] = $item;
						}

						$data = [
							'icon' => 'success',
							'title' => 'Başarılı!',
							'text' => 'Sepet güncellendi. Sayfa yeniden yüklenecek.'
						];

						break;
					case 'delete':
						unset($_SESSION['cart'][$code]);

						$data = [
							'icon' => 'success',
							'title' => 'Başarılı!',
							'text' => 'Sepet güncellendi. Sayfa yeniden yüklenecek.'
						];

						break;
					case 'clear':
						unset($_SESSION['cart']);

						$data = [
							'icon' => 'success',
							'title' => 'Başarılı!',
							'text' => 'Sepet temizlendi. Sayfa yeniden yüklenecek.'
						];

						break;
					default:
						$data = [
							'icon' => 'danger',
							'title' => 'Hata!',
							'text' => 'Bilinmeyen sepet aksiyonu.'
						];

						break;
				}				
			}
			else
			{
				$data = [
					'icon' => 'danger',
					'title' => 'Hata!',
					'text' => 'Ürün kodu bulunamadı.'
				];
			}
		}
		else
		{
			$data = [
				'icon' => 'danger',
				'title' => 'Hata!',
				'text' => 'Bilinmeyen bir hata oluştu.'
			];
		}

		$json = json_encode($data, JSON_UNESCAPED_UNICODE);

		$response->setStatusCode(200);
        $response->headers->set('Content-type', 'application/json');
        $response->setContent($json);
        $response->send();
	}
}
