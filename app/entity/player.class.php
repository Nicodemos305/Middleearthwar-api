<?php 

class Player{

 	private $login;
	private $password;
 	private $email;

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
