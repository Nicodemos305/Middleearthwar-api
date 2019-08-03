<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/autoload.php";
use entity\Battle;
use repository\BattleDao;
use repository\PhaseDao;

$battleDao = new BattleDao();
$phaseDao  = new PhaseDao();
$battle    = $battleDao->myBattleRunning($uuid);

if (is_array($battle)) {
    $phase_all = $phaseDao->findAllPhases($battle['uuid']);
}
$result = array(
    'battle' => $battle,
    'phases' => $phase_all
);

echo json_encode($result);