<?php
namespace repository;
use repository\DataSource;
use entity\Phase;

class PhaseDao extends DataSource {

	function insert(Phase $phase){
	     $sql = "insert into phase values(uuid(), '".$phase->getPlayer_id()."', '".$phase->getBattle_id()."','".$phase->getDescription()."')";
	     parent::insertEntity($sql);
	 }

	function findAllPhases($id_battle){
	     $sql = "select * from phase where id_battle ='".$id_battle."'";
	     return parent::findAllEntity($sql);
	}

	function findPhase($id_battle){
	     $sql = "select * from phase where id_battle = '".$id_battle."' ORDER BY uuid DESC limit 1";
	     return parent::findOneEntity($sql);
	}
}