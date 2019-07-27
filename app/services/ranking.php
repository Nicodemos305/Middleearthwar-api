<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/repository/rankingDao.class.php";

$rankingDao = new RankingDao();

$result = $rankingDao->rankingWinners();

print_r(json_encode($result));