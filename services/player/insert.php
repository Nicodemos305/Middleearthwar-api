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

	if(!isset($_POST['login']) || $_POST['login'] == ""){
	   $msg = $msg."Login nao definido";
	   $result = array('msg'=>$msg);
	   echo json_encode($result);
	   echo $msg;
	   return false;
	}else{
	   $player->setLogin($_POST['login']);
	}
    
    if(!isset($_POST['password']) || $_POST['password'] == ""){
	    $msg = $msg."password nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}else{
	  $player->setPassword($_POST['password']);
	}

    if(!isset($_POST['email']) || $_POST['email'] == ""){
	   $msg = $msg."email nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}else{
	   $player->setEmail($_POST['email']);
	}

	$playerDao->insert($player);
	$result = array ('login'=>$player->getLogin(),'senha'=>$player->getPassword(),'email'=>$player->getEmail());

	echo json_encode($result);
