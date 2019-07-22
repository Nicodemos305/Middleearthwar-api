<?php
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once "/var/www/html/repository/worldDao.class.php";

  $json = file_get_contents('php://input');
  $post = json_decode($json);
  $msg = "";
  $result = "";
  $worlds = "";
  $world = "";
  $worldDao = new WorldDao();

  switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        if(isset($_GET['id'])){
          $world = $worldDao->findOne($_GET['id']);
          $result = array ('world'=>$world);
        }else{
            $worlds = $worldDao->findAll();
            $result = array ('worlds'=>$worlds);
        }
        break;
    case "POST":
        $name= $post->name;
        $description= $post->description;
        $world = new World();
        $world->setName($name);
        $world->setDescription($description);
        $worldDao->insert($world);
        break;
    case "DELETE":
        $id = $_GET['id'];
        $msg =  $worldDao->delete($id);
        $result = array ('msg'=>$msg);
        break;
}
 
echo json_encode($result);