<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/autoload.php";
use entity\Hero;
use repository\HeroDao;
use repository\RaceDao;
$heroes  = "";
$heroDao = new HeroDao();
$raceDao = new RaceDao();
switch ($request) {
    case "GET":
        if (isset($uuid) && $uuid != null) {
            $hero   = $heroDao->findOne($uuid);
            $result = array(
                'hero' => $hero
            );
        } else {
            $heroes = $heroDao->findAll();
            $result = array(
                'heroes' => $heroes
            );
        }
        break;
    case "POST":
        $name = $post->name;
        $race = $post->race;
        $hero = new Hero();
        $hero->setName($name);
        $raceInstance = $raceDao->findByName($race);
        $hero->newHero($raceInstance);
        $heroDao->insert($hero, $uuid);
        break;
    case "PATCH":
        $name = $post->name;
        $race = $post->race;
        $hero = new Hero();
        $hero->setName($name);
        $raceInstance = $raceDao->findByName($race);
        $hero->newHero($raceInstance);
        $uuid = 1;
        $heroDao->update($hero, $uuid);
        break;
    case "PUT":
        $name = $post->name;
        $race = $post->race;
        $hero = new Hero();
        $hero->setName($name);
        $raceInstance = $raceDao->findByName($race);
        $hero->newHero($raceInstance);
        $uuid = 1;
        $heroDao->update($hero, $uuid);
        break;
    case "DELETE":
        if (isset($uuid) && $uuid != null) {
            $msg    = $heroDao->delete($uuid);
            $result = array(
                'msg' => $msg
            );
        }
        break;
}
print_r(json_encode($result));