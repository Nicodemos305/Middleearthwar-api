<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
 include_once('../../repository/heroDao.class.php');

 $msg = "";

 $id = $_GET['id'];
 $heroDao = new HeroDao();
 $msg =  $heroDao->delete($id);
 $result = array ('msg'=>$msg);
 echo json_encode($result);









