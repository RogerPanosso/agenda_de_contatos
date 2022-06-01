<?php
	/*
	* Definição da classe ajaxcidadesController contendo métodos(actions) sendo responsável por receber
	* dados diante requisição interna ajax e tratar dados para obter retorno
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Cidades;

	class ajaxcidadesController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function getCidades() : void {

			//requisição interna POST
			$id_estado = intval(filter_input(INPUT_POST, "id_estado", FILTER_SANITIZE_NUMBER_INT));

			if(!empty($id_estado)) {

				//instancia(obj) da classe Model(Cidades)
				$cidades = new Cidades();

				//realiza chamada de Model requisitando cidades(getCidades)
				$dados = $cidades->getCidades($id_estado);

				//retorna array de dados em json(object)
				header("Content-Type: application/json");
				echo json_encode($dados);
				exit();

			}else {

				header("Location: ".$this->getBaseUrl()."novocontato");
				exit();

			}

		}

	}
?>