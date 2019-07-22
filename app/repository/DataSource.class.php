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
			echo $exception->getMessage();
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
			echo $exception->getMessage();
		}
		$conn = null;
		return $resultado;
   }

	function insertEntity($sql){
		try {
			$conn = $this->conectDb();
			$conn->exec($sql);
		}catch(PDOException $exception){
			echo $e->getMessage();
		}
		$conn = null;
	}
	

	function deleteEntity($sql){
		try {
			$conn = $this->conectDb();			
			$conn->exec($sql);
		}catch(PDOException $exception){
			echo $exception->getMessage();
		}
		$conn = null;
	}

	function update($sql){
		try {
			$conn = $this->conectDb();
			$stmt = $conn->prepare($sql);
			$stmt->execute();
		}catch(PDOException $exception){
			echo $exception->getMessage();
		}
		$conn = null;
	}

	function conectDb(){
		$dbuser = isset($_ENV['MYSQL_USER']) ? $_ENV['MYSQL_USER'] : "root";
		$dbpass = isset($_ENV['MYSQL_PASS']) ? $_ENV['MYSQL_PASS'] : "";
		$endpoint = isset($_ENV['DATA_BASE_ENDPOINT']) ? $_ENV['DATA_BASE_ENDPOINT'] : "localhost";
		$database = isset($_ENV['DATA_BASE']) ? $_ENV['DATA_BASE'] : "rpgcloud";
		$conn = null;
		try {
			$conn = new PDO("mysql:host=$endpoint;dbname=$database", $dbuser, $dbpass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $exception){
			echo "Connection failed: " . $exception->getMessage();
		}
		return $conn;
	}
}