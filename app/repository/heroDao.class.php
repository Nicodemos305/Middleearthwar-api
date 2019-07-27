<?php
namespace repository;
use repository\DataSource;
use entity\Hero;

class HeroDao extends DataSource {

	function insert(Hero $hero,$uid){
	     $sql = "insert into hero values(null,'".$hero->getName()."','".$hero->getRace()."','".$hero->getHp()."','".$hero->getMp()."','".$hero->getAtk()."','".$hero->getDefense()."','".$hero->getAgility()."','".$hero->getInteligence()."','".$uid."', '1')";
	     parent::insertEntity($sql);
	 }

	function findAll(){
	     $sql = "select * from hero";
	     return parent::findAllEntity($sql);
	}

	function findOne($uid){
	     $sql = "select * from hero where id =".$uid;
	     return parent::findOneEntity($sql);
	}

	function delete($uid){
		 $sql = "delete from hero where id =".$uid;
		return parent::deleteEntity($sql);
	}
}