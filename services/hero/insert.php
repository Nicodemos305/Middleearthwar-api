<?php
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');  
  include_once('../../entity/Hero.class.php');
  include_once('../../repository/heroDao.class.php');

  $heroDao = new HeroDao();
  $name= $_POST['name'];

  $hero = new Hero();
  $hero->setName($name);
  $hero->newHero();
  $id = 1;
  $heroDao->insert($hero,$id);
