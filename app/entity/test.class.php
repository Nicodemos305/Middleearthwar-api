<?php

class Test{

	private $uid;
	private $name;
	private $goal;
	private $result;
	private $test;

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

	public function getGoal(){
		return $this->goal;
	}

	public function setGoal($goal){
		$this->goal = $goal;
	}

	public function getResult(){
		return $this->result;
	}

	public function setResult($result){
		$this->result = $result;
	}

	public function getTest(){
		return $this->test;
	}

	public function setTest($test){
		$this->test = $test;
	}
}