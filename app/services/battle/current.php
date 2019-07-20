<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');
include_once("../../repository/battleDao.class.php");
include_once("../../repository/phaseDao.class.php");

$battleDao = new BattleDao();
$phaseDao = new PhaseDao();
$id = $_GET['id'];
$battle = $battleDao->myBattleRunning($id);

if(is_array($battle)){
	$phase_all = $phaseDao->findAllPhases($battle['id']);
}
$result = array ('battle'=>$battle,'phases'=>$phase_all);

echo json_encode($result);