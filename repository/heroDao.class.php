 <?php

  include_once("../entity/Hero.class.php");
  include_once("DataSource.class.php");

class HeroDao extends DataSource {

	function insert(Hero $hero,$id){
	     $sql = "insert into hero values(null,'".$hero->getName()."','".$hero->getRace()."','".$hero->getHp()."','".$hero->getMp()."','".$hero->getAtk()."','".$hero->getDefense()."','".$hero->getAgility()."','".$hero->getInteligence()."','".$id."')";
	     parent::insert($sql);
	 }

	function findAll(){
	     $sql = "select * from hero";
	     return parent::findAll($sql);
	}

	function findOne($id){
	     $sql = "select * from hero where id =".$id;
	     return parent::indAll($sql);
	}

	function delete($id){
		 $sql = "delete from hero where id =".$id;
		return parent::delete($sql);
	}
}