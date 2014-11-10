<body>
<?php include_once("game.php");?>
		
<?php

	echo 'Pargameters';	
	$toPrint;
	
	$gameTest = new Game('Dominion','U',10,100,30,50,'Deck building',2,5);
	echo $gameTest->getTitle();
	$gameTest->setType('tabletop');
	$toPrint=$gameTest->getType();
	echo $toPrint;

?>

		
</body>
