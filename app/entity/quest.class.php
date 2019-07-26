<?php

class Quest {

	private $uuid; 
	private $name;
	private $type;

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

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}
}