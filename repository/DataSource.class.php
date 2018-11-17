<?php

 class DataSource{

	private $conn;	
	private $host;
	private $db;
	private $user;
	private $password;

  function find($sql){
	   
		$result = null;
	$conn =conectDb($host, $user, $password, $db);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row ;
		} else {
			return null;
		}
		$conn->close();
   }
	
   function consultarAll($sql){
		
		$resultado = array ();
 		$conn =conectDb($host, $user, $password, $db);
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
				array_push($resultado, $row);
			}
			return $resultado ;
			
		} else {
			return null;
		}
		$conn->close();
   }
	function insert($sql){
		$conn = $this->conectDb("localhost", "root", "","middleearthwar");
		if ($conn->query($sql) === TRUE) {
			return "0";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	

	function delete($sql){			
	  $conn =conectDb($host, $user, $password, $db);
			if ($conn->query($sql) === TRUE) {
				echo "Excluído com sucesso";
			} else {
				echo "Erro: " . $conn->error;
			}

			$conn->close();
	}

	function update($sql){
 		$conn =conectDb($host, $user, $password, $db);
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}

			$conn->close();
	}

	function conectDb($host, $user, $password, $db){
		$conn = new mysqli($host, $user, $password, $db);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} else{
				return $conn;
			}
	}
}
