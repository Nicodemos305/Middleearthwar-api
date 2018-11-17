<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
 include_once('../../entity/Player.class.php');
 include_once('../../repository/playerDao.class.php');
 $msg = "";

 $id = $_GET['id'];
 $playerDao = new PlayerDao();
 $player =  $playerDao->findOne($id);
 echo json_encode($player[0]);








