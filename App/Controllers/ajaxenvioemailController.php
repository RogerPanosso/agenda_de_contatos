<?php
	/*
	* Definição da classe ajaxenvioemailController contendo métodos(actions) sendo responsável por
	* receber dados dainte requisição interna e tratar para obter retorno
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Controllers;

	use App\Core\Controller;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	class ajaxenvioemailController extends Controller {

		public function __construct() {

			parent::__construct();

		}

		public function enviar() : void {

			$dados = array("return" => "");

			sleep(3);

			//requisição interna POST
			$email_destino = trim(filter_input(INPUT_POST, "email_destino", FILTER_SANITIZE_EMAIL));
			$assunto = trim(filter_input(INPUT_POST, "assunto", FILTER_SANITIZE_STRING));
			$mensagem = trim(filter_input(INPUT_POST, "mensagem", FILTER_SANITIZE_STRING));

			//realiza validação diante veriaveis
			if(empty($email_destino) or empty($assunto) or empty($mensagem)) {

				$dados["return"] = "dados null";
				header("Content-Type: application/json");
				echo json_encode($dados);
				exit();

			}

			$dados["email_destino"] = $email_destino;
			$dados["assunto"] = $assunto;
			$dados["mensagem"] = $mensagem;

			//instancia(obj) da classe PHPMailer()
			$mail = new PHPMailer(true);

			//define bloco try catch tratando e capturando exceções ocorridas ao utilizar atributos e métodos da biblioteca(classe PHPMailer)
			try {
				
				//define configurações de servidor para envio(Cliente utilizado: G-Mail)
				//$mail->SMTPDebug = SMTP::DEBUG_SERVER; //reporta status geral da requisição ao realizar envio(DEBUG_SERVER)
				$mail->isSMTP();
				$mail->SMTPAuth = true;
				$mail->Host = "smtp.gmail.com";
				$mail->CharSet = "UTF-8";
				$mail->Username = "barbershopdev@gmail.com";
				$mail->Password = "barbershopdev2021@";
				$mail->Port = 587;

				//define configurações de envio(de remetente a destinatario)
				$mail->setFrom("barbershopdev@gmail.com", "Agenda de Contatos");
				$mail->addAddress($email_destino);

				//define configurações para o corpo do e-mail(permitindo HTML)
				$mail->isHTML(true);
				$mail->Subject = $assunto;

				ob_start();
				$this->loadView("htmlemail", $dados);
				$html = ob_get_contents();
				ob_end_clean();

				$mail->Body = $html;

				//realiza validação diante método(send) verificando se envio foi realizado
				if($mail->send()) {

					$dados["return"] = "success";

				}
 
			} catch (Exception $erro) {

				$dados["return"] = "erro";
				$dados["info"] = $maail->errorInfo;
				
			}

			header("Content-Type: application/json");
			echo json_encode($dados);
			exit();

		}

	}
?>