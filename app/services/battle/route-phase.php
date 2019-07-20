<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');
include_once("../../entity/Battle.class.php");
include_once("../../entity/Phase.class.php");
include_once("../../repository/battleDao.class.php");
include_once("../../repository/heroDao.class.php");
include_once("../../repository/phaseDao.class.php");
include_once("../../services/battle/battleCore.class.php");

$battleDao = new BattleDao();
$heroDao = new HeroDao();
$phaseDao = new PhaseDao();
$battle1 = new Battle();
$phase = new Phase(); 
$battleCore = new BattleCore();
$enemy =  $battleDao->searchEnemy(2);
$playerOne = $heroDao->findOne(2);
$result = "";
$recentPhase = 0;

$battle =$battleDao->battleRunning($playerOne['id'],$enemy['id']);

if($battle['hp_hero_one']  > 0 || $battle['hp_hero_two'] > 0){
	$battleCore->routePhaseWithCpu($battle,$recentPhase,$phase,$enemy,$playerOne,$phaseDao,$battleDao);
}

if($battle['hp_hero_one']  <= 0 && $battle['hp_hero_one'] != null){
		$battleDao->battleEnd($battle['id'],$enemy['id']);
}else if($battle['hp_hero_two']  <= 0 && $battle['hp_hero_two'] != null){
	$battleDao->battleEnd($battle['id'],$playerOne['id']);
}


$result = array ('battle'=>$battle);

echo json_encode($result);