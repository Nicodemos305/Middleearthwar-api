<?php
	include_once "/var/www/html/util/header.php";
    include_once "/var/www/html/entity/Player.class.php";
    include_once "/var/www/html/repository/playerDao.class.php";
    $msg = "";
	$playerDao = new PlayerDao();
	$result = "";
	$request = null;
	$uuid = $_GET['uuid'];
	if(isset($_SERVER['REQUEST_METHOD'])){
		$request = $_SERVER['REQUEST_METHOD'];
	}

  switch ($request) {
    case "GET":
		if(isset($uuid)){
			$player =  $playerDao->findOne($uuid);
			$result = array ('player'=>$player);
		}else{
		$players =  $playerDao->findAll();
		$result = array ('players'=>$players);
		}
        break;
    case "POST":
		$player= validate($post,$msg, $uuid);
		if($player != null){
			$playerDao->insert($player);
			$result = array ('login'=>$player->getLogin(),'senha'=>$player->getPassword(),'email'=>$player->getEmail());
		}
		break;
	case "PATCH":
		$player= validate($post,$msg, $uuid);
		if($player != null){
			$playerDao->update($player);
		}
	break;
	case "PUT":
		$player= validate($post,$msg, $uuid);
		if($player != null){
			$playerDao->update($player);
		}
	break;
    case "DELETE":
          if(isset($uuid) && $uuid != null){
			$playerDao->delete($uuid);
		}
        break;
}

echo json_encode($result);

 function validate($post,$msg, $uuid){
	$loginIsNull = !isset($post->login) || $post->login == "";
	$passwordIsNull = !isset($post->password) || $post->password == "";
	$emailIsNull = !isset($post->email) || $post->email == "";

	if($loginIsNull || 	$passwordIsNull || $emailIsNull){
	   $msg = $msg."Verifique se os campos login, password e email estao definidos";
	   $result = array('msg'=>$msg);
	   echo json_encode($result);
	   echo $msg;
	   return false;
	}
	$player = new Player($uuid, $post->login, $post->password, $post->email);
	return $player;
}