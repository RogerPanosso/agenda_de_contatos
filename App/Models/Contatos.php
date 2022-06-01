<?php
	/*
	* Definição da classe Contatos(Model) sendo model referente a requisições a banco de dados
	* tendo por finalidade realizar requisições aos dados bem como determinadas manipulações
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Models;

	use App\Core\Model;

	class Contatos extends Model {

		public function getContatosAll() {
			
			$array = array();

			$query = "SELECT contatos.id, contatos.nome, contatos.sobrenome, contatos.email, contatos.telefone, contatos.celular, estados.estado, contatos.cidade FROM contatos INNER JOIN estados ON contatos.id_estado = estados.id";
			$query = $this->pdo->query($query);

			if($query->rowCount() > 0) {

				$array = $query->fetchAll(\PDO::FETCH_ASSOC);

			}

			return $array;

		}

		public function getContatosId($id_estado) {

			$array = array();

			$query = "SELECT contatos.id, contatos.nome, contatos.sobrenome, contatos.email, contatos.telefone, contatos.celular, estados.estado, contatos.cidade FROM contatos INNER JOIN estados ON contatos.id_estado = estados.id WHERE contatos.id_estado = :id_estado ORDER BY contatos.nome ASC";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":id_estado", $id_estado);
			$query->execute();

			if($query->rowCount() > 0) {

				$array = $query->fetchAll(\PDO::FETCH_ASSOC);

			}

			return $array;

		}

		//método private auxiliar
		private function verificaCadastro($email, $telefone, $celular) {

			$query = "SELECT * FROM contatos WHERE email = :email or telefone = :telefone or celular = :celular";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":email", $email);
			$query->bindValue(":telefone", $telefone);
			$query->bindValue(":celular", $celular);
			$query->execute();

			if($query->rowCount() === 0) {

				return true;

			}else {

				return false;

			}

		}

		public function salvarContato($nome, $sobrenome, $email, $telefone, $celular, $id_estado, $cidade) {

			if($this->verificaCadastro($email, $telefone, $celular) == true) {

				//INSERT
				$query = "INSERT INTO contatos (nome,sobrenome,email,telefone,celular,id_estado,cidade) VALUES (:nome,:sobrenome,:email,:telefone,:celular,:id_estado,:cidade)";
				$query = $this->pdo->prepare($query);
				$query->bindValue(":nome", $nome);
				$query->bindValue(":sobrenome", $sobrenome);
				$query->bindValue(":email", $email);
				$query->bindValue(":telefone", $telefone);
				$query->bindValue(":celular", $celular);
				$query->bindValue(":id_estado", $id_estado);
				$query->bindValue(":cidade", $cidade);
				$query->execute();

				return true;

			}

		}

		public function editarContato($id) {

			$array = array();

			$query = "SELECT * FROM contatos WHERE id = :id";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":id", $id);
			$query->execute();

			if($query->rowCount() > 0) {

				$array = $query->fetch(\PDO::FETCH_ASSOC);

			}

			return $array;

		}

		public function editar($id, $nome, $sobrenome, $email, $telefone, $celular, $id_estado, $cidade) {

			$query = "UPDATE contatos SET nome = :nome, sobrenome = :sobrenome, email = :email, telefone = :telefone, celular = :celular, id_estado = :id_estado, cidade = :cidade WHERE id = :id";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":nome", $nome);
			$query->bindValue(":sobrenome", $sobrenome);
			$query->bindValue(":email", $email);
			$query->bindValue(":telefone", $telefone);
			$query->bindValue(":celular", $celular);
			$query->bindValue(":id_estado", $id_estado);
			$query->bindValue(":cidade", $cidade);
			$query->bindValue(":id", $id);
			$query->execute();

			return true;

		}

		public function excluir($id) {

			$query = "DELETE FROM contatos WHERE id = :id";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":id", $id);
			$query->execute();

			return true;

		}

		public function getEmailContato($id) {

			$query = "SELECT email FROM contatos WHERE id = :id";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":id", $id);
			$query->execute();
			$query = $query->fetch(\PDO::FETCH_ASSOC);
			$email_contato = $query["email"];

			return $email_contato;

		}

	}
?>