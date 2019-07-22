<?php
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once "/var/www/html/repository/adventureDao.class.php";
  include_once "/var/www/html/entity/Adventure.class.php";

  $result = "";
  $adventures = [];
  $adventureDao = new AdventureDao();
  $adventure = new Adventure();
  $json = file_get_contents('php://input');
  $post = json_decode($json);

  switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        if(isset($_GET['id']) && $_GET['id'] != null){
          $adventures = $adventureDao->findOne($_GET['id']);
          $result = array ('adventures'=>$adventures);
        }else{
            $adventures = $adventureDao->findAll();
            $result = array ('adventures'=>$adventures);
        }
        break;
    case "POST":
        $adventure->setName($post->name);
        $adventureDao->insert($adventure);
        break;
    case "DELETE":
        if(isset($_GET['id']) && $_GET['id'] != null){
          $id = $_GET['id'];
          $msg =  $adventureDao->delete($id);
          $result = array ('msg'=>$msg);
        }
        break;
}

echo json_encode($result);