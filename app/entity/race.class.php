<?php

class Race {

	private $uid; 
	private $name;
	private $healthPoint;
	private $magicPoint;
	private $atk;
	private $defense;
	private $agility;
	private $inteligence;

	public function __construct() {

	}

	public function __construct($name, $race, $healthPoint, $magicPoint, $atk, $defense, $agility, $inteligence) {
        $this->name = $name;
        $this->healthPoint = $healthPoint;
        $this->magicPoint = $magicPoint;
        $this->atk = $atk;
        $this->defense = $defense;
        $this->agility = $agility;
        $this->inteligence = $inteligence;
	}
	
   public function getId(){
		return $this->uid;
	}

	public function setUid($uid){
		$this->uid = $uid;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getHealthpoint(){
		return $this->healthPoint;
	}

	public function setHealthpoint($healthPoint){
		$this->healthPoint = $healthPoint;
	}

	public function getMagicPoint(){
		return $this->magicPoint;
	}

	public function setMagicPoint($magicPoint){
		$this->magicPoint = $magicPoint;
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
}