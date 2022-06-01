<?php
	/*
	* Definição da classe Controller(Auxiliar) sendo uma classe base para ser herdada
	* diante seus controllers de acessos por usuários. Tendo por finalidade realizar
	* carregamento de conteúdo final como renderizações de views(html) dinâmicos
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Core;

	class Controller {

		protected array $dados;

		public function __construct() {

			$this->dados = array();

		}

		public function loadTemplate(string $nomeView, array $dados = array()) {

			$this->dados = $dados;
			require_once "../App/Config/Config.php";
			require_once "../App/Views/Parcial/template.php";

		}

		public function loadViewInTemplate(string $nomeView, array $dados = array()) {

			extract($dados); //ou extract($this->dados)
			require_once "../App/Config/Config.php";
			require_once "../App/Views/Pages/".$nomeView.".php";

		}

		public function loadView(string $nomeView, array $dados = array()) {

			extract($dados); //ou extract($this->dados)
			require_once "../App/Config/Config.php";
			require_once "../App/Views/Pages/".$nomeView.".php";

		}

		public function getBaseUrl() : string {

			require_once "../App/Config/Config.php";
			$base_url = BASE_URL;
			return $base_url;

		}

	}
?>