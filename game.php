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
			return $title;
		}
		
		public function setTitle($newTitle) {
			$title=$newTitle;
		}
		
		public function getType() {
			return $type;
		}
		
		public function setType($newType) {
			$type=$newType;
		}


	}
?>
	
