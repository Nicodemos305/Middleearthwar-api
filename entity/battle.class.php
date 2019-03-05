<?php

class Battle{

	private  $playerOne;
	private  $playerTwo;
	private $statusBattle;
	private $whoWin;
	private $hpOne;
	private $hpTwo;


	public function getPlayerOne(){
		return $this->playerOne;
	}

	public function setPlayerOne($playerOne){
		$this->playerOne = $playerOne;
	}

	public function getPlayerTwo(){
		return $this->playerTwo;
	}

	public function setPlayerTwo($playerTwo){
		$this->playerTwo = $playerTwo;
	}

	public function getStatusBattle(){
		return $this->statusBattle;
	}

	public function getHpOne(){
		return $this->hpOne;
	}

	public function setHpOne($hpOne){
		$this->hpOne = $hpOne;
	}

	public function getHpTwo(){
		return $this->hpTwo;
	}

	public function setHpTwo($hpTwo){
		$this->hpTwo = $hpTwo;
	}

}