 <?php
include_once "DataSource.class.php";
include_once "/var/www/html/entity/Race.class.php";

class RaceDao extends DataSource {

	function insert(Race $race){
	     $sql = "insert into race values(null,'".$race->getName()."','".$race->getHp()."','".$race->getMp()."','".$race->getAtk()."','".$race->getDefense()."','".$race->getAgility()."','".$race->getInteligence()."',0)";
	     parent::insertEntity($sql);
	 }

	function findAll(){
	     $sql = "select * from race";
	     return parent::findAllEntity($sql);
	}

	function findOne($id){
	     $sql = "select * from race where id =".$id;
	     return parent::findOneEntity($sql);
	}

	function findByName($name){
	     $sql = "select * from race where name ='".$name."'";

	     return parent::findOneEntity($sql);
	}

	function delete($id){
		 $sql = "delete from race where id =".$id;
		return parent::deleteEntity($sql);
	}
}