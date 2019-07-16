<?php

class Adventure {

	private $id; 
	private $name;
	private $quests;

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

	public function getQuests(){
		return $this->quests;
	}

	public function setQuests($quests){
		$this->quests = $quests;
	}

}