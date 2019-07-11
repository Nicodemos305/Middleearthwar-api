CREATE DATABASE rpgcloud; 

USE rpgcloud; 

CREATE TABLE player 
  ( 
     id       INT auto_increment, 
     login    VARCHAR(255), 
     password VARCHAR(800), 
     email    VARCHAR(255), 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE quest 
  ( 
     id   INT auto_increment, 
     name VARCHAR(800), 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE test 
  ( 
     id     INT auto_increment, 
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
     id          INT auto_increment, 
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
     id          INT auto_increment, 
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
     id            INT auto_increment, 
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
     id          INT auto_increment, 
     id_hero_one INT, 
     id_battle   INT, 
     description VARCHAR(400), 
     PRIMARY KEY(id) 
  ); 

CREATE TABLE world 
  ( 
     id          INT auto_increment, 
     name        VARCHAR(200), 
     description VARCHAR(600), 
     PRIMARY KEY(id) 
  ); 