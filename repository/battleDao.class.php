<?php

include_once("../../entity/Battle.class.php");
include_once("DataSource.class.php");

class BattleDao{

	function battleBegin(Battle $battle){
		$dataSource = new DataSource();
  		$sql = "insert into battle values(null,'".$battle->getPlayerOne()->getId()."','".$battle->getPlayerTwo()->getId()."','RUNING',0)";
	    $dataSource->insert($sql);

	}


	function searchEnemy($idHero){
		$dataSource = new DataSource();
		$sql = "select * from hero where id <> ".$idHero;
		return $dataSource->findOne($sql);
	}






}