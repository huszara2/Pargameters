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
	
	<?php echo $_POST["genre"]; ?><br>
	//<?php echo $_POST["type_Video"]; ?><br>
	//<?php echo $_POST["type_TT"]; ?><br>
	<?php echo $_POST["minAge"]; ?><br>
	<?php echo $_POST["maxAge"]; ?><br>
	//<?php echo $_POST["eighteenPlus"]; ?><br>
	<?php echo $_POST["minTime"]; ?><br>
	<?php echo $_POST["maxTime"]; ?><br>
	//<?php echo $_POST["twoPlus"]; ?><br>
	<?php echo $_POST["players"]; ?><br>
	
	echo "\n";
	
	$list->rewind();
	while($list->valid()) {
		echo $list->current();
		echo "<br>\n</br>";
		$list->next();
	}

?>
</body>