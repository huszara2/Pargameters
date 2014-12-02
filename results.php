<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Pargameters</title>
</head>
<body>
<?php include_once("game.php");?>
<div>
	<?php echo "<b>Pargameters</b></br>";
		echo "What would you like to play?</br>";
	?>
</div>

<div class="centered">		
<?php
	
	/* Booleans/Strings for checking each search parameter
	*/
	 $genreCheck=false;
	 $typeCheck="false";
	 $minAgeC=NULL;
	 $maxAgeC=NULL;
	 $minTimeC=NULL;
	 $maxTimeC=NULL;
	 $playerCheck=0;
	
	 $errorMessage="";
	
	 $list=new SplDoublyLinkedList();
	 $list2=new SplDoublyLinkedList();
	
	 $row = 1;
	if (($handle = fopen("user1.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			$row++;
			$list->push(new Game($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8]));
		}
		fclose($handle);
	}	
	
	$row = 1;
	if (($handle = fopen("user2.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			$row++;
			$list2->push(new Game($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8]));
		}
		fclose($handle);
	}	
	
	 $currentList1=$list;
	 $currentList2=$list2;

	
	if($_POST["genre"]!="") {
		$genreCheck=true;
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
	}
	
	if($_POST["minAge"]>$_POST["maxAge"]) {
		$errorMessage= $errorMessage . "The age range you indicated should be in numerical order. <br/>";
	}
	
	if($_POST["minAge"]!=0) {
		$minAgeC=$_POST["minAge"];
	}
	
	if($_POST["maxAge"]<=17 && $_POST["eighteenPlus"]!="on" && $_POST["maxAge"]!=NULL) { //if we set a maxAge less than 17, and eighteen plus isn't on
		$maxAgeC=$_POST["maxAge"];
	}
	else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]!=17 && $_POST["maxAge"]!=NULL) { //in this case, we leave maxAgeC NULL because we do not care to sort by maxAge
		$errorMessage= $errorMessage . "The range of ages you selected has a gap. Try unchecking 18+ <br/>";
	}
	else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]==NULL && $_POST["minAge"]==NULL) { //if everything but 18+ is blank, we only want to search 18+
		$minAgeC=18;
	}
	
	if($_POST["minTime"]>$_POST["maxTime"]) {
		$errorMessage= $errorMessage . "The time range you indicated should be in numerical order. <br/>";
	}
	
	if($_POST["minTime"]!=0) {
		$minTimeC=$_POST["minTime"];
	}
	
	if($_POST["maxTime"]<=119 && $_POST["twoPlus"]!="on" && $_POST["maxTime"]!=NULL) { //if we set a maxTime less than 120, and 120 plus isn't on
		$maxTimeC=$_POST["maxTime"];
	}
	else if($_POST["twoPlus"]=="on" && $_POST["maxTime"]!=119 && $_POST["maxTime"]!=NULL) { //in this case, we leave maxTimeC NULL because we do not care to sort by maxTime
		$errorMessage= $errorMessage . "The range of time you selected has a gap. Try unchecking 120+ <br/>";
	}
	else if($_POST["twoPlus"]=="on" && $_POST["maxTime"]==NULL && $_POST["minTime"]==NULL) { //if everything but 120+ is blank, we only want to search 120+
		$minTimeC=120;
	}
		
	if($_POST["players"]!=NULL) {
		$playerCheck=$_POST["players"];
	}
	
	if($errorMessage=="") {
		//Filter by genre
		if($genreCheck==true) {
			$tempList=new SplDoublyLinkedList();
			$currentList1->rewind();
			while($currentList1->valid()) {
				if(strcasecmp($_POST["genre"],$currentList1->current()->getGenre())==0) {
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
			while($currentList1->valid()) {
				if($maxTimeC>=$currentList1->current()->getMinTime()) {
					$tempList->push($currentList1->current());
				}
				$currentList1->next();
			}
			$currentList1=$tempList;
		}	
		
		//Filter by players
		if($playerCheck!=0) {
			$tempList=new SplDoublyLinkedList();
			$currentList1->rewind();
			while($currentList1->valid()) {
				if($playerCheck>=$currentList1->current()->getMinPlayers() && $playerCheck<=$currentList1->current()->getMaxPlayers()) {
					$tempList->push($currentList1->current());
				}
				$currentList1->next();
			}
			$currentList1=$tempList;
		}
		
		//Filter by genre (second list)
		if($genreCheck==true && $_POST["userCheck"]=="on") {
			$tempList=new SplDoublyLinkedList();
			$currentList2->rewind();
			while($currentList2->valid()) {
				if(strcasecmp($_POST["genre"],$currentList2->current()->getGenre())==0) {
					$tempList->push($currentList2->current());
				}
				$currentList2->next();
			}
			$currentList2=$tempList;
		}
		
		//Filter by type (second list)
		if($typeCheck!="false" && $_POST["userCheck"]=="on") {
			$tempList=new SplDoublyLinkedList();
			$currentList2->rewind();
			while($currentList2->valid()) {
				if($typeCheck==$currentList2->current()->getType()) {
					$tempList->push($currentList2->current());
				}
				$currentList2->next();
			}
			$currentList2=$tempList;
		}	
		
		//Filter by minimum age (second list)
		if($minAgeC!=NULL && $minAgeC!=0 && $_POST["userCheck"]=="on") {
			$tempList=new SplDoublyLinkedList();
			$currentList2->rewind();
			while($currentList2->valid()) {
				if($minAgeC<=$currentList2->current()->getMaxAge()) {
					$tempList->push($currentList2->current());
				}
				$currentList2->next();
			}
			$currentList2=$tempList;
		}	
		
		//filter by maximum age (second list)
		if($maxAgeC!=NULL && $_POST["userCheck"]=="on") {
			$tempList=new SplDoublyLinkedList();
			$currentList2->rewind();
			while($currentList2->valid()) {
				if($maxAgeC>=$currentList2->current()->getMinAge()) {
					$tempList->push($currentList2->current());
				}
				$currentList2->next();
			}
			$currentList2=$tempList;
		}
		
		//Filter by minimum time (second list)
		if($minTimeC!=NULL && $minTimeC!=0 && $_POST["userCheck"]=="on") { 
			$tempList=new SplDoublyLinkedList();
			$currentList2->rewind();
			while($currentList2->valid()) {
				if($minTimeC<=$currentList2->current()->getMaxTime()) {
					$tempList->push($currentList2->current());
				}
				$currentList2->next();
			}
			$currentList2=$tempList;
		}	
		
		//Filter by maximum time (second list)
		if($maxTimeC!=NULL && $_POST["userCheck"]=="on") { 
			$tempList=new SplDoublyLinkedList();
			$currentList2->rewind();
			while($currentList2->valid()) {
				if($maxTimeC>=$currentList2->current()->getMinTime()) {
					$tempList->push($currentList2->current());
				}
				$currentList2->next();
			}
			$currentList2=$tempList;
		}	
		
		//Filter by players (second list)
		if($playerCheck!=0 && $_POST["userCheck"]=="on") {
			$tempList=new SplDoublyLinkedList();
			$currentList2->rewind();
			while($currentList2->valid()) {
				if($playerCheck>=$currentList2->current()->getMinPlayers() && $playerCheck<=$currentList2->current()->getMaxPlayers()) {
					$tempList->push($currentList2->current());
				}
				$currentList2->next();
			}
			$currentList2=$tempList;
		}
		
		//remove doubles from currentList2
		if($_POST["userCheck"]=="on") {
			$currentList1->rewind();
			while($currentList1->valid()) {
				$tempList=new SplDoublyLinkedList();
				$currentList2->rewind();
				
				while($currentList2->valid()) {
					if(strcasecmp($currentList2->current()->getTitle(),$currentList1->current()->getTitle())!=0) {
						$tempList->push($currentList2->current());
					}
					$currentList2->next();
				}
				
				$currentList2=$tempList;
				$currentList1->next();
				
			}
			$currentList2=$tempList;
		}

		
		//Final Results!
		echo "<b>In your collection:</b> </br>";
		if($currentList1->count()==0) {
			echo "No games found. Try refining your search.</br>";
		}
		else {
			echo "<table><tr><th>Title</th><th>Type</th><th>Age</th><th>Time</th><th>Genre</th><th>Players</th></tr>";
			$currentList1->rewind();
			while($currentList1->valid()) {
				echo "<tr><td>" . $currentList1->current()->getTitle() . "</td>";
				echo "<td>" . $currentList1->current()->getType() . "</td>";
				echo "<td>" . $currentList1->current()->ageRange() . "</td>";
				echo "<td>" . $currentList1->current()->timeRange() . "</td>";
				echo "<td>" . $currentList1->current()->getGenre() . "</td>";
				echo "<td>" . $currentList1->current()->playerRange() . "</td>";
				echo "</tr>";
				$currentList1->next();
			}
			echo "</table>";
		}
		
		if($_POST["userCheck"]=="on") {
			echo "</br><b>In others' collections:</b> </br>";
			if($currentList2->count()==0) {
				echo "No games found.";
			}
			else {
				echo "<table><tr><th>Title</th><th>Type</th><th>Age</th><th>Time</th><th>Genre</th><th>Players</th></tr>";
				$currentList2->rewind();
				while($currentList2->valid()) {
					echo "<tr><td>" . $currentList2->current()->getTitle() . "</td>";
					echo "<td>" . $currentList2->current()->getType() . "</td>";
					echo "<td>" . $currentList2->current()->ageRange() . "</td>";
					echo "<td>" . $currentList2->current()->timeRange() . "</td>";
					echo "<td>" . $currentList2->current()->getGenre() . "</td>";
					echo "<td>" . $currentList2->current()->playerRange() . "</td>";
					echo "</tr>";
					$currentList2->next();
				}
				echo "</table>";
			}
		}
	}
	else{
		echo $errorMessage;
	}
	
?>
</div>

<form>
<input type="button" value="Back" onClick="history.back()">
</form>
</body>