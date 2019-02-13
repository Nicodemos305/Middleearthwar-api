<?php

class Battle{

	private  $playerOne;
	private  $playerTwo;
	private $statusBattle;
	private $whoWin;

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

}