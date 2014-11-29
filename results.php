<body>
<?php include_once("game.php");?>
		
<?php
	
	/* Booleans/Strings for checking each search parameter
	*/
	$genreCheck=false;
	$typeCheck="false";
	$minAgeC=NULL;
	$maxAgeC=NULL;
	$minTimeC=NULL;
	$maxTimeC=NULL;
	$playerCheck=NULL;
	
	$errorMessage="";
	
	/* Games listed
	*/
	$list=new SplDoublyLinkedList();
	$list->push(new Game('Dominion','Tabletop',10,100,30,50,'Deck building',2,5));
	$list->push(new Game('Superfight','Tabletop',6,100,20,40,'Storytelling',3,10));
	$list->push(new Game('MarioKart 8','Video',5,100,3,60,'Racing',1,4));
	$list->push(new Game('Pandemic','Tabletop',8,100,35,55,'Co-op',2,4));
	$list->push(new Game('MarioKart: Double Dash','Video',5,100,3,60,'Racing',1,4));
	$list->push(new Game('Candy Land','Tabletop',3,6,20,35,'Racing',2,4));
	$list->push(new Game('Clue','Tabletop',8,100,35,55,'Deduction',3,6));
	$list->push(new Game('Love Letter','Tabletop',10,100,15,25,'Deduction',2,4));
	$list->push(new Game('Dweebies','Tabletop',5,14,15,25,'Deduction',2,4));	
	$list->push(new Game('The Game of Life','Tabletop',6,12,50,70,'Economic',2,6));
	$list->push(new Game('Mouse Trap','Tabletop',5,10,25,35,'',2,4));

	
	$currentList1=$list;

	
	if($_POST["genre"]!="") {
		$genreCheck=true;
		echo "we are filtering by genre <br/>";
	}	
	
	if($_POST["type_Video"]!="on" || $_POST["type_TT"]!="on") {
		if($_POST["type_Video"]=="on") {
			$typeCheck="Video";
		}
		else if($_POST["type_TT"]=="on") {
			$typeCheck="Tabletop";
		}
		else {
			$typeCheck="none";
		}
		echo "we are filtering by type: $typeCheck <br/>";
	}
	
	if($_POST["minAge"]!=0) {
		$minAgeC=$_POST["minAge"];
		echo "we are filtering by minimum age: $minAgeC <br/>";
	}
	
	if($_POST["maxAge"]<=17 && $_POST["eighteenPlus"]!="on" && $_POST["maxAge"]!=NULL) { //if we set a maxAge less than 17, and eighteen plus isn't on
		$maxAgeC=$_POST["maxAge"];
		echo "we are filtering by maximum age: $maxAgeC <br/>";
	}
	else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]!=17 && $_POST["maxAge"]!=NULL) { //in this case, we leave maxAgeC NULL because we do not care to sort by maxAge
		$errorMessage= $errorMessage . "The range of ages you selected has a gap. Try unchecking 18+ <br/>";
		echo $errorMessage;
	}
	else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]==NULL && $_POST["minAge"]==NULL) { //if everything but 18+ is blank, we only want to search 18+
		$minAgeC=18;
		echo "we are filtering by minimum age: 18 </br>";
	}
	
	if($_POST["minTime"]!=0) {
		$minTimeC=$_POST["minTime"];
		echo "we are filtering by minimum time: $minTimeC <br/>";
	}
	
	if($_POST["maxTime"]<=119 && $_POST["twoPlus"]!="on" && $_POST["maxTime"]!=NULL) { //if we set a maxTime less than 120, and 120 plus isn't on
		$maxTimeC=$_POST["maxTime"];
		echo "we are filtering by maximum time: $maxTimeC <br/>";
	}
	else if($_POST["twoPlus"]=="on" && $_POST["maxTime"]!=119 && $_POST["maxTime"]!=NULL) { //in this case, we leave maxTimeC NULL because we do not care to sort by maxTime
		$errorMessage= $errorMessage . "The range of time you selected has a gap. Try unchecking 120+ <br/>";
		echo $errorMessage;
	}
	else if($_POST["twoPlus"]=="on" && $_POST["maxTime"]==NULL && $_POST["minTime"]==NULL) { //if everything but 120+ is blank, we only want to search 120+
		$minTimeC=120;
		echo "we are filtering by minimum time: 120 </br>";
	}
	
	//Filter by genre
	if($genreCheck==true) {
		$tempList=new SplDoublyLinkedList();
		$currentList1->rewind();
		while($currentList1->valid()) {
			if($_POST["genre"]==$currentList1->current()->getGenre()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}
	
	//Filter by type
	if($typeCheck!="false") {
		$tempList=new SplDoublyLinkedList();
		$currentList1->rewind();
		while($currentList1->valid()) {
			if($typeCheck==$currentList1->current()->getType()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}	
	
	//Filter by minimum age
	if($minAgeC!=NULL && $minAgeC!=0) {
		$tempList=new SplDoublyLinkedList();
		$currentList1->rewind();
		echo "We should be filtering by minimum age...</br>";
		while($currentList1->valid()) {
			if($minAgeC<=$currentList1->current()->getMaxAge()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}	
	
	//filter by maximum age
	if($maxAgeC!=NULL) {
		$tempList=new SplDoublyLinkedList();
		$currentList1->rewind();
		echo "We should be filtering by maximum age...</br>";
		while($currentList1->valid()) {
			if($maxAgeC>=$currentList1->current()->getMinAge()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}
	
	//Filter by minimum time
	if($minTimeC!=NULL && $minTimeC!=0) { 
		$tempList=new SplDoublyLinkedList();
		$currentList1->rewind();
		echo "We should be filtering by minimum time...</br>";
		while($currentList1->valid()) {
			if($minTimeC<=$currentList1->current()->getMaxTime()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}	
	
	//Filter by maximum time
	if($maxTimeC!=NULL) { 
		$tempList=new SplDoublyLinkedList();
		$currentList1->rewind();
		echo "We should be filtering by maximum time...</br>";
		while($currentList1->valid()) {
			if($maxTimeC>=$currentList1->current()->getMinTime()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}	
	
	//Filter by players
	if($playerCheck!=NULL) {
		$tempList=new SplDoublyLinkedList();
		$currentList1->rewind();
		while($currentList1->valid()) {
			if($_POST["players"]>=$currentList1->current()->getMinPlayers() && $_POST["players"]<=$currentList1->current()->getMaxPlayers()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}
	
	//Final Results!
	$currentList1->rewind();
	while($currentList1->valid()) {
		echo $currentList1->current();
		echo "<br/>";
		$currentList1->next();
	}	
	
?>
</body>