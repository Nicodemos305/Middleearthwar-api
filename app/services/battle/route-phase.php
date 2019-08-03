<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/autoload.php";
use entity\Battle;
use entity\Phase;
use repository\BattleDao;
use repository\PhaseDao;
use repository\HeroDao;
use service\BattleCore;

$battleDao  = new BattleDao();
$heroDao    = new HeroDao();
$phaseDao   = new PhaseDao();
$phase      = new Phase();
$battleCore = new BattleCore();
$enemy      = $battleDao->searchEnemy(2);
$playerOne  = $heroDao->findOne(2);

$battle = $battleDao->battleRunning($playerOne['id'], $enemy['id']);

if ($battle['hp_hero_one'] > 0 || $battle['hp_hero_two'] > 0) {
    $battleCore->routePhaseWithCpu($battle, $phase, $enemy, $playerOne, $phaseDao, $battleDao);
}

$hero_one_win = $battle['hp_hero_two'] <= 0 && $battle['hp_hero_two'] != null;
$hero_two_win = $battle['hp_hero_one'] <= 0 && $battle['hp_hero_one'] != null;

if ($hero_two_win) {
    $battleDao->battleEnd($battle['uuid'], $enemy['uuid']);
} else if ($hero_one_win) {
    $battleDao->battleEnd($battle['uuid'], $playerOne['uuid']);
}

$result = array(
    'battle' => $battle
);
echo json_encode($result);