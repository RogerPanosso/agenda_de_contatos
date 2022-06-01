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