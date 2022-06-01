<?php
	/*
	* Definição da classe novocontatoController contendo métodos(actions) sendo responsável
	* por obter controle sobre a view(html) de cadastro de novo contato
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Estados;

	class novocontatoController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function index() : void {

			$dados = array();

			//instancia(obj) da classe Model(Estados)
			$estados = new Estados();

			//realiza chamada de Model(Estados) requisitando estados
			$dados["estados"] = $estados->getEstadosAll();

			//realiza renderização de view(html) com dados requisitados
			$this->loadTemplate("novocontato", $dados);

		}

	}
?>