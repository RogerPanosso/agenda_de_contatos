<?php
	/*
	* Definição da classe Core(Auxiliar) sendo responsável por iniciar funcionamento da estrutura MVC
	* e estruturar URL Amigável(modo de reescrita) para identificação de acessos externo por usuários
	* tendo por finalidade recuperar diante dominio raiz da aplicação Controller/actions/parametros
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Core;

	class Core {

		public function __construct() {

			$this->run();

		}

		public function run() : void {

			if(isset($_REQUEST["url"]) and !empty($_REQUEST["url"]) and is_string($_REQUEST["url"])) {

				$url = $_REQUEST["url"];

			}

			if(!empty($url)) {

				$url = explode("/", filter_var($url, FILTER_SANITIZE_URL));
				$controller = $url[0]."Controller";
				array_shift($url);

				if(isset($url[0]) and !empty($url[0]) and is_string($url[0])) {

					$method = $url[0];
					array_shift($url);

				}else {

					/* padrão */
					$method = "index";

				}

				$params = array();

				if(count($url) > 0) {

					$params = $url;

				}

			}else {

				$controller = "homeController";
				$method = "index";
				$params = array();

			}

			/*
			echo "Controller Requisitado: ".$controller."<br>".PHP_EOL;
			echo "Método(action) Requisitado: ".$method."<br>".PHP_EOL;
			echo "Parametros Requisitados: ".print_r($params, true);
			*/

			//define estrutura de namespaces(dirs) de localizações de controllers para ser carregados em autoload
			$controller = "App\\Controllers\\".$controller;

			//define caminho exato(dir) de localizações de controllers perante aplicação
			$dir_controllers = "agenda_contatos/App/Controllers/".$controller;

			if(!file_exists($dir_controllers) and !method_exists($controller, $method)) {

				/* caso controller acessado e sua action não exista seta controller padrão para tratamento de erros internos */
				$controller = "App\\Controllers\\notfoundController";
				$method = "index";
				$params = array();

			}

			//instancia(obj) de controller acessado
			$obj_controller = new $controller();

			//executa método(action) no controller acessado com seus devidos parametros necessários caso haja
			call_user_func_array(array($obj_controller, $method), $params);  

		}

	}
?>