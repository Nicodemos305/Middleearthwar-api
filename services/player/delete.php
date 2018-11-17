<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
 include_once('../../repository/playerDao.class.php');
 $id = $_GET['id'];
 $playerDao = new PlayerDao();
 $player =  $playerDao->delete($id);









