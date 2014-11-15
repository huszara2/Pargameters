<?php
/*
 *Alana Huszar
 *CSC 415
 *Independent Project
/*

/* Collection object
*/

	class Collection{
		private $user;
		private $masterCollection = SplDoublyLinkedList;
		
		public function __construct($masterCollection) {
			$this->masterCollection=$masterCollection;
		}
		
		public function addToCollection($gameAdd) {
			($this->masterCollection)->push($gameAdd);
		}
		
		public function __toString() {
			$returnString=" ";
			rewind($this->masterCollection);
			while(valid($this->masterCollection)) {
				$returnString=$returnString . current($this->masterCollection);
				next($this->masterCollection);
			}
			return $returnString;
		}
	}