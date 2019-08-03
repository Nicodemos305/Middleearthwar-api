<?php
require "/var/www/html/util/header.php";
require "/var/www/html/autoload.php";
use entity\Battle;
use entity\Phase;
use repository\BattleDao;
use repository\HeroDao;
use repository\PhaseDao;

$battleDao  = new BattleDao();
$heroDao    = new HeroDao();
$battle1    = new Battle();
$enemy      = $battleDao->searchEnemy($uuid);
$playerOne  = $heroDao->findOne($uuid);

$battle1->setPlayerOne($playerOne['uuid']);
$battle1->setPlayerTwo($enemy['uuid']);
$battle1->setHpOne($playerOne['hp']);
$battle1->setHpTwo($enemy['hp']);

$uuid = $_GET['uuid'];

$battle = $battleDao->myBattleRunning($uuid);

if ($battle['uuid'] == null) {
    $battle = $battleDao->battleBegin($battle1);
} else {
    echo "Heroi em combate";
}