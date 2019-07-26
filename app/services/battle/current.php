<?php
 include_once "/var/www/html/util/header.php";
include_once("/var/www/html/repository/battleDao.class.php");
include_once("/var/www/html/repository/phaseDao.class.php");

$battleDao = new BattleDao();
$phaseDao = new PhaseDao();
$battle = $battleDao->myBattleRunning($id);

if(is_array($battle)){
	$phase_all = $phaseDao->findAllPhases($battle['id']);
}
$result = array ('battle'=>$battle,'phases'=>$phase_all);

echo json_encode($result);