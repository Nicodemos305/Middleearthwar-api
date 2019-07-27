<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/autoload.php";
use repository\WorldDao;
$worldDao = new WorldDao();
switch ($request) {
    case "GET":
        if (isset($uuid)) {
            $world  = $worldDao->findOne($uuid);
            $result = array(
                'world' => $world
            );
        } else {
            $worlds = $worldDao->findAll();
            $result = array(
                'worlds' => $worlds
            );
        }
        break;
    case "POST":
        $world = validate($post, $msg, $uuid);
        $worldDao->insert($world);
        break;
    case "PATCH":
        $world = validate($post, $msg, $uuid);
        $worldDao->update($world, $uuid);
        break;
    case "PUT":
        $world = validate($post, $msg, $uuid);
        $worldDao->update($world, $uuid);
        break;
    case "DELETE":
        if (isset($uuid) && $uuid != null) {
            $msg    = $worldDao->delete($uuid);
            $result = array(
                'msg' => $msg
            );
        }
        break;
}

print json_encode($result);

function validate($post, $msg, $uuid)
{
    $nameIsNull        = !isset($post->name) || $post->name == "";
    $descriptionIsNull = !isset($post->description) || $post->description == "";
    
    if ($nameIsNull || $descriptionIsNull) {
        $msg    = $msg . "Os campos name, description são obrigatórios";
        $result = array(
            'msg' => $msg
        );
        echo json_encode($result);
        return false;
    }
    $world = new World($uuid, $post->name, $post->description);
    return $world;
}