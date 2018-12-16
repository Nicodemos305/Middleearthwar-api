 <?php

  include_once("../../entity/Hero.class.php");
  include_once("DataSource.class.php");

class HeroDao {

	function insert(Hero $hero,$id){
	     $dataSource = new DataSource();
	     $sql = "insert into hero values(null,'".$hero->getName()."','".$hero->getRace()."','".$hero->getHp()."','".$hero->getMp()."','".$hero->getAtk()."','".$hero->getDefense()."','".$hero->getAgility()."','".$hero->getInteligence()."','".$id."')";
	     $dataSource->insert($sql);
	 }

	function findAll(){
	     $dataSource = new DataSource();
	     $sql = "select * from hero";
	     return $dataSource->findAll($sql);
	}

	function findOne($id){
	     $dataSource = new DataSource();
	     $sql = "select * from hero where id =".$id;
	     return $dataSource->findAll($sql);
	}

	function delete($id){
		$dataSource = new DataSource();
		 $sql = "delete from hero where id =".$id;
		return $dataSource->delete($sql);
	}
}