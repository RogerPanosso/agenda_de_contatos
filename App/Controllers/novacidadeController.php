<?php
	/*
	* Definição da classe novacidadeController contendo métodos(actions) sendo responsável
	* por obter controle a view(html) dinâmico de cadastro de novas cidades
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Estados;

	class novacidadeController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function index() : void {

			$dados = array();

			//instancia(obj) da classe Model(Estados)
			$estados = new Estados();

			//realiza chamada de Model(Estados) requisitando estados
			$dados["estados"] = $estados->getEstadosAll();

			//realiza chamada de view(html) com dados dinâmicos
			$this->loadTemplate("novacidade", $dados);

		}

	}
?>