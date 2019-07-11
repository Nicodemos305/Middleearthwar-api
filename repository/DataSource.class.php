<?php

 class DataSource{

  function findOneEntity($sql){
  		$entity = "";
 		$conn = $this->conectDb("localhost","rpgcloud");
 		$result = $conn->query($sql);
 	
		if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
				$entity = $row;
				break;
			}
		} else {
			return null;
		}
		$conn->close();
		return $entity;
   }
	
   function findAllEntity($sql){
		
		$resultado = array ();
 		$conn = $this->conectDb("localhost","rpgcloud");
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
				array_push($resultado, $row);
			}
			return $resultado;
			
		} else {
			return null;
		}
		$conn->close();
   }

	function insertEntity($sql){
		$conn = $this->conectDb("localhost","rpgcloud");
		if ($conn->query($sql) === TRUE) {
			return mysqli_insert_id($conn);
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	

	function deleteEntity($sql){			
	   $conn = $this->conectDb("localhost","rpgcloud");
			if ($conn->query($sql) === TRUE) {
				//echo "Excluído com sucesso";
			} else {
				echo "Erro: " . $conn->error;
			}

			$conn->close();
	}

	function update($sql){
 		   $conn = $this->conectDb("localhost","rpgcloud");
			if ($conn->query($sql) === TRUE) {
				//echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}

			$conn->close();
	}

	function conectDb($host, $db){
		$dbuser = $_ENV['MYSQL_USER'];
		$dbpass = $_ENV['MYSQL_PASS'];
		$conn = new mysqli("mysql", $dbuser, $dbpass, $db);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} else{
				return $conn;
			}
	}
}
