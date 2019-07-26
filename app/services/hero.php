<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once "/var/www/html/repository/heroDao.class.php";
  include_once "/var/www/html/repository/raceDao.class.php";

  $heroes = "";
  $heroDao = new HeroDao();
  $raceDao = new RaceDao();
    switch ($_SERVER['REQUEST_METHOD']) {
      case "GET":
        if(isset($uuid) && $uuid != null){
          $hero = $heroDao->findOne($uuid);
          $result = array ('hero'=>$hero);
          }else{
            $heroes = $heroDao->findAll();
            $result = array ('heroes'=>$heroes);
          }
          break;
      case "POST":
          $name= $post->name;
          $race= $post->race;
          $hero = new Hero();
          $hero->setName($name);
          $raceInstance = $raceDao->findByName($race);
          $hero->newHero($raceInstance);
          $uuid = 1;
          $heroDao->insert($hero,$uuid);
          break;
      case "PATCH":

      break;
      case "PUT":

      break;
      case "DELETE":
          if(isset($uuid) && $uuid != null){
            $msg =  $heroDao->delete($uuid);
            $result = array ('msg'=>$msg);
          }
          break;
  }

 echo json_encode($result);