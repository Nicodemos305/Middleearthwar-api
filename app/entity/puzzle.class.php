<?php
namespace entity;
class Puzzle {

	private $name;
	private $puzzle;
	private $result;

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getPuzzle(){
		return $this->puzzle;
	}

	public function setPuzzle($puzzle){
		$this->puzzle = $puzzle;
	}

	public function getResult(){
		return $this->result;
	}

	public function setResult($result){
		$this->result = $result;
	}

}