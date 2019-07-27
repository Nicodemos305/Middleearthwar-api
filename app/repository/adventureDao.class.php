<?php
namespace repository;
use repository\DataSource;
use entity\Adventure;

class AdventureDao extends DataSource {

	function insert(Adventure $adventure){
	     $sql = "insert into adventure values(null,'".$adventure->getName()."')";
	     parent::insertEntity($sql);
	 }

	function findAll(){
	     $sql = "select * from adventure";
	     return parent::findAllEntity($sql);
	}

	function findOne($uid){
	     $sql = "select * from adventure where id =".$uid;
	     return parent::findOneEntity($sql);
	}

	function delete($uid){
		 $sql = "delete from adventure where id =".$uid;
		return parent::deleteEntity($sql);
	}

}