<body>
<head>
<title>Pargameters</title>
</head>
<body>
<form action="results.php" method="post">
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
		<input type="text" name="maxAge" value="Maximum Age" />
		<input type="CHECKBOX" name="eighteenPlus" checked>18+
	</div>

	<div>
		<input type="submit" name="submit_button" value="Find a game!" />
	</div>
		
</form>	
</body>
