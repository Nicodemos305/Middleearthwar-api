<?php
	header('Content-type: application/json');
	header('Access-Control-Allow-Origin: *');
    include_once("/var/www/html/entity/Player.class.php");
    include_once("/var/www/html/repository/playerDao.class.php");

$json = file_get_contents('php://input');
$post = json_decode($json);

    $msg = "";
	$email = "";
	$playerDao = new PlayerDao();
	$player = new Player();
	$result = "";
	$players = "";

  switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
		if(isset($_GET['id'])){
			$player =  $playerDao->findOne($_GET['id']);
			$result = array ('player'=>$player);
		}else{
		$players =  $playerDao->findAll();
		$result = array ('players'=>$players);
		}
        break;
    case "POST":
		$player= validate($post,$msg);
		if($player){
			$playerDao->insert($player);
			$result = array ('login'=>$player->getLogin(),'senha'=>$player->getPassword(),'email'=>$player->getEmail());
		}
        break;
    case "DELETE":
		$id = $_GET['id'];
		$playerDao->delete($id);
        break;
}

echo json_encode($result);

 function validate($post,$msg){
	$player = new Player();
	
	if(!isset($post->login) || $post->login == ""){
	   $msg = $msg."Login nao definido";
	   $result = array('msg'=>$msg);
	   echo json_encode($result);
	   echo $msg;
	   return false;
	}else{
	   $player->setLogin($post->login);
	}
    
    if(!isset($post->password) || $post->password == ""){
	    $msg = $msg."password nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}else{
	  $player->setPassword($post->password);
	}

    if(!isset($post->email) || $post->email == ""){
	   $msg = $msg."email nao definido";
	    $result = array('msg'=>$msg);
	    echo json_encode($result);
	    echo $msg;
	   return false;
	}else{
	   $player->setEmail($post->email);
	}
	return $player;
}