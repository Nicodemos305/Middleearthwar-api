<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/entity/Battle.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/DataSource.class.php");

class BattleDao extends DataSource{

	function battleBegin(Battle $battle){
  		$sql = "insert into battle values(null,'".$battle->getPlayerOne()."','".$battle->getPlayerTwo()."','RUNING',0)";
	    return parent::insertEntity($sql);

	}

	function battleEnd($idBattle,$idWinner){
  		$sql = "update battle set win_battle = ".$idWinner." where id = ".$idBattle;
	    parent::update($sql);

	}

	function searchEnemy($idHero){
		$sql = "select * from hero where id <> ".$idHero;
		return parent::findOneEntity($sql);
	}

}