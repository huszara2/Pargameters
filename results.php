<body>
<?php include_once("game.php");?>
		
<?php
	
	/* Booleans/Strings for checking each search parameter
	*/
	$genreCheck=false;
	$typeCheck="false";
	$minAgeC=NULL;
	$maxAgeC=NULL;
	
	$errorMessage="";
	
	/* Games listed
	*/
	$gameTest2 = new Game('Superfight','Tabletop',6,100,20,40,'Storytelling',3,10);
	$gameTest3 = new Game('MarioKart 8','Video',5,100,3,60,'Racing',1,4);
	$gameTest4 = new Game('Pandemic','Tabletop',8,100,35,55,'Co-op',2,4);
	$gameTest5 = new Game('MarioKart: Double Dash','Video',5,100,3,60,'Racing',1,4);
	
	$list=new SplDoublyLinkedList();
	$list->push(new Game('Dominion','Tabletop',10,100,30,50,'Deck building',2,5));
	$list->push($gameTest2);
	$list->push($gameTest3);
	$list->push($gameTest4);
	$list->push($gameTest5);
	
	$currentList1=$list;
	$tempList=new SplDoublyLinkedList();
	
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
	
	if($_POST["minAge"]>$POST_["maxAge"]) {
		$errorMessage=$errorMessage . "Please make sure the minimum age is less than the maximum age.";
		echo $errorMessage;
	}
	else if($_POST["maxAge"]<=17 && $_POST["eighteenPlus"]!="on") { //if we set a maxAge less than 17, and eighteen plus isn't on
		$maxAgeC=$_POST["maxAge"];
		echo "we are filtering by maximum age: $maxAgeC <br/>";
	}
	else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]!=17 && $_POST["maxAge"]!=NULL) { //in this case, we leave maxAgeC NULL because we do not care to sort by maxAge
			$errorMessage= $errorMessage . "The range of ages you selected has a gap. Try unchecking 18+";
			echo $errorMessage;
	}
	
	//echo $_POST["minTime"];
	//echo $_POST["maxTime"]; 
	//echo $_POST["twoPlus"]; 
	//echo $_POST["players"];
	
	if($genreCheck==true) {
		$currentList1->rewind();
		while($currentList1->valid()) {
			if($_POST["genre"]==$currentList1->current()->getGenre()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}
	
	if($typeCheck!="false") {
		$currentList1->rewind();
		while($currentList1->valid()) {
			if($typeCheck==$currentList1->current()->getType()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}	
	
/*	if($minAgeC!=NULL && $minAgeC!=0) {
		$currentList1->rewind();
		while($currentList1->valid()) {
			if($minAgeC<=$currentList1->current()->getMinAge()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}	
	
	if($maxAgeC!=NULL) {
		$currentList1->rewind();
		while($currentList1->valid()) {
			if($maxAgeC>=$currentList1->current()->getMaxAge()) {
				$tempList->push($currentList1->current());
			}
			$currentList1->next();
		}
		$currentList1=$tempList;
	}
*/	
	
	$currentList1->rewind();
	while($currentList1->valid()) {
		echo $currentList1->current();
		echo "<br/>";
		$currentList1->next();
	}	
	
?>
</body>