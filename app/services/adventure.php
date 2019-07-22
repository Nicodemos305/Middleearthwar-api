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
  $id = $_GET['id'];
  switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        if(isset($id) && $id != null){
          $adventures = $adventureDao->findOne($id);
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
    case "PATCH":
        echo "PATCH";
    break;
    case "PUT":
        echo "PUT";
    break;
    case "DELETE":
        if(isset($id) && $id != null){
          $msg =  $adventureDao->delete($id);
          $result = array ('msg'=>$msg);
        }
        break;
}

echo json_encode($result);