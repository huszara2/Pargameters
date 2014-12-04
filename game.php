<?php
/* Name: Alana Huszar
// Course: CSC 415
// Semester: Fall 2014
// Instructor: Dr. Pulimood 
// Project name: Pargameters
// Description: Returns playable games based on user given parameters
// Filename: game.php
// Description: object representing a game
// Last modified on: December 1, 2014
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
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: __construct
		//
		//    Parameters:    
		//    input String; String for game's title
		//    input String; String for the type of game (should be tabletop/video)
		//    input integer;Integer for the suggested age range (minimum) 
		//    input integer;Integer for the suggested age range (maximum) 
		//    input integer;Integer for the suggested time range (minimum)
		//    input integer;Integer for the suggested time range (maximum) 
		//    input String; String for the game's genre 
		//    input integer;Integer for the minimum number of players the game supports 
		//    input integer;Integer for the maximum number of players the game supports 
		//
		//    Pre-condition: Parameters are entered properly
		//    Post-condition: Games object is created, all other functions can be used
		//-----------------------------------------------------------------------------------------
		*/
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
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getTitle
		//
		//    Parameters:    
		//
		//    Pre-condition: Title has been set for the game object
		//    Post-condition: Return title of the game
		//-----------------------------------------------------------------------------------------
		*/
		public function getTitle() {
			return $this->title;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setTitle
		//
		//    Parameters:    
		//    input String; String for game's title
		//
		//    Pre-condition: 
		//    Post-condition: Games object's title has been set to the new value
		//-----------------------------------------------------------------------------------------
		*/
		public function setTitle($newTitle) {
			$this->title=$newTitle;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getType
		//
		//    Parameters:    
		//
		//    Pre-condition: Type has been set for the game object
		//    Post-condition: Return type of the game (should be tabletop/video)
		//-----------------------------------------------------------------------------------------
		*/
		public function getType() {
			return $this->type;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setType
		//
		//    Parameters:    
		//    input String; String for type of game (tabletop/video)
		//
		//    Pre-condition: 
		//    Post-condition: Games object's type has been set to the new value
		//-----------------------------------------------------------------------------------------
		*/
		public function setType($newType) {
			$this->type=$newType;
		}

		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getMinAge
		//
		//    Parameters:    
		//    input String; 
		//
		//    Pre-condition: 
		//    Post-condition: Games object's title has been set to the new value
		//-----------------------------------------------------------------------------------------
		*/	
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
			return $this->minTime . "-" . $this->maxTime;
		}
				
		public function getGenre() {
			return $this->genre;
		}
		
		public function setGenre($newGen) {
			$this->setGenre=$newGen;
		}
		
		public function getMinPlayers() {
			return $this->minPlayers;
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
		
		public function playerRange() {
			if($this->maxPlayers==$this->minPlayers) {
				return $this->minPlayers;
			}
			else {
				return $this->minPlayers . "-" . $this->maxPlayers;
			}
		}
		
		public function __toString() {
				return "<b>" . $this->title . "</b>, " . $this->type . ", " . $this->ageRange() . " years, " . $this->timeRange() . " minutes, " . $this->genre . ", " . $this->playerRange() . " players.";
		}
		
		
	}
?>
	
