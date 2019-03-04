<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/heroDao.class.php");

  $msg = "";
  $result = "";
  $heroes = "";
  $hero = "";
  $heroDao = new HeroDao();

  if($_SERVER['REQUEST_METHOD'] == "GET"){
	 if(isset($_GET['id'])){
	 	$hero = $heroDao->findOne($_GET['id']);
	 	$result = array ('hero'=>$hero);
	  }else{
	  	 $heroes = $heroDao->findAll();
	  	 $result = array ('heroes'=>$heroes);
	  }
  }else if($_SERVER['REQUEST_METHOD'] == "POST"){
  	$name= $_POST['name'];
 	$hero = new Hero();
    $hero->setName($name);
    $hero->newHero();
    $id = 1;
    $heroDao->insert($hero,$id);
  }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
	 $id = $_GET['id'];
     $msg =  $heroDao->delete($id);
     $result = array ('msg'=>$msg);
  }
 
 echo json_encode($result);
