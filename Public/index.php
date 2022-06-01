<?php
	declare(strict_types=1);

	session_start();

	//requisita autoload(composer)
	require_once __DIR__."/../vendor/autoload.php";

	//referencia namespace(dir) de acesso
	use App\Core\Core;

	$core = new Core();
?>