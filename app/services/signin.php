<?php
	header('Content-type: application/json');
	header('Access-Control-Allow-Origin: *');
    include_once "/var/www/html/repository/playerDao.class.php";
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
	 $loginIsNull = (!isset($post->login) || $post->login == "");
	 $passwordIsNull = (!isset($post->password) || $post->password == "");
	if($loginIsNull || $passwordIsNull){
	   $msg = $msg."Login nao definido";
	   $result = array('msg'=>$msg);
	   echo json_encode($result);
	   return false;
	}
	return true;
}