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
		//
		//    Pre-condition: Minimum age has been set for this game.
		//    Post-condition: Return game's recommended minimum age.
		//-----------------------------------------------------------------------------------------
		*/	
		public function getMinAge() {
			return $this->minAge;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setMinAge
		//
		//    Parameters:  
		//    input integer;Integer for the recommended minimum age;
		//
		//    Pre-condition: 
		//    Post-condition: Game's minimum recommended age has been set to the new value
		//-----------------------------------------------------------------------------------------
		*/	
		public function setMinAge($newMin) {
			$this->minAge=$newMin;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getMaxAge
		//
		//    Parameters:     
		//
		//    Pre-condition: Maximum age has been set for this game.
		//    Post-condition: Return game's recommended maximum age.
		//-----------------------------------------------------------------------------------------
		*/	
		public function getMaxAge() {
			return $this->maxAge;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setMaxAge
		//
		//    Parameters:   
		//	  input integer;Integer for recommended maximum age;
		//
		//    Pre-condition:
		//    Post-condition: Game's maximum recommended age has been reset.
		//-----------------------------------------------------------------------------------------
		*/	
		public function setMaxAge($newMax) {
			$this->maxAge=$newMax;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: ageRange
		//
		//    Parameters:   
		//
		//    Pre-condition: Minimum and maximum age are set integers.
		//    Post-condition: Age range is returned, if age is over 100, return minimumAge+
		//-----------------------------------------------------------------------------------------
		*/
		public function ageRange() {
			if($this->maxAge>99) {
				return $this->minAge . "+";
			}
			else {
				return $this->minAge . "-" . $this->maxAge;
			}
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getMinTime
		//
		//    Parameters:   
		//
		//    Pre-condition: Minimum time is a set integer.
		//    Post-condition:The set minimum time is returned.
		//-----------------------------------------------------------------------------------------
		*/
		public function getMinTime() {
			return $this->minTime;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setMinTime
		//
		//    Parameters:   
		//	  input integer;Integer for minimum time the game takes;
		//
		//    Pre-condition:
		//    Post-condition: Game's minimum time has been set.
		//-----------------------------------------------------------------------------------------
		*/
		public function setMinTime($newMin) {
			$this->minTime=$newMin;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getMaxTime
		//
		//    Parameters:   
		//
		//    Pre-condition: Maximum time is a set integer.
		//    Post-condition:The set maximum time is returned.
		//-----------------------------------------------------------------------------------------
		*/
		public function getMaxTime() {
			return $this->maxTime;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setMaxTime
		//
		//    Parameters:   
		//	  input integer;Integer for maximum time the game takes;
		//
		//    Pre-condition:
		//    Post-condition: Game's maximum time has been set.
		//-----------------------------------------------------------------------------------------
		*/
		public function setMaxTime($newMax) {
			$this->maxTime=$newMax;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: ageRange
		//
		//    Parameters:   
		//
		//    Pre-condition: Minimum and maximum time are set integers.
		//    Post-condition: A range of the time the game should take is returned as a string.
		//-----------------------------------------------------------------------------------------
		*/
		public function timeRange() {
			return $this->minTime . "-" . $this->maxTime;
		}
		
/*
		//-----------------------------------------------------------------------------------------
		//  Function: getGenre
		//
		//    Parameters:   
		//
		//    Pre-condition: Genre is a set string.
		//    Post-condition:The set genre is returned.
		//-----------------------------------------------------------------------------------------
		*/		
		public function getGenre() {
			return $this->genre;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setGenre
		//
		//    Parameters:   
		//	  input string;String for the game's genre;
		//
		//    Pre-condition:
		//    Post-condition: Game's genre has been set.
		//-----------------------------------------------------------------------------------------
		*/
		public function setGenre($newGen) {
			$this->setGenre=$newGen;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getMinPlayers
		//
		//    Parameters:   
		//
		//    Pre-condition: Minimum player number is a set integer.
		//    Post-condition:The set minimum player count is returned.
		//-----------------------------------------------------------------------------------------
		*/
		public function getMinPlayers() {
			return $this->minPlayers;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setMinPlayers
		//
		//    Parameters:   
		//	  input integer;Integer for the minimum number of players the game supports.
		//
		//    Pre-condition:
		//    Post-condition: Game's number of minimum players has been reset.
		//-----------------------------------------------------------------------------------------
		*/
		public function setMinPlayers($newMin) {
			$this->minPlayers=$newMin;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: getMaxPlayers
		//
		//    Parameters:   
		//
		//    Pre-condition: Maximum players is a set integer.
		//    Post-condition:The set maximum numbers of players is returned.
		//-----------------------------------------------------------------------------------------
		*/
		public function getMaxPlayers() {
			return $this->maxPlayers;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: setMaxPlayers
		//
		//    Parameters:   
		//
		//    Pre-condition: 
		//    Post-condition:The maximum number of players has been set.
		//-----------------------------------------------------------------------------------------
		*/
		public function setMaxPlayers($newMax) {
			$this->maxPlayers=$newMax;
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: playerRange
		//
		//    Parameters:   
		//
		//    Pre-condition: Minimum and maximum number of players are set integers.
		//    Post-condition:Player range is returned as a string.
		//-----------------------------------------------------------------------------------------
		*/
		public function playerRange() {
			if($this->maxPlayers==$this->minPlayers) {
				return $this->minPlayers;
			}
			else {
				return $this->minPlayers . "-" . $this->maxPlayers;
			}
		}
		
		/*
		//-----------------------------------------------------------------------------------------
		//  Function: __toString
		//
		//    Parameters:   
		//
		//    Pre-condition: All parameters for the game have been set.
		//    Post-condition:Return a string representation of a game object, the title, type, age range, time range,
		//	                 genre, and player range separated by commas.
		//-----------------------------------------------------------------------------------------
		*/
		public function __toString() {
				return "<b>" . $this->title . "</b>, " . $this->type . ", " . $this->ageRange() . " years, " . $this->timeRange() . " minutes, " . $this->genre . ", " . $this->playerRange() . " players.";
		}
		
	}
?>
	
