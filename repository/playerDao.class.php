<?php
   include_once("../../entity/Player.class.php");
 include_once("DataSource.class.php");

class PlayerDao{
 
	function insert(Player $player){
	   $dataSource = new DataSource();
	   $sql = "insert into player values(null,'".$player->getLogin()."','".$player->getPassword()."','".$player->getEmail()."')";
	   $dataSource->insert($sql);
	 }

}




