<?php
include_once "/var/www/html/entity/Race.class.php";
class Hero extends Race{

	private $race;

	public function __construct($name, $race, $healthPoint, $magicPoint, $atk, $defense, $agility, $inteligence) {
        $this->name = $name;
        $this->race = $race;
        $this->healthPoint = $healthPoint;
        $this->magicPoint = $magicPoint;
        $this->atk = $atk;
        $this->defense = $defense;
        $this->agility = $agility;
        $this->inteligence = $inteligence;
    }
  
	public function newHero($race){
	 		$this->setRace($race['name']);
	  		$this->setHealthpoint($race['hp']);
	 		$this->setMagicPoint($race['mp']);
	 		$this->setAtk($race['atk']);
	 	    $this->setDefense($race['defense']);
	 	    $this->setAgility($race['agility']);
	  	    $this->setInteligence($race['inteligence']);
	}
}