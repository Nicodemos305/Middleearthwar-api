<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/entity/Battle.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/entity/Phase.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/battleDao.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/heroDao.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/phaseDao.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/services/battle/battleCore.class.php");

$battleDao = new BattleDao();
$heroDao = new HeroDao();
$phaseDao = new PhaseDao();
$battle1 = new Battle(); 
$phase = new Phase(); 
$battleCore = new BattleCore();
$enemy =  $battleDao->searchEnemy(2);
$playerOne = $heroDao->findOne(2);

$battle1->setPlayerOne($playerOne['id']);
$battle1->setPlayerTwo($enemy['id']);
$battle1->setHpOne($playerOne['hp']);
$battle1->setHpTwo($enemy['hp']);
 $result = "";

$hp1 = $playerOne['hp'];
$hp2 = $enemy['hp'];
$batalha = true;

$battle = $battleCore->battleBegin($battle1);

$recentPhase = $phaseDao->findPhase($battle['id']);

if($recentPhase == null){
	$phase->setBattle_id($battle['id']);
	$phase->setPlayer_id($playerOne['id']);
	$phaseDao->insert($phase);
}else if($recentPhase['id_hero_one'] == $playerOne['id']){
	$random = rand(1,$enemy['atk']);
	$hp1 = $battle['hp_hero_one'] - $random;

	$battleDao->hpMinusPlayerOne($hp1,$battle['id']);

	$phase->setBattle_id($battle['id']);
	$phase->setPlayer_id($enemy['id']);
	$phaseDao->insert($phase);
}else if($recentPhase['id_hero_one'] == $enemy['id']){
	$random = rand(1,$playerOne['atk']);
	$hp1 = $battle['hp_hero_two'] - $random;

	$battleDao->hpMinusPlayerTwo($hp1,$battle['id']);

	$phase->setBattle_id($battle['id']);
	$phase->setPlayer_id($playerOne['id']);
	$phaseDao->insert($phase);
}


$phase_all = $phaseDao->findAllPhases($battle['id']);

$result = array ('battle'=>$battle,'phases'=>$phase_all);

echo json_encode($result);


if($battle['hp_hero_one']  <= 0 && $battle['hp_hero_one'] != null){
	echo "Você perdeu";
	$battleDao->battleEnd($battle['id'],$playerOne['id']);
}else if($battle['hp_hero_two']  <= 0 && $battle['hp_hero_two'] != null){
	echo "Você ganhou";
	$battleDao->battleEnd($battle['id'],$enemy['id']);
}