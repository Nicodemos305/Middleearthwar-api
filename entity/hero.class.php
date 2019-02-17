<?php

class Hero {

	private $id; 
	private $name;
	private $race;
	private $hp;
	private $mp;
	private $atk;
	private $defense;
	private $agility;
	private $inteligence;
  
   public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getRace(){
		return $this->race;
	}

	public function setRace($race){
		$this->race = $race;
	}

	public function getHp(){
		return $this->hp;
	}

	public function setHp($hp){
		$this->hp = $hp;
	}

	public function getMp(){
		return $this->mp;
	}

	public function setMp($mp){
		$this->mp = $mp;
	}

	public function getAtk(){
		return $this->atk;
	}

	public function setAtk($atk){
		$this->atk = $atk;
	}

	public function getDefense(){
		return $this->defense;
	}

	public function setDefense($defense){
		$this->defense = $defense;
	}

	public function getAgility(){
		return $this->agility;
	}

	public function setAgility($agility){
		$this->agility = $agility;
	}

	public function getInteligence(){
		return $this->inteligence;
	}

	public function setInteligence($inteligence){
		$this->inteligence = $inteligence;
	}

	public function newHero(){
 		$this->setRace("Humano");
  		$this->setHp(100);
 		$this->setMp(100);
 		$this->setAtk(5);
 	    $this->setDefense(5);
 	    $this->setAgility(5);
  	    $this->setInteligence(5);
	}
}
