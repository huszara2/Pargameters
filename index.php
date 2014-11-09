<body>

		
<?PHP

		
	print 'Pargameters';
	$gameTest=new Game("Dominion"," ",10,100,30,50,"Deck building",2,5);
	print $gameTest.getTitle();
	$gameTest.setType("tabletop");
	$gameTest.getType();
		
?>

		
</body>
