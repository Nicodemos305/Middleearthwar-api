<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/entity/Battle.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/battleDao.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Rpgcloud/repository/heroDao.class.php");

$battleDao = new BattleDao();
$heroDao = new HeroDao();
$battle1 = new Battle(); 
$enemy =  $battleDao->searchEnemy(2);
$playerOne = $heroDao->findOne(2);

$battle1->setPlayerOne($playerOne['id']);
$battle1->setPlayerTwo($enemy['id']);

 $result = "";

$hp1 = $playerOne['hp'];
$hp2 = $enemy['hp'];
$batalha = true;

$id_battle = $battleDao->battleBegin($battle1);
echo $id_battle;
while($batalha){	
	$random = rand(0,$enemy['atk']);
	$hp1 = $hp1 - $random;

	$random = rand(0,$playerOne['atk']);
	$hp2 = $hp2 - $random;
   

	if($hp1 <= 0 || $hp2 <= 0){
	  $batalha = false;
	}
}

if($hp1 == 0){
	echo "Você perdeu";
	$battleDao->battleEnd($id_battle,$playerOne['id']);
}else{
	echo "Você ganhou";
	$battleDao->battleEnd($id_battle,$enemy['id']);
}