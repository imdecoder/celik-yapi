<?php

namespace App\Controllers;

use Core\Controller;
use PDO;

class Admin extends Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();

		$this->data['logged_user'] = $this->user();

		$this->data['meta'] = [
			'title' => 'Çelik Panel',
			'robots' => 'noindex, nofollow'
		];
	}

	public function user()
	{
		$data = null;

		if (session()->segment->get('admin_login'))
		{
			$id = session()->segment->get('user_id');

			$sql = "
				SELECT
					u.username AS username,
					u.firstname AS firstname,
					u.lastname AS lastname,
					u.email AS email,
					u.phone AS phone,
					u.avatar AS avatar,
					ug.name AS group_name,
					u.last_seen AS last_seen
				FROM users u
				INNER JOIN user_groups ug ON ug.id = u.group_id
				WHERE
					(u.status = 1 AND u.deleted_at IS NULL)
					AND
				    u.id = '{$id}'
			";

			$user = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

			if ($user)
			{
				$user->id = $id;
				$user->avatar = $user->avatar ? upload_url('images/cache/users/40x40/' . $user->avatar) : asset_url('admin/images/avatars/default.jpg');

				$data = $user;
			}
		}

		return $data;
	}
}
