<?php
  include_once "/var/www/html/util/header.php";
  include_once "/var/www/html/repository/adventureDao.class.php";
  include_once "/var/www/html/autoload.php";
  use entity\Adventure;
  $adventureDao = new AdventureDao();
  $adventure = new Adventure();
  switch ($request) {
    case "GET":
        if(isset($uuid) && $uuid != null){
          $adventures = $adventureDao->findOne($uuid);
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
        $adventure->setName($post->name);
        $adventureDao->update($adventure);
    break;
    case "PUT":
        $adventure->setName($post->name, $uuid);
        $adventureDao->update($adventure, $uuid);
    break;
    case "DELETE":
        if(isset($uuid) && $uuid != null){
          $msg =  $adventureDao->delete($uuid);
          $result = array ('msg'=>$msg);
        }
        break;
}

echo json_encode($result);