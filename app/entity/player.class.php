<?php 

class Player{

	private $id;
 	private $login;
	private $password;
 	private $email;

 public function __construct($id, $login, $password, $email) {
        $this->login = $login;
        $this->password = $password;
		$this->email = $email;
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}
}
