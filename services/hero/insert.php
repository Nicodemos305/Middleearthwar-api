<?php
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once('../../entity/Hero.class.php');
  include_once('../../repository/heroDao.class.php');

  $heroDao = new HeroDao();
  $name= $_POST['name'];
  $race = "Humano";
  $hp = 100;
  $mp = 100;
  $atk=5;
  $defense=5;
  $agility=5;
  $inteligence=5;

  $hero = new Hero();
  $hero->setName($name);
  $hero->setRace($race);
  $hero->setHp($hp);
  $hero->setMp($mp);
  $hero->setAtk($atk);
  $hero->setDefense($defense);
  $hero->setAgility($agility);
  $hero->setInteligence($inteligence);
  $id = 1;
  $heroDao->insert($hero,$id);












