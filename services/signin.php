<?php
	header('Content-type: application/json');
	header('Access-Control-Allow-Origin: *');
    include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/playerDao.class.php");
	$playerDao = new PlayerDao();
	$json = file_get_contents('php://input');
	$post = json_decode($json);

	if(validate($post)){
		$login = $post->login;
		$password = $post->password;
	    $player = $playerDao->signIn($login,$password);
 	    echo json_encode($player);
	}


 function validate($post){
	if(!isset($post->login) || $post->login == ""){
	   $msg = $msg."Login nao definido";
	   $result = array('msg'=>$msg);
	   echo json_encode($result);
	   echo $msg;
	   return false;
	}
    
    if(!isset($post->password) || $post->password == ""){
	    $msg = $msg."password nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}

	return true;
}