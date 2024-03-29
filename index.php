<!-- 
// Name: Alana Huszar
// Course: CSC 415
// Semester: Fall 2014
// Instructor: Dr. Pulimood 
// Project name: Pargameters
// Description: Returns playable games based on user given parameters
// Filename: index.php
// Description: Takes desired parameters from user, redirects them to results.php.
// Last modified on: December 4, 2014
-->
<body>

	<!-- 
	// Bootstrap and page title
	-->
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

		<title>Pargameters</title>
	</head>

	<!-- 
	// Form that redirects to results after enter/button press
	-->	
	<form action="results.php" method="post">
		<div>
			</br></br>
			<?php echo "<b><big>Pargameters</big></b></br>";
				echo "What would you like to play?";
			?>
		</div>
		<!-- 
		// Options for finding games
		-->	
		<div class="centered">
			<label for "genre"><b>Genre</b>:</label>
			<input type="text" name="genre"/>
			</br>
			<label for "type"></br><b>Type:</b></label>
			<input type="CHECKBOX" name="type_Video" checked>Video Game
			<input type="CHECKBOX" name="type_TT" checked>Tabletop
			</br>
			<label for "age"></br><b>Age Range</b>:</label>
			<input type="number" name="minAge" value="0" min="0" max="18"/> -
			<input type="number" name="maxAge" value="17" min="0" max="18" />
			<input type="CHECKBOX" name="eighteenPlus" checked>18+
			<?php echo "years";?>
			</br>
			<label for "time"></br><b>Time:</b></label>
			<input type="number" name="minTime" value="0" min="0" max="119"/> -
			<input type="number" name="maxTime" value="119" min="0" max="119"/>
			<input type="CHECKBOX" name="twoPlus" checked>120+
			<?php echo "minutes";?>
			</br>
			<label for "players"></br><b>Players:</b></label>
			<input type="number" name="players" value="" min="1"/>
			</br>
			</br>
			<input type="CHECKBOX" name="userCheck" checked>Include other users' collections
			</br>
		</div>
		<div>
			</br>
			<input type="submit" name="submit_button" value="Find a game!" />
		</div>
	</form>	
</body>
