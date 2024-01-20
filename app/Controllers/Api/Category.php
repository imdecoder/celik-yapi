<?php

namespace App\Controllers\Api;

use App\Controllers\Api;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PDO;

class Category extends Api
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
					'id'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();
				$id = $data['id'];

				$sql = "
					SELECT
						status,
						deleted_at
					FROM product_categories
					WHERE id = '{$id}' 
				";

				$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if ($query)
				{
					if ($query->deleted_at)
					{
						$data = [
							'class' => 'warning',
							'title' => 'Uyarı!',
							'message' => 'Silinen kategori durumu değiştirelemez.'
						];
					}
					else
					{
						$status = !$query->status;

						$sql = "
							UPDATE product_categories SET
								status = :status,
								updated_by = :updated_by,
								updated_at = :updated_at
							WHERE id = :id
						";

						$query = $this->db->prepare($sql);

						$update = $query->execute([
							'status' => $status,
							'updated_by' => $this->data['user_id'],
							'updated_at' => date('Y-m-d H:i:s'),
							'id' => $id
						]);

						if ($update)
						{
							$data = [
								'class' => 'success',
								'title' => 'Başarılı!',
								'message' => 'Kategori durumu değiştirildi.'
							];
						}
						else
						{
							$data = [
								'class' => 'warning',
								'title' => 'Hata!',
								'message' => 'Kategori durumu değiştirelemedi.'
							];
						}
					}
				}
				else
				{
					$data = [
						'class' => 'danger',
						'title' => 'Hata!',
						'message' => 'Kategori ID eşleştirelemedi.'
					];
				}
			}
			else
			{
				$data = [
					'class' => 'danger',
					'title' => 'Hata!',
					'message' => 'Kategori ID bulunamadı.'
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

	public function priorty(Request $request, Response $response)
	{
		$data = [];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'order'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$error = false;

				$data = $this->validator->data();
				$order = $data['order'];

				foreach ($order as $priorty => $id)
				{
					$sql = "
						UPDATE product_categories SET
							priorty = :priorty
						WHERE id = :id
					";

					$query = $this->db->prepare($sql);

					$update = $query->execute([
						'priorty' => $priorty,
						'id' => $id
					]);

					if (!$update)
					{
						$error = true;
					}
				}

				if (!$error)
				{
					$data = [
						'class' => 'success',
						'title' => 'Başarılı!',
						'message' => 'Kategorinin sıralaması başarıyla değiştirildi.'
					];
				}
				else
				{
					$data = [
						'class' => 'danger',
						'title' => 'Hata!',
						'message' => 'Kategori sıralaması değiştirelemedi.'
					];
				}
			}
			else
			{
				$data = [
					'class' => 'danger',
					'title' => 'Hata!',
					'message' => 'Kategori sırası bulunamadı.'
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
}
