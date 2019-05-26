<?php
   include_once("../entity/Player.class.php");
   include_once("DataSource.class.php");

class PlayerDao extends DataSource {

	function insert(Player $player){
	     $sql = "insert into player values(null,'".$player->getLogin()."','".$player->getPassword()."','".$player->getEmail()."')";
	     parent::insertEntity($sql);
	 }

	function findAll(){
	     $sql = "select * from player";
	     return parent::findAllEntity($sql);
	}

	function findOne($id){
	     $sql = "select * from player where id =".$id;
	     return parent::findOneEntity($sql);
	}

	function delete($id){
		 $sql = "delete from player where id =".$id;
		 parent::deleteEntity($sql);
	}

	function signIn($login,$password){
		 $sql = "select login, email  from player where login ='$login' and password ='$password'";
		 return parent::findOneEntity($sql);
	}
}