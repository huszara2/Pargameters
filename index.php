<body>
<head>
<title>Pargameters</title>
</head>
<body>
<form action="results.php" method="post">
	<div>
		<?php echo "Pargameters";
			echo "What would you like to play?";
		?>
	</div>
	<div>
		<label for "genre">Genre:</label>
		<input type="text" name="genre"/>
	</div>
	<div>
		<label for "type">Type:</label>
		<input type="CHECKBOX" name="type_Video" checked>Video Game
		<input type="CHECKBOX" name="type_TT" checked>Tabletop
	</div>
	<div>
		<label for "age">Age Range:</label>
		<input type="text" name="minAge" value="0" /> -
		<input type="text" name="maxAge" value="" />
		<input type="CHECKBOX" name="eighteenPlus" checked>18+
		<?php echo "years";?>
	</div>
	<div>
		<label for "time">Time:</label>
		<input type="text" name="minTime" value="0" /> -
		<input type="text" name="maxTime" value="" />
		<input type="CHECKBOX" name="twoPlus" checked>120+
		<?php echo "minutes";?>
	</div>
	<div>
		<label for "players">Players:</label>
		<input type="text" name="players" value=""/>
	</div>

	
	
	<div>
		<input type="submit" name="submit_button" value="Find a game!" />
	</div>
		
</form>	
</body>
