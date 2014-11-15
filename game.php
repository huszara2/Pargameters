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
		private $compareNumber=0;

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
			return $this->maxAge;
		}
		
		public function setMaxAge($newMax) {
			$this->maxAge=$newMax;
		}
		
		public function ageRange() {
			if($this->maxAge>99) {
				return $this->minAge . "+";
			}
			else {
				return $this->minAge . "-" . $this->maxAge;
			}
		}
		
		public function getMinTime() {
			return $this->minTime;
		}
		
		public function setMinTime($newMin) {
			$this->minTime=$newMin;
		}
		
		public function getMaxTime() {
			return $this->maxTime;
		}
		
		public function setMaxTime($newMax) {
			$this->maxTime=$newMax;
		}
		
		public function timeRange() {
			return $this->minTime() . "-" . this->maxTime();
		}
				
		public function getGenre() {
			return $this->genre;
		}
		
		public function setGenre($newGen) {
			$this->setGenre=$newGen;
		}
		
		public function getMinPlayers() {
			return $this->minAge;
		}
		
		public function setMinPlayers($newMin) {
			$this->minPlayers=$newMin;
		}
		
		public function getMaxPlayers() {
			return $this->maxPlayers;
		}
		
		public function setMaxPlayers($newMax) {
			$this->maxPlayers=$newMax;
		}
		
		public function __toString() {
				return $this->title . ", " . $this->type . ", " . $this->minAge . "-" . $this->maxAge . " years, " . $this->minTime . "-" . $this->maxTime . " minutes, " . $this->genre . ", " . $this->minPlayers . "-" . $this->maxPlayers . " players.";
		}
		
		public static function compType($compNum) {
			$this->compareNumber=$compNum;
		}
		
		public static function cmp($gameA, $gameB) {
			if($this->compareNumber==0) { //title
				return strcmp($gameA->getTitle(),$gameB->getTitle());
			}
			/*if($this->compareNumber==1) { //type
				return strcmp($gameA->getType(),$gameB->getType());
			}
			if($this->compareNumber==2) { //minAge
				if($gameA->getMinAge() == $gameB->getMinAge()) {
					return 0;
				}
				else {
					return($gameA->getMinAge() < $gameB->getMinAge()
			*/
		
		}
		
		
	}
?>
	
