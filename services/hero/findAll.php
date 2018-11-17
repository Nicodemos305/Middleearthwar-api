<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
 include_once('../../repository/heroDao.class.php');
	
 $msg = "";
 $email = "";
 $heroDao = new HeroDao();
 $result = "";
 $heroes = "";
 $heroes =  $heroDao->findAll();
 $result = array ('heroes'=>$heroes);
 echo json_encode($result);
