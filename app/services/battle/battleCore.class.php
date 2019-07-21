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

		$isHeroOne = $recentPhase['id_hero_one'] == $battleAux['id_hero_one'];
		$isHeroTwo = $recentPhase['id_hero_one'] == $battleAux['id_hero_two'];

		if($recentPhase == null && is_array($battleAux)){
			$phase->setBattle_id($battleAux['id']);
			$phase->setPlayer_id($battleAux['id_hero_one']);
			$phase->setDescription("Iniciou o combate entre o heroi ".$playerOne['name']." e o Heroi ".$enemy['name']);
			$phaseDao->insert($phase);
			return;
		} 
		if($isHeroOne){
			$random = $this->rollD6($enemy['atk']);
			$phase = $this->damage($battleAux, $phase, $random, $playerOne, $battleDao);
			$this->passPhase($phase, $battleAux, $battleAux['id_hero_two'], $phaseDao);
			return;
		}

		if($isHeroTwo){
			$random = $this->rollD6($playerOne['atk']);
			$phase = $this->damage($battleAux, $phase, $random, $enemy, $battleDao);
			$this->passPhase($phase, $battleAux, $playerOne['id'], $phaseDao);
			return;
		}
	}

	function rollD6($atk){
		$d6 = rand(1,6);
		$random = rand(1,$atk) + $d6;
		return $random;
	}

	function passPhase($phase, $battle, $player, $phaseDao){
		$phase->setBattle_id($battle['id']);
		$phase->setPlayer_id($player);
		$phaseDao->insert($phase);
	}

	function damage($battle, $phase, $random, $hero, $battleDao){
		$esquivou = rand(0,$hero['agility']) == $hero['agility'];

		if($esquivou){
			$phase->setDescription("O Herói ".$hero['name']." esquivou.");
		}else{
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
		}
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