<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');

  include_once "/var/www/html/repository/raceDao.class.php";
  include_once "/var/www/html/entity/Race.class.php";
  
  $post = json_decode(file_get_contents('php://input'));
  $result = "";
  $raceDao = new RaceDao(); 
  $id = $_GET['id'];
  switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        if(isset($id)){
          $race = $raceDao->findOne($id);
          $result = array ('race'=>$race);
        }else{
            $race = $raceDao->findAll();
            $result = array ('race'=>$race);
        }
        break;
    case "POST":
        $raceInstance = new Race($post->name, $post->hp, $post->mp, $post->atk, $post->defense, $post->agility, $post->inteligence);
        $raceDao->insert($raceInstance);
        break;
    case "PATCH":
        $raceInstance = new Race($post->name, $post->hp, $post->mp, $post->atk, $post->defense, $post->agility, $post->inteligence);
        $raceDao->update($raceInstance);
    break;
    case "PUT":
        $raceInstance = new Race($post->name, $post->hp, $post->mp, $post->atk, $post->defense, $post->agility, $post->inteligence);
        $raceDao->update($raceInstance);
    break;
    case "DELETE":
        if(isset($id) &&  $id != null){
          $msg =  $raceDao->delete($id);
          $result = array ('msg'=>$msg);
        }
        break;
}
echo json_encode($result);