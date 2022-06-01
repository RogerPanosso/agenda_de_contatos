<?php
	/*
	* Definição da classe ajaxnovocontatoController contendo métodos(actions) sendo responsável
	* por receber dados diante requisição interna e tratar obtendo retorno
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Contatos;

	class ajaxnovocontatoController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function salvarContato() : void {

			sleep(3);

			$dados = array("return" => "");

			//instancia(obj) da classe Model(Contatos)
			$contatos = new Contatos();

			//requisição interna POST
			$nome = trim(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
			$sobrenome = trim(filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING));
			$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
			$telefone = trim(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING));
			$celular = trim(filter_input(INPUT_POST, "celular", FILTER_SANITIZE_STRING));
			$id_estado = intval(filter_input(INPUT_POST, "id_estado", FILTER_SANITIZE_STRING));
			$cidade = trim(filter_input(INPUT_POST, "cidades", FILTER_SANITIZE_STRING));

			if(empty($nome) or empty($sobrenome) or empty($telefone) or empty($celular) or empty($id_estado) or empty($cidade)) {
  
				$dados["return"] = "dados null";
				header("Content-Type: application/json");
				echo json_encode($dados);
				exit();

			}

			//realiza chamada de Model(Contatos) realizando cadastro
			if($contatos->salvarContato($nome, $sobrenome, $email, $telefone, $celular, $id_estado, $cidade) == true) {

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