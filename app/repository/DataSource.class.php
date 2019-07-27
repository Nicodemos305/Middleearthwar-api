<?php
namespace repository;
use PDO;

 class DataSource{

  function findOneEntity($sql){
  		$entity = null;
		try {
			$conn = $this->conectDb();
			$stmt = $conn->query($sql);
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$entity = $row;
				break;
			}
		}catch(PDOException $exception) {
			throw new Exception($exception->getMessage());
		}
		$conn = null;
		return $entity;
   }
	
   function findAllEntity($sql){
		$resultado = array ();
		 try {
			$conn = $this->conectDb();
			$stmt = $conn->query($sql);
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				array_push($resultado, $row);
			}
		}
		catch(PDOException $exception) {
			throw new Exception($exception->getMessage());
		}
		$conn = null;
		return $resultado;
   }

	function insertEntity($sql){
		try {
			$conn = $this->conectDb();
			$conn->exec($sql);
		}catch(PDOException $exception){
			throw new Exception($exception->getMessage());
		}
		$conn = null;
	}
	
	function deleteEntity($sql){
		try {
			$conn = $this->conectDb();			
			$conn->exec($sql);
		}catch(PDOException $exception){
			throw new Exception($exception->getMessage());
		}
		$conn = null;
	}

	function updateEntity($sql){
		try {
			$conn = $this->conectDb();
			$conn->exec($sql);
		}catch(PDOException $exception){
			throw new Exception($exception->getMessage());
		}
		$conn = null;
	}

	function conectDb(){
		$dbuser =  $_SERVER['MYSQL_USER'];
		$dbpass = 	$_SERVER['MYSQL_PASS'];
		$endpoint = $_SERVER['DATA_BASE_ENDPOINT'];
		$database = $_SERVER['DATA_BASE'];
		$conn = null;
		try {
			$conn = new PDO("mysql:host=$endpoint;dbname=$database", $dbuser, $dbpass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $exception){
			throw new Exception($exception->getMessage());
		}
		return $conn;
	}
}