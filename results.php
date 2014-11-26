<body>
<?php include_once("game.php");?>
		
<?php
	
	$gameTest1 = new Game('Dominion','Tabletop',10,100,30,50,'Deck building',2,5);
	$gameTest2 = new Game('Superfight','Tabletop',6,100,20,40,'Storytelling',3,10);
	$gameTest3 = new Game('MarioKart 8','Video',5,100,3,60,'Racing',1,8);
	
	$list=new SplDoublyLinkedList();
	$list->push($gameTest1);
	$list->push($gameTest2);
	$list->push($gameTest3);
	
	$currentList1=$list;
	
	echo $_POST["genre"];
	echo $_POST["type_Video"]; 
	echo $_POST["type_TT"]; 
	echo $_POST["minAge"];
	echo $_POST["maxAge"]; 
	echo $_POST["eighteenPlus"];
	echo $_POST["minTime"];
	echo $_POST["maxTime"]; 
	echo $_POST["twoPlus"]; 
	echo $_POST["players"];
	
	echo "\n";
	
	$currentList1->rewind();
	
	while($currentList1->valid()) {
		//if($_POST['genre']==($currentList1->current())->getGenre()) {
			echo $currentList1->current()->getGenre();
		//}
		echo "<br>\n</br>";
		$currentList1->next();
	}

?>
</body>