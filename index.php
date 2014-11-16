<body>
<head>
<title>Pargameters</title>
</head>
<body>
<form action="results.php" method="post">
<input type="text" name="genre" value="Genre" />

<input type="CHECKBOX" name="type_Video" checked>Video Game
<input type="CHECKBOX" name="type_TT" checked>Tabletop
<input type="text" name="minAge" value="Minimum Age" />
<input type="text" name="maxAge" value="Maximum Age" />
<input type="CHECKBOX" name="eighteenPlus" checked>18+

<input type="submit" name="submit_button" value="Find a game!" />

</form>


<?php include_once("game.php");?>
		
<?php
	
	$gameTest1 = new Game('Dominion','Tabletop',10,100,30,50,'Deck building',2,5);
	$gameTest2 = new Game('Superfight','Tabletop',6,100,20,40,'Storytelling',3,10);
	$gameTest3 = new Game('MarioKart 8','Video',5,100,3,60,'Racing',1,8);
	
	$list=new SplDoublyLinkedList();
	$list->push($gameTest1);
	$list->push($gameTest2);
	$list->push($gameTest3);
	
	
	echo "\n";
	
	$list->rewind();
	while($list->valid()) {
		echo $list->current() . "\n";
		$list->next();
	}

?>

		
</body>
