<?php
namespace entity;
class Adventure {

	private $uuid;
	private $name;
	private $quests;

	public function getUuid(){
		return $this->uuid;
	}

	public function setUuid($uuid){
		$this->uuid = $uuid;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getQuests(){
		return $this->quests;
	}

	public function setQuests($quests){
		$this->quests = $quests;
	}
}