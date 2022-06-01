<?php
	/*
	* Definição da classe notfoundController contendo métodos(actions) sendo responsável
	* por realizar tratamento de erros internos ocorridos perante aplicação(erro 404)
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;

	class notfoundController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function index() : void {

			$this->loadTemplate("404");

		}

	}
?>