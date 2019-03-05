<?php
	header('Content-type: application/json');
	header('Access-Control-Allow-Origin: *');
    include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/playerDao.class.php");
	$playerDao = new PlayerDao();
	

	if(validate($_POST)){
		$login = $_POST['login'];
		$password = $_POST['password'];
	    $player = $playerDao->signIn($login,$password);
 	    echo json_encode($player);
	}


 function validate($post){
	$player = new Player();
	if(!isset($post['login']) || $post['login'] == ""){
	   $msg = $msg."Login nao definido";
	   $result = array('msg'=>$msg);
	   echo json_encode($result);
	   echo $msg;
	   return false;
	}
    
    if(!isset($post['password']) || $post['password'] == ""){
	    $msg = $msg."password nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}

	return true;
}