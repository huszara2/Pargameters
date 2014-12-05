<?php
/*
 *Alana Huszar
 *CSC 415
 *Independent Project
/*

/* Object for finding games, not in use at the moment. Intended to be used alongside results.php, but ended up inside of results.php
because of formatting issues. Still here because I would like it to be used instead at some point. As of right now, results.php should
not really be handling the search, although it is for the time being.
*/

	class finder{

		private $typeCheck=false;
		private $maxAgeCheck=false;
		private $minAgeCheck=false;
		private $maxTimeCheck=false;
		private $minTimeCheck=false;
		private $genreCheck=false;
		private $playerCheck=false;
		
		private $type;
		private $minAge;
		private $maxAge;
		private $minTime;
		private $maxTime;
		private $genre;
		private $minPlayers;
		private $maxPlayers;
		
		private $originalList;
		private $currentList;
		
		public function __construct($originalList) {
			$this->originalList=$originalList;
			$this->currentList=$originalList;
		}
		
		public function revert() {
			$this->currentList=$originalList;
		}
		
		public function refine() {
			if($this->typeCheck==true) {
				$this->typeFilter() {
			}
			if($this->ageCheck==true) {
				$this->ageFilter();
			}
			if($this->timeCheck==true) {
				$this->timeFilter();
			}
			if($this->genreCheck==true) {
				$this->genreFilter();
			}
			if($this->playerCheck==true) {
				$this->playerFilter();
			}
			return $currentList;
		}
		
		public function typeChange($wantedType) {
			$this->type=$wantedType;
			$this->typeCheck=true;
		}
		
		public function minAgeChange($minAge) {
			$this->minAge=$minAge;
			$this->minAgeCheck=true;
		}
		
		public function maxAgeChange($maxAge) {
			$this->maxAge=$maxAge;
			$this->maxAgeCheck=true;
		}
		
		public function timeChange($minTime,$maxTime) {
			$this->minAge=$minTime;
			$this->maxAge=$maxTime;
			$this->timeCheck=true;
		}		
	
		public function genreChange($genre) {
			$this->genre=$genre;
			$this->genreCheck=true;
		}
		
		public function playerChange($minPlayers,$maxPlayers) {
			$this->minPlayers=$minPlayers;
			$this->maxPlayers=$maxPlayers;
			$this->playerCheck=true;
		}
		
		public function typeFilter() {
				$this->currentList->rewind();
				while($this->currentList->valid()) {
					if($this->currentList->current()->
					echo $list->current();
					$list->next();
				}
	}
	}
?>