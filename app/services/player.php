<?php
	header('Content-type: application/json');
	header('Access-Control-Allow-Origin: *');
    include_once "/var/www/html/entity/Player.class.php";
    include_once "/var/www/html/repository/playerDao.class.php";

	$post = json_decode(file_get_contents('php://input'));
    $msg = "";
	$email = "";
	$playerDao = new PlayerDao();
	$result = "";
	$players = "";
	$request = null;
	$id = $_GET['id'];
	if(isset($_SERVER['REQUEST_METHOD'])){
		$request = $_SERVER['REQUEST_METHOD'];
	}

  switch ($request) {
    case "GET":
		if(isset($id)){
			$player =  $playerDao->findOne($id);
			$result = array ('player'=>$player);
		}else{
		$players =  $playerDao->findAll();
		$result = array ('players'=>$players);
		}
        break;
    case "POST":
		$player= validate($post,$msg, $id);
		if($player != null){
			$playerDao->insert($player);
			$result = array ('login'=>$player->getLogin(),'senha'=>$player->getPassword(),'email'=>$player->getEmail());
		}
		break;
	case "PATCH":
		$player= validate($post,$msg, $id);
		if($player != null){
			$playerDao->update($player);
		}
	break;
	case "PUT":
		$player= validate($post,$msg, $id);
		if($player != null){
			$playerDao->update($player);
		}
	break;
    case "DELETE":
          if(isset($id) && $id != null){
			$playerDao->delete($id);
		}
        break;
}

echo json_encode($result);

 function validate($post,$msg, $id){
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
	$player = new Player($id, $post->login, $post->password, $post->email);
	return $player;
}