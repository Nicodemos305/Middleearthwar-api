 <?php
namespace repository;
include_once "/var/www/html/repository/DataSource.class.php";
include_once "/var/www/html/entity/Hero.class.php";

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