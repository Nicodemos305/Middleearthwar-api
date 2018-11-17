<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  

 include_once('../../repository/heroDao.class.php');
 $msg = "";

 $id = $_GET['id'];
 $heroDao = new HeroDao();
 $hero =  $heroDao->findOne($id);
 echo json_encode($hero[0]);






