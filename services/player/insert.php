<?php
	 header('Content-type: application/json');
	 header('Access-Control-Allow-Origin: *');  
     include_once('../../entity/Player.class.php');
     include_once('../../repository/playerDao.class.php');
	
	 $msg = "";
	 $email = "";

	 $playerDao = new PlayerDao();
	 $result = "";

	$player= validate($_POST,$msg);
	if($player){
		$playerDao->insert($player);
		$result = array ('login'=>$player->getLogin(),'senha'=>$player->getPassword(),'email'=>$player->getEmail());
	}

echo json_encode($result);

function validate($post,$msg){
	$player = new Player();
	if(!isset($post['login']) || $post['login'] == ""){
	   $msg = $msg."Login nao definido";
	   $result = array('msg'=>$msg);
	   echo json_encode($result);
	   echo $msg;
	   return false;
	}else{
	   $player->setLogin($post['login']);
	}
    
    if(!isset($post['password']) || $post['password'] == ""){
	    $msg = $msg."password nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}else{
	  $player->setPassword($post['password']);
	}

    if(!isset($post['email']) || $post['email'] == ""){
	   $msg = $msg."email nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}else{
	   $player->setEmail($post['email']);
	}
	return $player;
}