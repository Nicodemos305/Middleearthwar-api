<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');

function getPath(){
	$path = null;
	if( $_SERVER['DOCUMENT_ROOT'] != null){
		$path = $_SERVER['DOCUMENT_ROOT'];
		return $path;
	}
}

$path = getPath();

include_once "$path/entity/Battle.class.php";
include_once "$path/entity/Phase.class.php";
include_once "$path/repository/battleDao.class.php";
include_once "$path/repository/heroDao.class.php";
include_once "$path/repository/phaseDao.class.php";
include_once "$path/services/battle/battleCore.class.php";


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