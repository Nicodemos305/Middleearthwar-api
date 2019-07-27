<?php
namespace repository;
use repository\DataSource;
use entity\Race;

class RaceDao extends DataSource {

	function insert(Race $race){
	     $sql = "insert into race values(uuid(),'".$race->getName()."','".$race->getHealthpoint()."','".$race->getMagicPoint()."','".$race->getAtk()."','".$race->getDefense()."','".$race->getAgility()."','".$race->getInteligence()."',0)";
	     parent::insertEntity($sql);
	 }

	function update(Race $race){
		$sql = "update  race set name = '".$race->getName()."',' hp = ".$race->getHealthpoint()."',' mp =".$race->getMagicPoint()."',' atk = ".$race->getAtk()."',' defense = ".$race->getDefense()."','".$race->getAgility()."','".$race->getInteligence()."',0)";
		parent::updateEntity($sql);
	}
	function findAll(){
	     $sql = "select * from race";
	     return parent::findAllEntity($sql);
	}

	function findOne($uid){
	     $sql = "select * from race where id =".$uid;
	     return parent::findOneEntity($sql);
	}

	function findByName($name){
	     $sql = "select * from race where name ='".$name."'";

	     return parent::findOneEntity($sql);
	}

	function delete($uid){
		 $sql = "delete from race where id =".$uid;
		return parent::deleteEntity($sql);
	}
}