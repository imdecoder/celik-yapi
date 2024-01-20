<?php

namespace App\Controllers\Jobs;

use App\Controllers\Jobs;

use CMD\Hepsiburada\config\Credentials;
use CMD\Hepsiburada\Hepsiburada as HB;
use CMD\Hepsiburada\models\basemodels\products\Attributes;
use CMD\Hepsiburada\models\basemodels\products\HepsiburadaProductModel;
use CMD\Hepsiburada\models\requestmodels\BaseGetRequestModel;
use CMD\Hepsiburada\models\requestmodels\product\ProdoductStatusesRequestModel;

class HepsiburadaBackup extends Jobs
{
	public function index()
	{
		$isTestStage = true;
		$hepsiburada = new HB('celikyapimarket_dev', 'Hb12345!', 'ba6d542d-b5d2-47ff-837d-c3521464748d', $isTestStage);

		/*$getParams = new BaseGetRequestModel();
		$getParams->offset = 3;
		$getParams->limit = 10;

		$result = $hepsiburada->listing->getList($getParams);*/
		
		$baseGet = new BaseGetRequestModel();
		$baseGet->page = 0;
		$baseGet->size = 100;


		$requestStatusList = [
			new ProdoductStatusesRequestModel(
				"ba6d542d-b5d2-47ff-837d-c3521464748d",
				["SAMPLE-SKU-INT-0"]
			)
		];

		$result = $hepsiburada->product->checkProductStatus($requestStatusList);

		/*$productList = [];

		$product1 = new HepsiburadaProductModel();
		$product1->categoryId = 18021982;
		$product1->merchant = 'ba6d542d-b5d2-47ff-837d-c3521464748d';
		$product1attributes = new Attributes();
		$product1attributes->Barcode = "1234567891234";
		$product1attributes->GarantiSuresi = 24;
		$product1attributes->Image1 = "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
		$product1attributes->Image2 = "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
		$product1attributes->Image3 = "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
		$product1attributes->Image4 = "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
		$product1attributes->Image5 = "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
		$product1attributes->Marka = "Nike";
		$product1attributes->UrunAciklamasi ="Örnek ürün açıklama yazısı.";
		$product1attributes->UrunAdi = "Örnek Ürün 1";
		$product1attributes->VaryantGroupID = "Hepsiburada0";
		$product1attributes->ebatlar_variant_property = "Büyük Ebat";
		$product1attributes->kg = "1";
		$product1attributes->merchantSku = "SAMPLE-SKU-INT-0";
		$product1attributes->renk_variant_property = "Siyah";
		$product1attributes->tax_vat_rate = "5";

		$product1->attributes = $product1attributes;

		$productList[] = $product1;

		$result = $hepsiburada->product->createProduct($productList);*/

		if ($result->status)
		{
			echo '<pre>';
			print_r($result->response);
		}

		exit;
	}
}
