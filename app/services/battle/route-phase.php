<?php
 include_once "/var/www/html/util/header.php";
include_once "/var/www/html/entity/Battle.class.php";
include_once "/var/www/html/entity/Phase.class.php";
include_once "/var/www/html/repository/battleDao.class.php";
include_once "/var/www/html/repository/heroDao.class.php";
include_once "/var/www/html/repository/phaseDao.class.php";
include_once "/var/www/html/services/battle/battleCore.class.php";

$battleDao = new BattleDao();
$heroDao = new HeroDao();
$phaseDao = new PhaseDao();
$phase = new Phase(); 
$battleCore = new BattleCore();
$enemy =  $battleDao->searchEnemy(2);
$playerOne = $heroDao->findOne(2);

$battle =$battleDao->battleRunning($playerOne['id'],$enemy['id']);

if($battle['hp_hero_one']  > 0 || $battle['hp_hero_two'] > 0){
	$battleCore->routePhaseWithCpu($battle,$phase,$enemy,$playerOne,$phaseDao,$battleDao);
}

$hero_one_win = $battle['hp_hero_two']  <= 0 && $battle['hp_hero_two'] != null;
$hero_two_win = $battle['hp_hero_one']  <= 0 && $battle['hp_hero_one'] != null;

if($hero_two_win){
	$battleDao->battleEnd($battle['id'],$enemy['id']);
}else if($hero_one_win){
	$battleDao->battleEnd($battle['id'],$playerOne['id']);
}

$result = array ('battle'=>$battle);
echo json_encode($result);