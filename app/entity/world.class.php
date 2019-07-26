<?php 
	 class World{

		private $uuid;
		private $name;
		private $description;

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

		public function getDescription(){
			return $this->description;
		}

		public function setDescription($description){
			$this->description = $description;
		}
	}