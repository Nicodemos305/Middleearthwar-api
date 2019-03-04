<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/entity/Battle.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/DataSource.class.php");

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