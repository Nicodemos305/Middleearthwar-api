<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');
$path = "/var/www/html";
require_once $path."/entity/Battle.class.php";
require_once $path."/entity/Phase.class.php";
require_once $path."/repository/battleDao.class.php";
require_once $path."/repository/heroDao.class.php";
require_once $path."/services/battle/battleCore.class.php";

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