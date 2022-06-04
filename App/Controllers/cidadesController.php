<?php
	/*
	* Definição da classe cidadesController contendo métodos(actions) sendo responsável
	* por obter controle a view(html) dinâmico de listagem de cidades
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Cidades;

	class cidadesController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function index() : void {

			$dados = array();

			//instancia(obj) da classe Model(Cidades)
			$cidades = new Cidades();

			//realiza chamada de Model(Cidades) requisitando dados
			$dados["cidades"] = $cidades->getCidadesAll();

			//realiza chamada de view(html) dinâmico com dados de model
			$this->loadTemplate("cidades", $dados);

		}

	}
?>