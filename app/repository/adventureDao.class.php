<?php

include_once("DataSource.class.php");
include_once("/var/www/html/entity/Adventure.class.php");

class AdventureDao extends DataSource {

	function insert(Adventure $adventure){
	     $sql = "insert into adventure values(null,'".$adventure->getName()."')";
	     parent::insertEntity($sql);
	 }

	function findAll(){
	     $sql = "select * from adventure";
	     return parent::findAllEntity($sql);
	}

	function findOne($id){
	     $sql = "select * from adventure where id =".$id;
	     return parent::findOneEntity($sql);
	}

	function delete($id){
		 $sql = "delete from adventure where id =".$id;
		return parent::deleteEntity($sql);
	}

}