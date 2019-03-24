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
$recentPhase = 0;
$phase_all = "";
$hp1 = $playerOne['hp'];
$hp2 = $enemy['hp'];
$batalha = true;

$battle = $battleCore->battleBegin($battle1);

if($battle['hp_hero_one']  > 0 || $battle['hp_hero_two'] > 0){
	$battleCore->routePhase($battle,$recentPhase,$phase,$enemy,$playerOne,$phaseDao,$battleDao);
}

if($battle['hp_hero_one']  <= 0 && $battle['hp_hero_one'] != null){
		$battleDao->battleEnd($battle['id'],$enemy['id']);
}else if($battle['hp_hero_two']  <= 0 && $battle['hp_hero_two'] != null){
	$battleDao->battleEnd($battle['id'],$playerOne['id']);
}

if(is_array($battle)){
	$phase_all = $phaseDao->findAllPhases($battle['id']);
}

$result = array ('battle'=>$battle,'phases'=>$phase_all);

echo json_encode($result);