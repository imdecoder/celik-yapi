<?php

namespace App\Controllers\Jobs;

use App\Controllers\Jobs;
use Aspera\Spreadsheet\XLSX\Reader;
use PDO;

class HepsiburadaMeta extends Jobs
{
	public function index()
	{
		$reader = new Reader();
		$reader->open('./uploads/files/hb.xlsx');

		foreach ($reader as $row)
		{
			$sku = $row[3];
			$price = $row[7];
			$quantity = $row[9];

			$sql = "
				SELECT
					id
				FROM products
				WHERE
					hb_sku = '{$sku}'
					AND
					quantity IS NULL
			";

			$query = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);

			if ($query)
			{
				$id = $query->id;

				$sql = "
					UPDATE products SET
						quantity = :quantity,
						price = :price
					WHERE id = :id
				";

				$query = $this->db->prepare($sql);

				$update = $query->execute([
					'quantity' => $quantity,
					'price' => $price,
					'id' => $id
				]);
			}
		}

		$reader->close();
	}
}
