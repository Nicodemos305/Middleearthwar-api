<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/autoload.php";
use entity\Battle;
use entity\BattleDao;
use entity\PhaseDao;

$battleDao = new BattleDao();
$phaseDao = new PhaseDao();
$battle = $battleDao->myBattleRunning($id);

if(is_array($battle)){
	$phase_all = $phaseDao->findAllPhases($battle['id']);
}
$result = array ('battle'=>$battle,'phases'=>$phase_all);

echo json_encode($result);