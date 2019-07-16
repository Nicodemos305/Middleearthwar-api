<?php

class Test{

	private $id;
	private $name;
	private $goal;
	private $result;
	private $test;

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