<?php 

	class Phase{

	private $uid;
	private $battle_id;
	private $player_id;
	private $description;

	public function getUid(){
		return $this->uid;
	}

	public function setUid($uid){
		$this->uid = $uid;
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


	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}
}