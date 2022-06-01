<?php
	/*
	* Definição da classe ConnectDb sendo responsável por estabelecer conexão direta com
	* servidor de banco de dados de acordo com dados estabelecidos, através da biblioteca
	* PDO(Object). Utilizando padrão de projeto criacional Singleton contendo instancia
	* única de objeto perante aplicação sendo ocorrida a instancia de dentro da própria
	* classe em um contexto interno
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Config;

	class ConnectDb {

		private static ?\PDO $instancePdo = null;

		private function __construct() {

			//private __construct()

		}

		private function __destruct() {

			//private __destruct()

		}

		private function __clone() {

			//private __clone()

		}

		public static function getInstancePdo() : \PDO {

			if(!isset(self::$instancePdo)) {

				require_once __DIR__."/Config.php";
				self::$instancePdo = new \PDO($config["dbdriver"].":dbname=".$config["dbname"].";host=".$config["dbhost"].";dbport=".$config["dbport"], $config["dbuser"], $config["dbpass"]);
				self::$instancePdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				self::$instancePdo->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_EMPTY_STRING);

			}

			//caso já exista uma instancia(objeto) criada e armazenada em atributo estático somente retorna
			return self::$instancePdo;

		}

	}
?>