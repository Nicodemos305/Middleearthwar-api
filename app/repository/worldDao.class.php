<?php
namespace repository;
use entity\World;
use repository\DataSource;

class WorldDao extends DataSource {

	function insert(World $world){
	     $sql = "insert into world values(null,'".$world->getName()."','".$world->getDescription()."')";
	     parent::insertEntity($sql);
	 }

	function findAll(){
	     $sql = "select * from world";
	     return parent::findAllEntity($sql);
	}

	function findOne($id){
	     $sql = "select * from world where id =".$id;
	     return parent::findOneEntity($sql);
	}

	function delete($id){
		 $sql = "delete from world where id =".$id;
		return parent::deleteEntity($sql);
	}
}