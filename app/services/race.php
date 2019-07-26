<?php 
  include_once "/var/www/html/util/header.php";
  include_once "/var/www/html/repository/raceDao.class.php";
  include_once "/var/www/html/autoload.php";
  use entity\Race;
  $raceDao = new RaceDao(); 
  switch ($request) {
    case "GET":
        if(isset($uuid)){
          $race = $raceDao->findOne($uuid);
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
        if(isset($uuid) &&  $uuid != null){
          $msg =  $raceDao->delete($uuid);
          $result = array ('msg'=>$msg);
        }
        break;
}
echo json_encode($result);