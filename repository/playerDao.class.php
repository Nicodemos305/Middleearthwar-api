<?php
   include_once("../../entity/Player.class.php");
   include_once("DataSource.class.php");

class PlayerDao{

	function insert(Player $player){
	     $dataSource = new DataSource();
	     $sql = "insert into player values(null,'".$player->getLogin()."','".$player->getPassword()."','".$player->getEmail()."')";
	     $dataSource->insert($sql);
	 }

	function findAll(){
	     $dataSource = new DataSource();
	     $sql = "select * from player";
	     return $dataSource->findAll($sql);
	}

	function findOne($id){
	     $dataSource = new DataSource();
	     $sql = "select * from player where id =".$id;
	     return $dataSource->findAll($sql);
	}

	function delete($id){
		$dataSource = new DataSource();
		 $sql = "delete from player where id =".$id;
		 $dataSource->delete($sql);
	}
}