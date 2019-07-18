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
		}catch(PDOException $e) {
			echo $e->getMessage();
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
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$conn = null;
		return $resultado;
   }

	function insertEntity($sql){
		try {
			$conn = $this->conectDb();
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
	}
	

	function deleteEntity($sql){
		try {
			$conn = $this->conectDb();			
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
	}

	function update($sql){
		try {
			$conn = $this->conectDb();
			$stmt = $conn->prepare($sql);
			$stmt->execute();		
			echo $stmt->rowCount() . " records UPDATED successfully";
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
	}

	function conectDb(){
		$dbuser = $_ENV['MYSQL_USER'];
		$dbpass = $_ENV['MYSQL_PASS'];
		$endpoint = $_ENV['DATA_BASE_ENDPOINT'];
		$db = $_ENV['DATA_BASE'];
		$conn = null;
		try {
			$conn = new PDO("mysql:host=$endpoint;dbname=$db", $dbuser, $dbpass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		return $conn;
	}
}