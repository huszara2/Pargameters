<body>
<?php include_once("game.php");?>
		
<?php

	echo 'Pargameters';	
	
	$gameTest = new Game('Dominion','tabletop',10,100,30,50,'Deck building',2,5);
	echo "\n";
	echo $gameTest;
	echo $gameTest->ageRange();
	echo "\n";
	echo $gameTest->__toString();


?>

		
</body>
