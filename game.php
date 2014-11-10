<?php
/*
 *Alana Huszar
 *CSC 415
 *Independent Project
/*

/* Games object
*/

	class Game{
		private $title;
		private $type;
		private $minAge;
		private $maxAge;
		private $minTime;
		private $maxTime;
		private $genre;
		private $minPlayers;
		private $maxPlayers;

		public function __construct($title,$type,$minAge,$maxAge,$minTime,$maxTime,$genre,$minPlayers,$maxPlayers) {
			$this->title=$title;
			$this->type=$type;
			$this->minAge=$minAge;
			$this->maxAge=$maxAge;
			$this->minTime=$minTime;
			$this->maxTime=$maxTime;
			$this->genre=$genre;
			$this->minPlayers=$minPlayers;
			$this->maxPlayers=$maxPlayers;
		}
		
		public function getTitle() {
			return $this->title;
		}
		
		public function setTitle($newTitle) {
			$this->title=$newTitle;
		}
		
		public function getType() {
			return $this->type;
		}
		
		public function setType($newType) {
			$this->type=$newType;
		}

		public function getMinAge() {
			return $this->minAge;
		}
		
		public function setMinAge($newMin) {
			$this->minAge=$newMin;
		}
		
		public function getMaxAge() {
			$return $this->maxAge;
		}
	}
?>
	
