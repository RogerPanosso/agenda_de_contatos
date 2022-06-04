<?php
	/*
	* Definição da classe ajaxnovacidadeController contendo métodos(actions) sendo responsável
	* por receber dados diante requisição interna e tratar para obter retorno
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Cidades;

	class ajaxnovacidadeController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function salvarCidade() : void {

			$dados = array("return" => "");

			sleep(3);

			//instancia(obj) da classe Model(Cidades)
			$cidades = new Cidades();

			//requisição interna POST
			$cidade = trim(filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING));
			$id_estado = intval(filter_input(INPUT_POST, "id_estado", FILTER_SANITIZE_NUMBER_INT));

			//realiza validação diante variaveis
			if(empty($cidade) or empty($id_estado)) {

				$dados["return"] = "dados null";
				header("Content-Type: application/json");
				echo json_encode($dados);
				exit();

			}

			//realiza chamada de Model(Cidade) cadastrando cidade
			if($cidades->salvarCidade($id_estado, $cidade) == true) {

				$dados["return"] = "success";

			}else {

				$dados["return"] = "exist";

			}

			//retorna array de retorno em json(object)
			header("Content-Type: application/json");
			echo json_encode($dados);
			exit();

		}

	}
?>