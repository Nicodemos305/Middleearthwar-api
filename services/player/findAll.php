<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
 include_once('../../entity/Player.class.php');
 include_once('../../repository/playerDao.class.php');
	
 $msg = "";
 $email = "";
 $player = new Player();
 $playerDao = new PlayerDao();
 $result = "";
 $players = "";
 $players =  $playerDao->findAll();
 $result = array ('players'=>$players);
 echo json_encode($result);




