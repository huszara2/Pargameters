<body>
<?php include_once("game.php");?>
		
<?php

	echo 'Pargameters';	
	$toPrint;
	
	$gameTest = new Game('Dominion','U',10,100,30,50,'Deck building',2,5);
	echo " " . $gameTest->getTitle() . " ";
	$gameTest->setType('tabletop');
	echo $gameTest->getType() . " ";
	echo "\n";
	echo $gameTest;
	echo "\n";
	echo $gameTest->toString();


?>

		
</body>
