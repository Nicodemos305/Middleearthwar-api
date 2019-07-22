<?php 
	 class World{

		private $uid;
		private $name;
		private $description;

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

		public function getDescription(){
			return $this->description;
		}

		public function setDescription($description){
			$this->description = $description;
		}
	}