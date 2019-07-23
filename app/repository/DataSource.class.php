<?php
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
		$dbuser = getenv('MYSQL_USER') != null ? getenv('MYSQL_USER') : "root";
		$dbpass = getenv('MYSQL_PASS') != null ? getenv('MYSQL_PASS') : "";
		$endpoint = getenv('DATA_BASE_ENDPOINT') != null ? getenv('DATA_BASE_ENDPOINT') : "localhost";
		$database = getenv('DATA_BASE') != null ? getenv('DATA_BASE') : "rpgcloud";
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