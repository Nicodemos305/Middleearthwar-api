<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/autoload.php";
use entity\Battle;
use entity\Phase;
use entity\BattleDao;
use entity\PhaseDao;
use service\BattleCore;

$battleDao = new BattleDao();
$heroDao = new HeroDao();
$battle1 = new Battle();
$battleCore = new BattleCore();
$enemy =  $battleDao->searchEnemy(2);
$playerOne = $heroDao->findOne(2);

$battle1->setPlayerOne($playerOne['id']);
$battle1->setPlayerTwo($enemy['id']);
$battle1->setHpOne($playerOne['hp']);
$battle1->setHpTwo($enemy['hp']);

$id = $_GET['id'];

$battle = $battleDao->myBattleRunning($id);

if($battle['id'] == null){
 $battle = $battleDao->battleBegin($battle1);
}else{
	echo "Heroi em combate";
}