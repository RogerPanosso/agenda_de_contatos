<?php
	/*
	* Definição do arquivo de Config(Configurações) sendo responsável por estabeler dados
	* para conexão a servidor de banco de dados de acordo com ambiente de desenvolvimento
	* estabelecido e utilizado
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	require_once __DIR__."/Environment.php";

	$config = array();

	if(ENVIRONMENT == "development") {

		define("BASE_URL", "http://localhost/agenda_contatos/");
		$config["dbdriver"] = "mysql";
		$config["dbname"] = "agenda_contatos";
		$config["dbhost"] = "localhost";
		$config["dbport"] = "3306";
		$config["dbuser"] = "root";
		$config["dbpass"] = "";

	}else {

		/* dados para conexão diante servidor externo */
		define("BASE_URL", "...");
		$config["dbdriver"] = "...";
		$config["dbname"] = "...";
		$config["dbhost"] = "...";
		$config["dbport"] = "...";
		$config["dbuser"] = "...";
		$config["dbpass"] = "...";

	}
?>