<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');

  include_once "/var/www/html/repository/raceDao.class.php";
  include_once "/var/www/html/entity/Race.class.php";
  
  $json = file_get_contents('php://input');
  $post = json_decode($json);
  $result = "";
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
        $raceInstance = new Race();
        $raceInstance->setName($post->name);
        $raceInstance->setHp($post->hp);
        $raceInstance->setMp($post->mp);
        $raceInstance->setAtk($post->atk);
        $raceInstance->setDefense($post->defense);
        $raceInstance->setAgility($post->agility);
        $raceInstance->setInteligence($post->inteligence);
        $raceDao->insert($raceInstance);
        break;
    case "DELETE":
        if(isset($_GET['id']) && $_GET['id'] != null){
          $id = $_GET['id'];
          $msg =  $raceDao->delete($id);
          $result = array ('msg'=>$msg);
        }
        break;
}
echo json_encode($result);