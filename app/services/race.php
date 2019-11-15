<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/autoload.php";
use entity\Race;
use repository\RaceDao;
$raceDao = new RaceDao();
switch ($request) {
    case "GET":
        if (isset($uuid)) {
            $race   = $raceDao->findOne($uuid);
            $result = array(
                'race' => $race
            );
        } else {
            $race   = $raceDao->findAll();
            $result = array(
                'race' => $race
            );
        }
        break;
    case "POST":
        $raceInstance = validate($post, $msg, $uuid);
        $raceDao->insert($raceInstance);
        break;
    case "PATCH":
        $raceInstance = validate($post, $msg, $uuid);
        $raceDao->update($raceInstance);
        break;
    case "PUT":
        $raceInstance = validate($post, $msg, $uuid);
        $raceDao->update($raceInstance);
        break;
    case "DELETE":
        if (isset($uuid) && $uuid != null) {
            $msg    = $raceDao->delete($uuid);
            $result = array(
                'msg' => $msg
            );
        }
        break;
}
print_r(json_encode($result));

function validate($post, $msg, $uuid)
{
    $raceIsNull = !isset($post->name) || $post->name == "";


    if ($raceIsNull) {
        $result = array(
            'msg' => "Todos o campos da raca sao obrigatorios"
        );
        echo json_encode($result);
        return false;
    }
    $race = new Race($uuid, $post->name, $post->hp, $post->mp, $post->atk, $post->defense, $post->agility, $post->inteligence);
    return $race;
}