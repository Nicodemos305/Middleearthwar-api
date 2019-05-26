<?php
	include_once("../../entity/Battle.class.php");
    include_once("../../repository/battleDao.class.php");

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
			$phase->setDescription("Iniciou o combate entre o heroi ".$playerOne['name']." e o Heroi ".$enemy['name']);
			$phaseDao->insert($phase);
		}else if($recentPhase['id_hero_one'] == $battleAux['id_hero_one']){
			$hp1 = $battleAux['hp_hero_one'];
			$d6 = rand(1,6);
			$random = rand(1,$enemy['atk'])+$d6;

			//dano critico
			$critical = rand(1,6);
			//dano critico
		//esquiva
			$esquiva = rand(0,$playerOne['agility']);
			if($esquiva != $playerOne['agility']){
				$phase->setDescription("O Herói ".$playerOne['name']." esquivou.");
			}else{

			if($critical == 6){
				$random = $random * 2;
				$hp1 = $battleAux['hp_hero_one'] - $random;
				$phase->setDescription("O Herói ".$playerOne['name']." recebeu ".$random." de dano crítico.");
			}else{
				$hp1 = $battleAux['hp_hero_one'] - $random;
				$phase->setDescription("O Herói ".$playerOne['name']." recebeu ".$random." de dano.");
			}
			}
		//esquiva
			//$hp1 = $hp1+$playerOne['defense'];
			$battleDao->hpMinusPlayerOne($hp1,$battleAux['id']);

			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($battleAux['id_hero_two']);
			$phaseDao->insert($phase);

		}else if($recentPhase['id_hero_one'] == $battleAux['id_hero_two']){
				$hp1 = $battleAux['hp_hero_two'];
				$d6 = rand(1,6);
				$random = rand(1,$playerOne['atk']) + $d6;
				//dano critico
				$critical = rand(1,6);
				//dano critico
				
				//esquiva
				$esquiva = rand(0,$enemy['agility']);
				if($esquiva != $enemy['agility']){
					$phase->setDescription("O Herói ".$enemy['name']." esquivou.");
				}else{

				if($critical == 6){
					$random = $random * 2;
					$hp1 = $battleAux['hp_hero_two'] - $random;
					$phase->setDescription("O Herói ".$enemy['name']." recebeu ".$random." de dano crítico.");
				}else{
					$hp1 = $battleAux['hp_hero_two'] - $random;
					$phase->setDescription("O Herói ".$enemy['name']." recebeu ".$random." de dano.");
				}
			}
			//esquiva
		
			//$hp1 = $hp1 + $enemy['defense'];
			$battleDao->hpMinusPlayerTwo($hp1,$battleAux['id']);

			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($playerOne['id']);
			$phaseDao->insert($phase);
		}
	}
}