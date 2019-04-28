<?php
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/adventureDao.class.php");
  include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/entity/Adventure.class.php");


  $msg = "";
  $result = "";
  $adventures = [];
  $adventureDao = new AdventureDao();
  $adventure = new Adventure();
  $json = file_get_contents('php://input');
  $post = json_decode($json);

  if($_SERVER['REQUEST_METHOD'] == "GET"){
	 if(isset($_GET['id'])){
	 	$adventures = $adventureDao->findOne($_GET['id']);
	 	$result = array ('adventures'=>$adventures);
	  }else{
	  	 $adventures = $adventureDao->findAll();
	  	 $result = array ('adventures'=>$adventures);
	  }
  }else if($_SERVER['REQUEST_METHOD'] == "POST"){
  	$adventure->setName($post->name);
  	$adventureDao->insert($adventure);
  }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
	 $id = $_GET['id'];
     $msg =  $adventureDao->delete($id);
     $result = array ('msg'=>$msg);
  }
 
 echo json_encode($result);

