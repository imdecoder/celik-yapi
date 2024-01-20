<?php

namespace App\Controllers\Jobs;

use App\Controllers\Jobs;
use PDO;
use Verot\Upload\Upload;

class Thumbnail extends Jobs
{
	public function index()
	{
		$error = false;

		$sql = "
			SELECT
				image
			FROM products
		";

		$query = $this->db->query($sql, PDO::FETCH_OBJ);

		if ($query->rowCount())
		{
			foreach ($query as $row)
			{
				if ($row->image)
				{
					$file = './uploads/images/original/products/' . $row->image;
					$handle = new Upload($file);

					if ($handle->uploaded)
					{
						$handle->allowed = ['image/*'];
						$handle->process('./uploads/images/original/products');

						$handle->allowed = ['image/*'];
						$handle->image_resize = true;
						$handle->image_x = 600;
						$handle->image_y = 600;
						$handle->image_ratio_crop = true;
						$handle->process('./uploads/images/cache/products/600x600');

						$handle->allowed = ['image/*'];
						$handle->image_resize = true;
						$handle->image_x = 40;
						$handle->image_y = 40;
						$handle->image_ratio_crop = true;
						$handle->process('./uploads/images/cache/products/40x40');

						if (!$handle->processed)
						{
							$error = true;
						}
					}
					else
					{
						$error = true;
					}

					$handle->clean();
				}
			}
		}

		if ($error)
		{
			echo 'upload error';
			exit;
		}
	}
}
