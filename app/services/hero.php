<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once("/var/www/html/repository/heroDao.class.php");
  include_once("/var/www/html/repository/raceDao.class.php");

  $json = file_get_contents('php://input');
  $post = json_decode($json);

  $msg = "";
  $result = "";
  $heroes = "";
  $hero = "";
  $heroDao = new HeroDao();
  $raceDao = new RaceDao();

    switch ($_SERVER['REQUEST_METHOD']) {
      case "GET":
        if(isset($_GET['id'])){
          $hero = $heroDao->findOne($_GET['id']);
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
          $id = 1;
          $heroDao->insert($hero,$id);
          break;
      case "DELETE":
          $id = $_GET['id'];
          $msg =  $heroDao->delete($id);
          $result = array ('msg'=>$msg);
          break;
  }

 echo json_encode($result);