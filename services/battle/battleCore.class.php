<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/entity/Battle.class.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/battleDao.class.php");

	class BattleCore{

	function battleBegin($battleAux){
	    $battleDao = new BattleDao();
  		$battle = $battleDao->battleRunning($battleAux->getPlayerOne(),$battleAux->getPlayerTwo());
		if($battle == null){
    		$battle  = $battleDao->battleBegin($battleAux);
  		}
  		return $battle;
	}

	function routePhaseWithCpu($battleAux,$recentPhase,$phase,$enemy,$playerOne,$phaseDao,$battleDao){
		if (is_array($battleAux)){
			$recentPhase = $phaseDao->findPhase($battleAux['id']);	
		}else{
			$recentPhase = $phaseDao->findPhase($battleAux);	
		}

		if($recentPhase == null && is_array($battleAux)){
			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($battleAux['id_hero_one']);
			$phaseDao->insert($phase);
		}else if($recentPhase['id_hero_one'] == $battleAux['id_hero_one']){
			$random = rand(1,$enemy['atk']);
			$hp1 = $battleAux['hp_hero_one'] - $random;

			$battleDao->hpMinusPlayerOne($hp1,$battleAux['id']);

			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($battleAux['id_hero_two']);
			$phaseDao->insert($phase);
		}else if($recentPhase['id_hero_one'] == $battleAux['id_hero_two']){
			$random = rand(1,$playerOne['atk']);
			$hp1 = $battleAux['hp_hero_two'] - $random;

			$battleDao->hpMinusPlayerTwo($hp1,$battleAux['id']);

			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($playerOne['id']);
			$phaseDao->insert($phase);
		}
	}
}