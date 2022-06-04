<?php
	/*
	* Definição da classe Cidades(Model) tendo por finalidade realizar requisições aos dados
	* e obter acessos a banco de dados
	* Package agenda_conatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Models;

	use App\Core\Model;

	class Cidades extends Model {

		//método auxiliar private
		private function verificaCadastro($id_estado, $cidade) {

			$query = "SELECT * FROM cidades WHERE id_estado = :id_estado and cidade = :cidade";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":id_estado", $id_estado);
			$query->bindValue(":cidade", $cidade);
			$query->execute();

			if($query->rowCount() === 0) {

				return true;

			}else {

				return false;

			}

		}

		public function salvarCidade($id_estado, $cidade) {

			if($this->verificaCadastro($id_estado,$cidade) == true) {

				$query = "INSERT INTO cidades (id_estado,cidade) VALUES (:id_estado,:cidade)";
				$query = $this->pdo->prepare($query);
				$query->bindValue(":id_estado", $id_estado);
				$query->bindValue(":cidade", $cidade);
				$query->execute();

				return true;

			}

		}

		public function getCidadesAll() {

			$array = array();

			$query = "SELECT cidades.id, cidades.cidade, estados.estado FROM cidades INNER JOIN estados ON cidades.id_estado = estados.id ORDER BY cidades.cidade ASC";
			$query = $this->pdo->query($query);

			if($query->rowCount() > 0) {

				$array = $query->fetchAll(\PDO::FETCH_ASSOC);

			}

			return $array;

		}

		public function getCidades($id_estado) {

			$array = array();

			$query = "SELECT * FROM cidades WHERE id_estado = :id_estado ORDER BY cidade ASC";
			$query = $this->pdo->prepare($query);
			$query->bindValue(":id_estado", $id_estado);
			$query->execute();

			if($query->rowCount() > 0) {

				$array = $query->fetchAll(\PDO::FETCH_ASSOC);

			}

			return $array;

		}

	}
?>