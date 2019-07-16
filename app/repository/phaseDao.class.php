<?php

include_once("DataSource.class.php");
include_once("../../entity/Phase.class.php");

class PhaseDao extends DataSource {

	function insert(Phase $phase){
	     $sql = "insert into phase values(null,".$phase->getPlayer_id().",".$phase->getBattle_id().",'".$phase->getDescription()."')";
	     parent::insertEntity($sql);
	 }

	function findAllPhases($id_battle){
	     $sql = "select * from phase where id_battle =".$id_battle;
	     return parent::findAllEntity($sql);
	}

	function findPhase($id_battle){
	     $sql = "select * from phase where id_battle =".$id_battle." ORDER BY id DESC limit 1";
	     return parent::findOneEntity($sql);
	}
}