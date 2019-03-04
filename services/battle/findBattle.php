<?php
 header('Content-type: application/json');
 header('Access-Control-Allow-Origin: *');  
include_once('../../repository/battleDao.class.php');
include_once('../../repository/heroDao.class.php');
include_once('../../entity/Battle.class.php');


 $battleDao = new BattleDao();
 $heroDao = new HeroDao();
 $battle1 = new Battle();
 $enemy =  $battleDao->searchEnemy(2);
 $playerOne = $heroDao->findOne(2);


echo $enemy['name'];
echo "xxxxx";
echo $playerOne['name'];


$battle1->setPlayerOne($playerOne);


$battle1->setPlayerTwo($enemy);

 $result = "";
 $result = array('playerOne'=>$battle1->getPlayerOne(),'playerTwo' => $battle1->getPlayerTwo());

$hp1 = $playerOne['hp'];
$hp2 = $enemy['hp'];
$batalha = true;
while($batalha){
	
	$random = rand(0,$enemy['atk']);
	$hp1 = $hp1 - $random;
	echo "HP1 ".$hp1;
	echo "<br/>";
	$random = rand(0,$enemy['atk']);
	$hp2 = $hp2 - $random;
    echo "HP2".$hp2;
    echo "<br/> ";
	if($hp1 <= 0 || $hp2 <= 0){
	  $batalha = false;
	}
}


if($hp1 == 0){
	echo "Você perdeu";
}else{
	echo "Você ganhou";
}




