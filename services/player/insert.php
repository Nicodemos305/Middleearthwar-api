<?php
	 header('Content-type: application/json');
	 header('Access-Control-Allow-Origin: *');  
         include_once('../../entity/Player.class.php');
         include_once('../../repository/playerDao.class.php');
	 $msg = "";
	 $email = "";
	 $player = new Player();
	$playerDao = new PlayerDao();
        	
	if(!isset($_GET['login']) || $_GET['login'] == ""){
	   $msg = $msg."Login nao definido</br>";
	}else{
	   $player->setLogin($_GET['login']);
	}
    
    if(!isset($_GET['password']) || $_GET['password'] == ""){
	    $msg = $msg."password nao definido</br>";
	}else{
	  $player->setPassword($_GET['password']);
	}

    if(!isset($_GET['email']) || $_GET['email'] == ""){
	   $msg = $msg."email nao definido</br>";
	}else{
	   $player->setEmail($_GET['email']);
	}

	$playerDao->insert($player);
	$result = array ('login'=>$player->getLogin(),'senha'=>$player->getPassword(),'email'=>$player->getEmail());
	echo json_encode($result);
