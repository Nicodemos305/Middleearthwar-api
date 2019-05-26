<?php 
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  

 function getDocumentRoot(){
    return $_SERVER['DOCUMENT_ROOT'];
 }

  include_once(getDocumentRoot()."/Rpgcloud/repository/heroDao.class.php");
  include_once(getDocumentRoot()."/Rpgcloud/repository/raceDao.class.php");
  $json = file_get_contents('php://input');
  $post = json_decode($json);

  $msg = "";
  $result = "";
  $heroes = "";
  $hero = "";
  $heroDao = new HeroDao();
  $raceDao = new RaceDao();

    if(isset($_SERVER['REQUEST_METHOD'])){
      if($_SERVER['REQUEST_METHOD'] == "GET"){
       if(isset($_GET['id'])){
        $hero = $heroDao->findOne($_GET['id']);
        $result = array ('hero'=>$hero);
        }else{
           $heroes = $heroDao->findAll();
           $result = array ('heroes'=>$heroes);
        }
      }else if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name= $post->name;
        $race= $post->race;
        $hero = new Hero();
        $hero->setName($name);
        $raceInstance = $raceDao->findByName($race);
        $hero->newHero($raceInstance);
        $id = 1;
        $heroDao->insert($hero,$id);
      }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
       $id = $_GET['id'];
         $msg =  $heroDao->delete($id);
         $result = array ('msg'=>$msg);
      }
    }

 
 echo json_encode($result);


