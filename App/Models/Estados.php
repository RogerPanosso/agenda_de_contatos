<?php
	/*
	* Definição da classe Estados(Model) tendo por finalidade realizar requisições e acessos
	* aos dados diante banco de dados perante aplicação
	* Package agenda_contatos
	* Author <rogerninopa@gmail.com>
	*/
	namespace App\Models;

	use App\Core\Model;

	class Estados extends Model {

		public function getEstadosAll() {

			$array = array();

			$query = "SELECT * FROM estados ORDER BY estado ASC";
			$query = $this->pdo->query($query);

			if($query->rowCount() > 0) {

				$array = $query->fetchAll(\PDO::FETCH_ASSOC);

			}

			return $array;

		}

	}
?>