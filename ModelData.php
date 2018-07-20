<?php
require 'connOracle.php';
class ModelData extends DBO {
	public function getData($table){
		$stmt = $this->connect()->query("SELECT * FROM $table WHERE ROWNUM <= 1000");
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	public function getFilter($column, $table){
		$stmt = $this->connect()->query("SELECT DISTINCT $column FROM  $table ORDER BY $column ASC");
		$row = $stmt->fetchAll(PDO::FETCH_NUM);
		return $row;
	}

	public function getResultFilter($query){
		$stmt = $this->connect()->query($query);
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}
}