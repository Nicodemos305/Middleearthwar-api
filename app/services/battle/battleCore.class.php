<?php
	
include_once("../../entity/Battle.class.php");
include_once("../../repository/battleDao.class.php");

class BattleCore{

	function routePhaseWithCpu($battleAux,$recentPhase,$phase,$enemy,$playerOne,$phaseDao,$battleDao){
		$hp1 = 0;
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

			//esquiva
			$esquiva = rand(0,$playerOne['agility']);
			if($esquiva == $playerOne['agility']){
				$phase->setDescription("O Herói ".$playerOne['name']." esquivou.");
			}else{
				$phase = $this->damage($battleAux, $phase, $random, $playerOne, $battleDao);
			}
		

			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($battleAux['id_hero_two']);
			$phaseDao->insert($phase);

		}else if($recentPhase['id_hero_one'] == $battleAux['id_hero_two']){
				$hp1 = $battleAux['hp_hero_two'];
				$d6 = rand(1,6);
				$random = rand(1,$playerOne['atk']) + $d6;
	
			//esquiva
				$esquiva = rand(0,$enemy['agility']);
				if($esquiva == $enemy['agility']){
					$phase->setDescription("O Herói ".$enemy['name']." esquivou.");
				}else{
					$phase = $this->damage($battleAux, $phase, $random, $enemy, $battleDao);
				}
			//esquiva
			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($playerOne['id']);
			$phaseDao->insert($phase);
		}
	}

	function damage($battle, $phase, $random, $hero, $battleDao){
		$damage = $this->critical($random);
		if($hero['id'] == $battle['id_hero_one']){
			$hp1 = $battle['hp_hero_one'] - $damage;
			$battleDao->hpMinusPlayerOne($hp1,$battle['id']);
		}

		if($hero['id'] == $battle['id_hero_two']){
			$hp1 = $battle['hp_hero_two'] - $damage;
			$battleDao->hpMinusPlayerTwo($hp1,$battle['id']);
		}
		$phase->setDescription("O Herói ".$hero['name']." recebeu ".$damage." de dano crítico.");
		return $phase;
	}

	function critical($damage){
		$critical = rand(1,6);
		if($critical == 6){
			$damage = $damage * 2;
		}
		return $damage;
	}
}