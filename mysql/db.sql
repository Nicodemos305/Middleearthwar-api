CREATE DATABASE rpgcloud; 

USE rpgcloud; 

CREATE TABLE player 
  ( 
     uuid     VARCHAR(255), 
     login    VARCHAR(255), 
     password VARCHAR(800), 
     email    VARCHAR(255), 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE quest 
  ( 
     uuid     VARCHAR(255), 
     name VARCHAR(800), 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE test 
  ( 
     uuid     VARCHAR(255), 
     name   VARCHAR(255), 
     goal   VARCHAR(10), 
     result INT, 
     test   INT, 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE adventure 
  ( 
     id   INT auto_increment, 
     name VARCHAR(255), 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE hero 
  ( 
     uuid     VARCHAR(255), 
     name        VARCHAR(255), 
     race        VARCHAR(255), 
     hp          INT, 
     mp          INT, 
     atk         INT, 
     defense     INT, 
     agility     INT, 
     inteligence INT, 
     id_player   INT, 
     id_world    INT, 
     PRIMARY KEY(id), 
     FOREIGN KEY (id_player) REFERENCES player(id) 
  ); 

CREATE TABLE race 
  ( 
     uuid     VARCHAR(255), 
     name        VARCHAR(255), 
     hp          INT, 
     mp          INT, 
     atk         INT, 
     defense     INT, 
     agility     INT, 
     inteligence INT, 
     id_world    INT, 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE battle 
  ( 
      uuid     VARCHAR(255), 
     id_hero_one   INT, 
     id_hero_two   INT, 
     hp_hero_one   INT, 
     hp_hero_two   INT, 
     status_battle VARCHAR(10), 
     win_battle    INT, 
     PRIMARY KEY(id), 
     FOREIGN KEY (id_hero_one) REFERENCES hero(id) 
  ); 

CREATE TABLE phase 
  ( 
     uuid     VARCHAR(255), 
     id_hero_one INT, 
     id_battle   INT, 
     description VARCHAR(400), 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE world 
  ( 
     uuid     VARCHAR(255), 
     name        VARCHAR(200), 
     description VARCHAR(600), 
     PRIMARY KEY(id) 
  ); 