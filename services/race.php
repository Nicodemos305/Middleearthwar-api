<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');


  include_once("../repository/raceDao.class.php");
  include_once("../entity/Race.class.php");
  
  $msg = "";
  $result = "";
  $race = "";
  $raceDao = new RaceDao();

  if($_SERVER['REQUEST_METHOD'] == "GET"){
	 if(isset($_GET['id'])){
	 	$race = $raceDao->findOne($_GET['id']);
	 	$result = array ('race'=>$race);
	  }else{
	  	 $race = $raceDao->findAll();
	  	 $result = array ('race'=>$race);
	  }
  }else if($_SERVER['REQUEST_METHOD'] == "POST"){
  	$name= $_POST['name'];
    $hp = $_POST['hp'];
    $mp = $_POST['mp'];
    $atk = $_POST['atk'];
    $defense = $_POST['defense'];
    $agility = $_POST['agility'];
    $inteligence = $_POST['inteligence'];

 	  $raceInstance = new Race();
    $raceInstance->setName($name);
    $raceInstance->setHp($hp);
    $raceInstance->setMp($mp);
    $raceInstance->setAtk($atk);
    $raceInstance->setDefense($defense);
    $raceInstance->setAgility($agility);
    $raceInstance->setInteligence($inteligence);
    $raceDao->insert($raceInstance);
  }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
	 $id = $_GET['id'];
     $msg =  $raceDao->delete($id);
     $result = array ('msg'=>$msg);
  }
 
 echo json_encode($result);