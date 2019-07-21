<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');

  include_once("/var/www/html/repository/raceDao.class.php");
  include_once("/var/www/html/entity/Race.class.php");
  
  $json = file_get_contents('php://input');
  $post = json_decode($json);
  $msg = "";
  $result = "";
  $race = "";
  $raceDao = new RaceDao(); 
  switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        if(isset($_GET['id'])){
          $race = $raceDao->findOne($_GET['id']);
          $result = array ('race'=>$race);
        }else{
            $race = $raceDao->findAll();
            $result = array ('race'=>$race);
        }
        break;
    case "POST":
        $name= $post->name;
        $hp = $post->hp;
        $mp = $post->mp;
        $atk = $post->atk;
        $defense = $post->defense;
        $agility = $post->agility;
        $inteligence = $post->inteligence;

        $raceInstance = new Race();
        $raceInstance->setName($name);
        $raceInstance->setHp($hp);
        $raceInstance->setMp($mp);
        $raceInstance->setAtk($atk);
        $raceInstance->setDefense($defense);
        $raceInstance->setAgility($agility);
        $raceInstance->setInteligence($inteligence);
        $raceDao->insert($raceInstance);
        break;
    case "DELETE":
        $id = $_GET['id'];
        $msg =  $raceDao->delete($id);
        $result = array ('msg'=>$msg);
        break;
}

echo json_encode($result);