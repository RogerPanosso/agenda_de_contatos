<?php
	/*
	* Definição da classe Model(Auxiliar) sendo uma classe base para ser herdada diante
	* seus models principais nos quais tem por finalidade realizar requisições aos dados
	* diante banco de dados
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Core;

	use App\Config\ConnectDb;

	class Model {

		protected object $pdo;

		public function __construct() {

			$this->pdo = ConnectDb::getInstancePdo();

		}

	}
?>