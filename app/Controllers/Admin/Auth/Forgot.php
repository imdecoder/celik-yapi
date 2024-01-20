<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\Admin;
use Symfony\Component\HttpFoundation\Request;
use PDO;

class Forgot extends Admin
{
	public function index(Request $request)
	{
		$message = [
			'display' => 'block'
		];

		if ($request->getMethod() == 'POST')
		{
			$rules = [
				'required' => [
					'email'
				]
			];

			$this->validator->rules($rules);

			if ($this->validator->validate())
			{
				$data = $this->validator->data();

				$email = $data['email'];

				$sql = "
					SELECT
						id,
						username,
						firstname,
						lastname
					FROM users
					WHERE
						(status = 1 AND deleted_at IS NULL)
						AND
						email = '{$email}'
				";

				$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

				if ($query)
				{
					// TODO: Send reset password email to the user.

					$message = [
						'class' => 'success',
						'title' => 'Başarılı',
						'text' => 'Şifrenizi sıfırlamanız için size bir bağlantı gönderdik.',
						'display' => 'none'
					];
				}
				else
				{
					$message = [
						'class' => 'danger',
						'title' => 'Hata',
						'text' => 'Girdiğiniz e-posta adresi bulunamadı.',
						'display' => 'block'
					];
				}
			}
			else
			{
				$message = [
					'class' => 'warning',
					'title' => 'Hata',
					'text' => 'Lütfen boş alan bırakmayın.',
					'display' => 'block'
				];
			}
		}

		$this->data['message'] = $message;

		return $this->view('admin.pages.auth.forgot', $this->data);
	}
}
