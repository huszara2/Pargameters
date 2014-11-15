<body>
<?php include_once("game.php");
	  include_once("collection.php")?>
		
<?php

	echo 'Pargameters';	
	
	$gameTest1 = new Game('Dominion','tabletop',10,100,30,50,'Deck building',2,5);
	$gameTest2 = new Game('Superfight','tabletop',6,100,20,40,'Storytelling',3,10);
	$gameTest3 = new Game('MarioKart 8','video',5,100,3,60,'Racing',1,8);
	
	$list=new SplDoublyLinkedList();
	$list->push($gameTest1);
	$list->push($gameTest2);
	$list->push($gameTest3);
	
	$myCollection = new Collection($list);
	
	echo "\n";
	echo $gameTest2;
	echo $gameTest2->timeRange();
	echo $myCollection;
	

?>

		
</body>
