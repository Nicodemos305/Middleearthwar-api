<?php
   include_once("../entity/Player.class.php");
   include_once("DataSource.class.php");

class PlayerDao extends DataSource {

	function insert(Player $player){
	     $sql = "insert into player values(null,'".$player->getLogin()."','".$player->getPassword()."','".$player->getEmail()."')";
	     parent::insert($sql);
	 }

	function findAll(){
	     $sql = "select * from player";
	     return parent::findAll($sql);
	}

	function findOne($id){
	     $sql = "select * from player where id =".$id;
	     return parent::findAll($sql);
	}

	function delete($id){
		 $sql = "delete from player where id =".$id;
		 parent::delete($sql);
	}
}