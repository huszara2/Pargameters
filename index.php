<body>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Pargameters</title>
</head>
<body>
<form action="results.php" method="post">
	<div>
		<?php echo <b>"Pargameters</b></br>";
			echo "What would you like to play?";
		?>
	</div>
	<div>
		<label for "genre"><b>Genre</b>:</label>
		<input type="text" name="genre"/>
		
		<label for "type"><b>Type:</b></label>
		<input type="CHECKBOX" name="type_Video" checked>Video Game
		<input type="CHECKBOX" name="type_TT" checked>Tabletop
		
		<label for "age"><b>Age Range</b>:</label>
		<input type="number" name="minAge" value="0" min="0" max="18"/> -
		<input type="number" name="maxAge" value="17" min="0" max="18" />
		<input type="CHECKBOX" name="eighteenPlus" checked>18+
		<?php echo "years";?>
		
		<label for "time"><b>Time:</b></label>
		<input type="number" name="minTime" value="0" min="0" max="119"/> -
		<input type="number" name="maxTime" value="119" min="0" max="119"/>
		<input type="CHECKBOX" name="twoPlus" checked>120+
		<?php echo "minutes";?>
		
		<label for "players"><b>Players:</b></label>
		<input type="number" name="players" value="" min="1"/>
	</div>

	
	
	<div>
		<input type="submit" name="submit_button" value="Find a game!" />
	</div>
		
</form>	
</body>
