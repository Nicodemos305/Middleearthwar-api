<?php 
	 class Phase{

	private $id;
	private $battle_id;
	private $player_id;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getBattle_id(){
		return $this->battle_id;
	}

	public function setBattle_id($battle_id){
		$this->battle_id = $battle_id;
	}

	public function getPlayer_id(){
		return $this->player_id;
	}

	public function setPlayer_id($player_id){
		$this->player_id = $player_id;
	}
}