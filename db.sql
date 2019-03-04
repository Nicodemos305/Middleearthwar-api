CREATE DATABASE if not EXISTS rpgcloud; 

create table player (
 id int AUTO_INCREMENT,
 login varchar(255),
 password varchar(255),
 email varchar(255),
 PRIMARY KEY(id)
);

create table hero(
 id int AUTO_INCREMENT,
 name varchar(255),
 race varchar(255),
 hp int,
 mp int,
 atk int,
 defense int,
 agility int,
 inteligence int,
 id_player int,
 PRIMARY KEY(id),
 FOREIGN KEY (id_player) REFERENCES player(id)
);

create table battle(
	id int AUTO_INCREMENT,
	id_hero_one int,
	id_hero_two int,
	status_battle varchar(10),
	win_battle int,
	PRIMARY KEY(id),
	FOREIGN KEY (id_hero_one) REFERENCES hero(id)
)

create table phase(
	id int AUTO_INCREMENT,
	id_hero_one int,
	id_battle int,
	PRIMARY KEY(id)
)

create table world(
	id int AUTO_INCREMENT,
	name varchar(200),
	PRIMARY KEY(id)
)