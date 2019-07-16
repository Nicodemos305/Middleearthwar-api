<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
 include_once("../repository/rankingDao.class.php");

$rankingDao = new RankingDao();

$result = $rankingDao->rankingWinners();

 echo json_encode($result);