<body>

		
<?php

		
	echo 'Pargameters';
	$gameTest=new Game('Dominion',' ',10,100,30,50,'Deck building',2,5);
	echo $gameTest->getTitle();
	$gameTest->setType('tabletop');
	echo $gameTest->getType();
	
?>

		
</body>
