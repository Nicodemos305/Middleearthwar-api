<?php
namespace entity;
use entity\Race;
class Hero extends Race
{
    
    private $race;
       
       public function __construct()
    {

    }
    public function newHero($race)
    {
        $this->setRace($race['name']);
        $this->setHealthpoint($race['hp']);
        $this->setMagicPoint($race['mp']);
        $this->setAtk($race['atk']);
        $this->setDefense($race['defense']);
        $this->setAgility($race['agility']);
        $this->setInteligence($race['inteligence']);
    }

    public function getRace()
    {
        return $this->race;
    }
    
    public function setRace($race)
    {
        $this->race = $race;
    }
}