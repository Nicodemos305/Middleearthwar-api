<?php

class Adventure {

	private $uid; 
	private $name;
	private $quests;

	public function getUid(){
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

	public function getQuests(){
		return $this->quests;
	}

	public function setQuests($quests){
		$this->quests = $quests;
	}
}