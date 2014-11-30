<body>
<?php include_once("game.php");?>
		
<?php
	
	/* Booleans/Strings for checking each search parameter
	*/
	private $genreCheck=false;
	private $typeCheck="false";
	private $minAgeC=NULL;
	private $maxAgeC=NULL;
	private $minTimeC=NULL;
	private $maxTimeC=NULL;
	private $playerCheck=0;
	
	private $errorMessage="";
	
	private $list=new SplDoublyLinkedList();
	private $list2=new SplDoublyLinkedList();
	
	private $row = 1;
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
	
	/* Games listed
	*/
	$list->push(new Game('MarioKart 8','Video',5,100,3,60,'Racing',1,4));
	$list->push(new Game('MarioKart: Double Dash','Video',5,100,3,60,'Racing',1,4));

	
	private $currentList1=$list;

	
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
	
	if($_POST["minAge"]!=0) {
		$minAgeC=$_POST["minAge"];
	}
	
	if($_POST["maxAge"]<=17 && $_POST["eighteenPlus"]!="on" && $_POST["maxAge"]!=NULL) { //if we set a maxAge less than 17, and eighteen plus isn't on
		$maxAgeC=$_POST["maxAge"];
	}
	else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]!=17 && $_POST["maxAge"]!=NULL) { //in this case, we leave maxAgeC NULL because we do not care to sort by maxAge
		$errorMessage= $errorMessage . "The range of ages you selected has a gap. Try unchecking 18+ <br/>";
		echo $errorMessage;
	}
	else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]==NULL && $_POST["minAge"]==NULL) { //if everything but 18+ is blank, we only want to search 18+
		$minAgeC=18;
	}
	
	if($_POST["minTime"]!=0) {
		$minTimeC=$_POST["minTime"];
	}
	
	if($_POST["maxTime"]<=119 && $_POST["twoPlus"]!="on" && $_POST["maxTime"]!=NULL) { //if we set a maxTime less than 120, and 120 plus isn't on
		$maxTimeC=$_POST["maxTime"];
	}
	else if($_POST["twoPlus"]=="on" && $_POST["maxTime"]!=119 && $_POST["maxTime"]!=NULL) { //in this case, we leave maxTimeC NULL because we do not care to sort by maxTime
		$errorMessage= $errorMessage . "The range of time you selected has a gap. Try unchecking 120+ <br/>";
		echo $errorMessage;
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
		
		//Final Results!
		echo "In your collection: <br/>";
		$currentList1->rewind();
		while($currentList1->valid()) {
			echo $currentList1->current();
			echo "<br/>";
			$currentList1->next();
		}	
		echo "In others' collections: <br/>";
	}
	else{
		echo $errorMessage;
	}
	
?>
</body>