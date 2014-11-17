<body>
<head>
<title>Pargameters</title>
</head>
<body>
<form action="results.php" method="post">
	<div>
		<?php echo "Pargameters";
			echo "<br>/n</br>";
			echo "What would you like to play?";
		?>
	</div>
	<div>
		<label for "genre">Genre:</label>
		<input type="text" id="genre"/>
	</div>
	<div>
		<label for "type">Type:</label>
		<input type="CHECKBOX" name="type_Video" checked>Video Game
		<input type="CHECKBOX" name="type_TT" checked>Tabletop
	</div>
	<div>
		<label for "age">Age Range:</label>
		<input type="text" name="minAge" value="Minimum Age" />
		<input type="text" name="maxAge" value="Maximum Age" />-
		<input type="CHECKBOX" name="eighteenPlus" checked>18+
		<?php echo "years";?>
	</div>
	<div>
		<label for "time">Time:</label>
		<input type="text" name="minTime" value="Minimum Time" />
		<input type="text" name="maxTime" value="Maximum Time" />-
		<input type="CHECKBOX" name="twoPlus" checked>120+
		<?php echo "minutes";?>
	</div>

	
	
	<div>
		<input type="submit" name="submit_button" value="Find a game!" />
	</div>
		
</form>	
</body>
