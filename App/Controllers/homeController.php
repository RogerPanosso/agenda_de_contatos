<?php
	/*
	* Definição da classe homeController sendo controller padrão a ser acessado diante aplicação
	* contendo métodos(actions) sendo responsável por obter controle a view(html) home
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Contatos;
	use App\Models\Estados;

	class homeController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function index() : void {

			$dados = array();

			//instancias(obj) de Model(Contatos)
			$data = new \DateTime();
			$contatos = new Contatos();
			
			$dados["data_atual"] = $data->format("d/m/Y");

			//retorno diante requisição em Model(Contatos)
			$dados["contatos"] = $contatos->getContatosAll();

			//realiza chamada de view(html) dinâmico com dados recebidos de Model(Contatos)
			$this->loadTemplate("home", $dados);

		}

		public function editarContato($id) : void {

			if(isset($id) and !empty($id)) {

				$dados = array();

				//instancias(obj) das classes Models(Contatos e Estados)
				$contatos = new Contatos();
				$estados = new Estados();

				//realiza chamada de Model requisitando registro de contato
				$dados["contato"] = $contatos->editarContato($id);
				$dados["estados"] = $estados->getEstadosAll();

				//realiza chamada de view(html) dinâmico com dados recebidos de Model(Contatos)
				$this->loadTemplate("editarcontato", $dados);

			}else {

				header("Location: ".$this->getBaseUrl()."home");
				exit();

			}

		}

		public function excluir() : void {

			//recebe id diante requisição POST
			$id = intval(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT));

			if(!empty($id)) {

				$dados = array("return" => "");

				//instancia(obj) da classe Model(Contatos)
				$contatos = new Contatos();

				if($contatos->excluir($id) == true) {

					$dados["return"] = "success";

				}

				header("Content-Type: application/json");
				echo json_encode($dados);
				exit();

			}

		}

		public function envioEmail($id) : void {

			if(isset($id) and !empty($id)) {

				$dados = array();

				//instancia(obj) da classe Model(Contatos)
				$contatos = new Contatos();

				//realiza requisição em Model(getEmailContato)
				$dados["email_contato"] = $contatos->getEmailContato($id);

				//realiza chamada de view(html) dinâmico com dado recebido de Model(Contatos)
				$this->loadTemplate("envioemail", $dados);

			}else {

				header("Location: ".$this->getBaseUrl()."home");
				exit();

			}

		}

	}
?>