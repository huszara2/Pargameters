<body>
<?php include_once("game.php");?>
		
<?php
	
	$genreCheck=false;
	$typeCheck="false";
	
	$gameTest1 = new Game('Dominion','Tabletop',10,100,30,50,'Deck building',2,5);
	$gameTest2 = new Game('Superfight','Tabletop',6,100,20,40,'Storytelling',3,10);
	$gameTest3 = new Game('MarioKart 8','Video',5,100,3,60,'Racing',1,8);
	
	$list=new SplDoublyLinkedList();
	$list->push($gameTest1);
	$list->push($gameTest2);
	$list->push($gameTest3);
	
	$currentList1=$list;
	$tempList=new SplDoublyLinkedList();
	
	if($_POST["genre"]!="") {
		$genreCheck=true;
		echo "we are filtering by genre";
	}	
	
	if($_POST["type_Video"]!="on" || $_POST["type_typeTT"]!="on") {
		if($_POST["type_Video"]=="on" {
			$typeCheck="Video";
		}
		else if($_POST["type_TT"]=="on" {
			$typeCheck="TableTop";
		}
		else {
			$typeCheck="none";
		}
		echo "we are filtering by type: $typeCheck";
	}
		
	echo $_POST["minAge"];
	echo $_POST["maxAge"]; 
	echo $_POST["eighteenPlus"];
	echo $_POST["minTime"];
	echo $_POST["maxTime"]; 
	echo $_POST["twoPlus"]; 
	echo $_POST["players"];
	
	echo "\n";
	
	
	
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
	
	$currentList1->rewind();
	while($this->currentList1->valid()) {
		echo $currentList1->current();
		$currentList1->next();
	}	
	
?>
</body>