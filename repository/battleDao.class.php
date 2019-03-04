<?php

include_once("../../entity/Battle.class.php");
include_once("DataSource.class.php");

class BattleDao extends DataSource{

	function battleBegin(Battle $battle){
  		$sql = "insert into battle values(null,'".$battle->getPlayerOne()->getId()."','".$battle->getPlayerTwo()->getId()."','RUNING',0)";
	    parent::insertEntity($sql);

	}

	function searchEnemy($idHero){
		$sql = "select * from hero where id <> ".$idHero;
		return parent::findOneEntity($sql);
	}

}