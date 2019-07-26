<?php
namespace repository;
include_once "/var/www/html/entity/Battle.class.php";
include_once "DataSource.class.php";

class BattleDao extends DataSource{

	function battleBegin(Battle $battle){
  		$sql = "insert into battle values(null,'".$battle->getPlayerOne()."','".$battle->getPlayerTwo()."',".$battle->getHpOne().",".$battle->getHpTwo().",'RUNING',0)";
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

	function battleRunning($id_hero_one,$id_hero_two){
		$sql = "select * from battle where id_hero_one = $id_hero_one and id_hero_two = $id_hero_two and status_battle = 'RUNING' and win_battle = 0";
		return parent::findOneEntity($sql);
	}

	function myBattleRunning($id_hero){
		$sql = "select * from battle where id_hero_one = $id_hero and status_battle = 'RUNING' and win_battle = 0";
		return parent::findOneEntity($sql);
	}

	function hpMinusPlayerOne($hp,$id_battle){
		$sql = "update battle set hp_hero_one = ".$hp." where id = ".$id_battle;
		parent::update($sql);

	}

	function hpMinusPlayerTwo($hp,$id_battle){
		$sql = "update battle set hp_hero_two = ".$hp." where id = ".$id_battle;
		parent::update($sql);
	}
}