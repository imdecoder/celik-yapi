<?php

namespace App\Services;

class PayTR
{
	public string $redirect_uri;
	public string $scope;

	public function __construct()
	{
		/*$this->redirect_uri = site_url('account/discord');
		$this->scope = urlencode('identify guilds guilds.members.read');*/
	}
}
