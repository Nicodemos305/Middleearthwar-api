<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
 include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/rankingDao.class.php");

$rankingDao = new RankingDao();

$result = $rankingDao->rankingWinners();

 echo json_encode($result);
