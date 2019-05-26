<?php
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once(esc_url_raw($_SERVER['DOCUMENT_ROOT'])."/Rpgcloud/repository/worldDao.class.php");

  $msg = "";
  $result = "";
  $worlds = "";
  $world = "";
  $worldDao = new WorldDao();

  if($_SERVER['REQUEST_METHOD'] == "GET"){
	 if(isset($_GET['id'])){
	 	$world = $worldDao->findOne($_GET['id']);
	 	$result = array ('world'=>$world);
	  }else{
	  	 $worlds = $worldDao->findAll();
	  	 $result = array ('worlds'=>$worlds);
	  }
  }else if($_SERVER['REQUEST_METHOD'] == "POST"){
  	$name= $_POST['name'];
  	$description= $_POST['description'];
 	$world = new World();
    $world->setName($name);
    $world->setDescription($description);
    $worldDao->insert($world);
  }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
	 $id = $_GET['id'];
     $msg =  $worldDao->delete($id);
     $result = array ('msg'=>$msg);
  }
 
 echo json_encode($result);