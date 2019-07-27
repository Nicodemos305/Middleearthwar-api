CREATE DATABASE rpgcloud; 

USE rpgcloud; 

CREATE TABLE player 
  ( 
     uuid     VARCHAR(255), 
     login    VARCHAR(255), 
     password VARCHAR(800), 
     email    VARCHAR(255), 
     PRIMARY KEY(uuid) 
  ); 

CREATE TABLE quest 
  ( 
     uuid     VARCHAR(255), 
     name VARCHAR(800), 
     PRIMARY KEY(uuid) 
  ); 

CREATE TABLE test 
  ( 
     uuid     VARCHAR(255), 
     name   VARCHAR(255), 
     goal   VARCHAR(10), 
     result INT, 
     test   INT, 
     PRIMARY KEY(uuid) 
  ); 

CREATE TABLE adventure 
  ( 
     uuid     VARCHAR(255), 
     name VARCHAR(255), 
     PRIMARY KEY(uuid) 
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
     id_player   VARCHAR(255), 
     id_world    VARCHAR(255), 
     PRIMARY KEY(uuid), 
     FOREIGN KEY (id_player) REFERENCES player(uuid) 
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
     PRIMARY KEY(uuid) 
  ); 

CREATE TABLE battle 
  ( 
      uuid     VARCHAR(255), 
     id_hero_one   VARCHAR(255), 
     id_hero_two   VARCHAR(255), 
     hp_hero_one   INT, 
     hp_hero_two   INT, 
     status_battle VARCHAR(10), 
     win_battle    INT, 
     PRIMARY KEY(uuid), 
     FOREIGN KEY (id_hero_one) REFERENCES hero(uuid) 
  ); 

CREATE TABLE phase 
  ( 
     uuid     VARCHAR(255), 
     id_hero_one INT, 
     id_battle   INT, 
     description VARCHAR(400), 
     PRIMARY KEY(uuid) 
  ); 

CREATE TABLE world 
  ( 
     uuid     VARCHAR(255), 
     name        VARCHAR(200), 
     description VARCHAR(600), 
     PRIMARY KEY(uuid) 
  ); 