<?php

namespace App\Controllers\Api;

use App\Controllers\Api;
use Symfony\Component\HttpFoundation\Response;

class User extends Api
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();

		$this->data['logged'] = session()->segment->get('admin_login');
		$this->data['id'] = session()->segment->get('user_id');
	}

	public function online_check(Response $response)
	{
		$data = [];

		if ($id = $this->data['id'])
		{
			$last_seen = date('Y-m-d H:i:s');

			$sql = "
				UPDATE users SET
					last_seen = :last_seen
				WHERE id = :id
			";

			$query = $this->db->prepare($sql);

			$update = $query->execute([
				'last_seen' => $last_seen,
				'id' => $id
			]);

			if ($update)
			{
				$data = [
					'status' => true,
					'message' => 'Kullanıcının son aktif olma zamanı değiştirildi.'
				];
			}
			else
			{
				$data = [
					'status' => false,
					'message' => 'Bir hata oluşltu ve kullanıcının aktif olma zamanı değiştirilemedi.'
				];
			}
		}

		$json = json_encode($data, JSON_UNESCAPED_UNICODE);

		$response->setStatusCode(200);
        $response->headers->set('Content-type', 'application/json');
        $response->setContent($json);
        $response->send();
	}
}
