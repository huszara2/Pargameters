<body>
<?php include_once("game.php");?>
		
<?php

	echo 'Pargameters';	
	$gameTest = new Game('Dominion','tabletop',10,100,30,50,'Deck building',2,5);
	echo " " . $gameTest->ageRange() . " ";
	echo $gameTest->timeRange() . " ";
	echo "\n";
	echo $gameTest;
	echo "\n";
	echo $gameTest->toString();


?>

		
</body>
