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
		<input type="number" name="minAge" value="0" min="0" max="18"/> -
		<input type="number" name="maxAge" value="17" min="0" max="18" />
		<input type="CHECKBOX" name="eighteenPlus" checked>18+
		<?php echo "years";?>
	</div>
	<div>
		<label for "time">Time:</label>
		<input type="number" name="minTime" value="0" min="0" max="120"/> -
		<input type="text" name="maxTime" value="119" min="0" max="120"/>
		<input type="CHECKBOX" name="twoPlus" checked>120+
		<?php echo "minutes";?>
	</div>
	<div>
		<label for "players">Players:</label>
		<input type="number" name="players" value="" min="0"/>
	</div>

	
	
	<div>
		<input type="submit" name="submit_button" value="Find a game!" />
	</div>
		
</form>	
</body>
