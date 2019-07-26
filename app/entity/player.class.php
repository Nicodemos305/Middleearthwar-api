<?php 
namespace entity;
class Player{

	private $uuid;
 	private $login;
	private $password;
 	private $email;

 public function __construct($uuid, $login, $password, $email) {
        $this->login = $login;
        $this->password = $password;
		$this->email = $email;
		$this->uuid = $uuid;
	}
	
	public function getUuid(){
		return $this->uuid;
	}

	public function setUuid($uuid){
		$this->uuid = $uuid;
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
