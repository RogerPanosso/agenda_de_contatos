<?php
	/*
	* Definição da classe relatorioController contendo métodos(actions) sendo responsável por obter controle
	* a view(html) de relatório de contatos
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Estados;
	use App\Models\Contatos;
	use Dompdf\Dompdf;
	use Dompdf\Options;

	class relatorioController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function index() : void {

			$dados = array();

			//instancia(obj) da classe Model(Estados)
			$estados = new Estados();

			//realiza chamada de Model requisitando estados
			$dados["estados"] = $estados->getEstadosAll();

			//realiza chamada de view(html) dinâmico
			$this->loadTemplate("relatorio", $dados);

		}

		public function gerar() : void {

			$dados = array();

			//instancia(obj) da classe Model(Contatos)
			$contatos = new Contatos();

			//requisição POST
			$id_estado = intval(filter_input(INPUT_POST, "id_estado", FILTER_SANITIZE_NUMBER_INT));
			$font = trim(filter_input(INPUT_POST, "font", FILTER_SANITIZE_STRING));
			$folha = trim(filter_input(INPUT_POST, "folha", FILTER_SANITIZE_STRING));
			$estilo_folha = trim(filter_input(INPUT_POST, "estilo_folha", FILTER_SANITIZE_STRING));
			$forma_acesso = trim(filter_input(INPUT_POST, "forma_acesso", FILTER_SANITIZE_STRING));

			//realiza validação diante variaveis
			if(empty($id_estado) or empty($font) or empty($folha) or empty($estilo_folha) or empty($forma_acesso)) {

				header("Location: ".$this->getBaseUrl()."relatorio");
				exit();

			}

			//realiza chamada de Model(Contatos) requisitando contatos gerais
			$dados["contatos"] = $contatos->getContatosId($id_estado);

			//realiza validação diante retorno de Model(Contatos) caso haja dados requisitados inicia procedimento
			if(!empty($dados["contatos"])) {

				//inicia procedimento de cachear informações(html) salvando na memória
				ob_start();
				$this->loadView("htmlrelatorio", $dados);
				$html_end = ob_get_contents();
				ob_end_clean();

				//instancia(obj) da classe Options auxiliar a Dompdf setando funcionalidades
				$options = new Options();
				$options->setDefaultFont($font);
				$options->setChroot(__DIR__);
				//$options->setIsRemoteEnabled(TRUE);
				$options->setIsPhpEnabled(TRUE);
				$options->setIsHtml5ParserEnabled(TRUE);
				$options->setFontHeightRatio(1);
				$options->setDefaultPaperSize($folha);
				$options->setDefaultPaperOrientation($estilo_folha);

				//instancia(obj) da classe Dompdf agregando objeto $options injeção de dependencia
				$dompdf = new Dompdf($options);
				$dompdf->loadHtml($html_end);
				$dompdf->setBaseHost("localhost");
				$dompdf->render();

				//realiza validação diante forma de acesso para geração de relatório final
				if($forma_acesso == "pdf-navegador") {

					header("Content-Type: application/pdf");
					echo $dompdf->output();
					exit();

				}elseif($forma_acesso == "pdf-download") {

					$dompdf->stream("relatorio.pdf", array("Attachment" => true));
					exit();

				}

			}else {

				header("Location: ".$this->getBaseUrl()."relatorio");
				exit();

			}

		}

	}
?>