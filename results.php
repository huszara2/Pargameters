<!-- 
// Name: Alana Huszar
// Course: CSC 415
// Semester: Fall 2014
// Instructor: Dr. Pulimood 
// Project name: Pargameters
// Description: Returns playable games based on user given parameters
// Filename: results.php
// Description: Finds playable games based on parameters, and shows playable results in a table.
// Last modified on: December 4, 2014
-->
<body>
	<?php include_once("game.php");?>
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
	<div>
		<?php
			echo "</br></br><b><big>Pargameters</big></b></br>";
			echo "What would you like to play?</br>";
		?>
	</div>

	<div class="centered">	
		</br>
		</br>
		<?php
			
			/* Booleans/Strings used for checking if we want to search by each parameter
			*/
			$genreCheck=false;
			$typeCheck="false";
			$minAgeC=NULL;
			$maxAgeC=NULL;
			$minTimeC=NULL;
			$maxTimeC=NULL;
			$playerCheck=0;
			
			//error message for ensuring legitimate inputs/outputs
			$errorMessage="";
			
			//linked list of games for user1 (dummy current user) and user2 (dummy other users)
			$list=new SplDoublyLinkedList();
			$list2=new SplDoublyLinkedList();
			
			//starting with the first row, put elements from csv file into game objects to make up user's collection
			$row = 1;
			if (($handle = fopen("user1.csv", "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($data);
					$row++;
					$list->push(new Game($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8]));
				}
				fclose($handle);
			}	
			
			//starting with the first row, put elements from csv file into game objects to make up other users' collection
			$row = 1;
			if (($handle = fopen("user2.csv", "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($data);
					$row++;
					$list2->push(new Game($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8]));
				}
				fclose($handle);
			}	
			
			$currentList1=$list;
			$currentList2=$list2;

			/*
			//-----------------------------------------------------------------------------------------
			//    Set a boolean check for genre to true if the genre field has been filled out	//-----------------------------------------------------------------------------------------
			*/	
			if($_POST["genre"]!="") {
				$genreCheck=true;
			}	
			
			/*
			//-----------------------------------------------------------------------------------------
			//    If one of the two game types are unchecked, search on the remaining type, if neither is checked, 
			//	  search neither
			//-----------------------------------------------------------------------------------------
			*/	
			if($_POST["type_Video"]!="on" || $_POST["type_TT"]!="on") {
				if($_POST["type_Video"]=="on") {
					$typeCheck="Video";
				}
				else if($_POST["type_TT"]=="on") {
					$typeCheck="Tabletop";
				}
				else {
					$typeCheck="none";
				}
			}
			
			/*
			//-----------------------------------------------------------------------------------------
			//   Add to the error message if the user requests an age range a-b, where a>b  
			//-----------------------------------------------------------------------------------------
			*/	
			if($_POST["minAge"]>$_POST["maxAge"]) {
				$errorMessage= $errorMessage . "The age range you indicated should be in numerical order. <br/>";
			}
			
			/*
			//-----------------------------------------------------------------------------------------
			//   If the user wants a minimum age other than 0, set the minimum age to 0 
			//-----------------------------------------------------------------------------------------
			*/
			if($_POST["minAge"]!=0) {
				$minAgeC=$_POST["minAge"];
			}
			
			/*
			//-----------------------------------------------------------------------------------------
			//   Set the maximum age to filter by. If an age is selected (and 18+ is unchecked), set the maxage to the selected age.
			//	 If 18+ is on, but the second part of the range is not 17, let the user know there is a gap in their range.
			// 	 If only 18+ is checked, make 18 the minimum age, and have no maximum age set.
			//-----------------------------------------------------------------------------------------
			*/
			if($_POST["maxAge"]<=17 && $_POST["eighteenPlus"]!="on" && $_POST["maxAge"]!=NULL) { //if we set a maxAge less than 17, and eighteen plus isn't on
				$maxAgeC=$_POST["maxAge"];
			}
			else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]!=17 && $_POST["maxAge"]!=NULL) { //in this case, we leave maxAgeC NULL because we do not care to sort by maxAge
				$errorMessage= $errorMessage . "The range of ages you selected has a gap. Try unchecking 18+ <br/>";
			}
			else if($_POST["eighteenPlus"]=="on" && $_POST["maxAge"]==NULL && $_POST["minAge"]==NULL) { //if everything but 18+ is blank, we only want to search 18+
				$minAgeC=18;
			}
			
			/*
			//-----------------------------------------------------------------------------------------
			//   Add to the error message if the user requests an time range a-b, where a>b  
			//-----------------------------------------------------------------------------------------
			*/
			if($_POST["minTime"]>$_POST["maxTime"]) {
				$errorMessage= $errorMessage . "The time range you indicated should be in numerical order. <br/>";
			}
			
			/*
			//-----------------------------------------------------------------------------------------
			//   If the user wants a minimum time other than 0, set the minimum time to what was indicated.  
			//-----------------------------------------------------------------------------------------
			*/
			if($_POST["minTime"]!=0) {
				$minTimeC=$_POST["minTime"];
			}

			/*
			//-----------------------------------------------------------------------------------------
			//   Set the maximum time to filter by. If a time is selected (and 120+ is unchecked)
			//   set the maxtime to the selected time.
			//	 If 120+ is on, but the second part of the range is not 119, let the user know there is a gap in their range.
			// 	 If only 120+ is checked, make 120 the minimum time, and have no maximum time set.
			//-----------------------------------------------------------------------------------------
			*/
			if($_POST["maxTime"]<=119 && $_POST["twoPlus"]!="on" && $_POST["maxTime"]!=NULL) { //if we set a maxTime less than 120, and 120 plus isn't on
				$maxTimeC=$_POST["maxTime"];
			}
			else if($_POST["twoPlus"]=="on" && $_POST["maxTime"]!=119 && $_POST["maxTime"]!=NULL) { //in this case, we leave maxTimeC NULL because we do not care to sort by maxTime
				$errorMessage= $errorMessage . "The range of time you selected has a gap. Try unchecking 120+ <br/>";
			}
			else if($_POST["twoPlus"]=="on" && $_POST["maxTime"]==NULL && $_POST["minTime"]==NULL) { //if everything but 120+ is blank, we only want to search 120+
				$minTimeC=120;
			}
			
			/*
			//-----------------------------------------------------------------------------------------
			//   If the user indicates the number of players, set player check to that number.  
			//-----------------------------------------------------------------------------------------
			*/			
			if($_POST["players"]!=NULL) {
				$playerCheck=$_POST["players"];
			}
			
			/*
			//-----------------------------------------------------------------------------------------
			//   If the error message is empty, proceed with filter. If not, print the error message.
			//-----------------------------------------------------------------------------------------
			*/
			if($errorMessage=="") {
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by genre, go through the user list, pushing all valid
				//   elements to a new list. After everything in the userlist has been checked, change 
				//   the currentlist to the filtered list.
				//-----------------------------------------------------------------------------------------
				*/
				if($genreCheck==true) {
					$tempList=new SplDoublyLinkedList();
					$currentList1->rewind();
					while($currentList1->valid()) {
						if(strcasecmp($_POST["genre"],$currentList1->current()->getGenre())==0) {
							$tempList->push($currentList1->current());
						}
						$currentList1->next();
					}
					$currentList1=$tempList;
				}
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by type, go through the user list, pushing all valid
				//   elements to a new list. After everything in the userlist has been checked, change 
				//   the currentlist to the filtered list.
				//-----------------------------------------------------------------------------------------
				*/
				if($typeCheck!="false") {
					$tempList=new SplDoublyLinkedList();
					$currentList1->rewind();
					while($currentList1->valid()) {
						if($typeCheck==$currentList1->current()->getType()) {
							$tempList->push($currentList1->current());
						}
						$currentList1->next();
					}
					$currentList1=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by minimum age, go through the user list, pushing all valid
				//   elements to a new list. After everything in the userlist has been checked, change 
				//   the currentlist to the filtered list.
				//-----------------------------------------------------------------------------------------
				*/
				if($minAgeC!=NULL && $minAgeC!=0) {
					$tempList=new SplDoublyLinkedList();
					$currentList1->rewind();
					while($currentList1->valid()) {
						if($minAgeC<=$currentList1->current()->getMaxAge()) {
							$tempList->push($currentList1->current());
						}
						$currentList1->next();
					}
					$currentList1=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by maximum age, go through the user list, pushing all valid
				//   elements to a new list. After everything in the userlist has been checked, change 
				//   the currentlist to the filtered list.
				//-----------------------------------------------------------------------------------------
				*/
				if($maxAgeC!=NULL) {
					$tempList=new SplDoublyLinkedList();
					$currentList1->rewind();
					while($currentList1->valid()) {
						if($maxAgeC>=$currentList1->current()->getMinAge()) {
							$tempList->push($currentList1->current());
						}
						$currentList1->next();
					}
					$currentList1=$tempList;
				}
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by minimum time, go through the user list, pushing all valid
				//   elements to a new list. After everything in the userlist has been checked, change 
				//   the currentlist to the filtered list.
				//-----------------------------------------------------------------------------------------
				*/
				if($minTimeC!=NULL && $minTimeC!=0) { 
					$tempList=new SplDoublyLinkedList();
					$currentList1->rewind();
					while($currentList1->valid()) {
						if($minTimeC<=$currentList1->current()->getMaxTime()) {
							$tempList->push($currentList1->current());
						}
						$currentList1->next();
					}
					$currentList1=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by maximum age, go through the user list, pushing all valid
				//   elements to a new list. After everything in the userlist has been checked, change 
				//   the currentlist to the filtered list.
				// 	 Valid elements are games with a minimum time that is longer than the indicated maximum
				//	 wanted time.
				//-----------------------------------------------------------------------------------------
				*/
				if($maxTimeC!=NULL) { 
					$tempList=new SplDoublyLinkedList();
					$currentList1->rewind();
					while($currentList1->valid()) {
						if($maxTimeC>=$currentList1->current()->getMinTime()) {
							$tempList->push($currentList1->current());
						}
						$currentList1->next();
					}
					$currentList1=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by the number of players, go through the user list, pushing
				//   all valid elements to a new list. After everything in the userlist has been checked,
				//   set the currentlist to the filtered list.
				//   Valid elements are games with a minimum number of players <= players desired <= maximum players
				//-----------------------------------------------------------------------------------------
				*/
				if($playerCheck!=0) {
					$tempList=new SplDoublyLinkedList();
					$currentList1->rewind();
					while($currentList1->valid()) {
						if($playerCheck>=$currentList1->current()->getMinPlayers() && $playerCheck<=$currentList1->current()->getMaxPlayers()) {
							$tempList->push($currentList1->current());
						}
						$currentList1->next();
					}
					$currentList1=$tempList;
				}
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by genre, and the user wants to see other collections,
				//	 filter the other collections.
				//-----------------------------------------------------------------------------------------
				*/
				if($genreCheck==true && $_POST["userCheck"]=="on") {
					$tempList=new SplDoublyLinkedList();
					$currentList2->rewind();
					while($currentList2->valid()) {
						if(strcasecmp($_POST["genre"],$currentList2->current()->getGenre())==0) {
							$tempList->push($currentList2->current());
						}
						$currentList2->next();
					}
					$currentList2=$tempList;
				}
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by type, and the user wants to see other collections,
				//	 filter the other collections.
				//-----------------------------------------------------------------------------------------
				*/
				if($typeCheck!="false" && $_POST["userCheck"]=="on") {
					$tempList=new SplDoublyLinkedList();
					$currentList2->rewind();
					while($currentList2->valid()) {
						if($typeCheck==$currentList2->current()->getType()) {
							$tempList->push($currentList2->current());
						}
						$currentList2->next();
					}
					$currentList2=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by genre, and the user wants to see other collections,
				//	 filter the other collections by selected genre.
				//-----------------------------------------------------------------------------------------
				*/
				if($minAgeC!=NULL && $minAgeC!=0 && $_POST["userCheck"]=="on") {
					$tempList=new SplDoublyLinkedList();
					$currentList2->rewind();
					while($currentList2->valid()) {
						if($minAgeC<=$currentList2->current()->getMaxAge()) {
							$tempList->push($currentList2->current());
						}
						$currentList2->next();
					}
					$currentList2=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by maximum age, and the user wants to see other collections,
				//	 filter the other collections accordingly.
				//-----------------------------------------------------------------------------------------
				*/
				if($maxAgeC!=NULL && $_POST["userCheck"]=="on") {
					$tempList=new SplDoublyLinkedList();
					$currentList2->rewind();
					while($currentList2->valid()) {
						if($maxAgeC>=$currentList2->current()->getMinAge()) {
							$tempList->push($currentList2->current());
						}
						$currentList2->next();
					}
					$currentList2=$tempList;
				}
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by minimum time, and the user wants to see other collections,
				//	 filter the other collections accordingly.
				//-----------------------------------------------------------------------------------------
				*/
				if($minTimeC!=NULL && $minTimeC!=0 && $_POST["userCheck"]=="on") { 
					$tempList=new SplDoublyLinkedList();
					$currentList2->rewind();
					while($currentList2->valid()) {
						if($minTimeC<=$currentList2->current()->getMaxTime()) {
							$tempList->push($currentList2->current());
						}
						$currentList2->next();
					}
					$currentList2=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by genre, and the user wants to see other collections,
				//	 filter the other collections accordingly.
				//-----------------------------------------------------------------------------------------
				*/
				if($maxTimeC!=NULL && $_POST["userCheck"]=="on") { 
					$tempList=new SplDoublyLinkedList();
					$currentList2->rewind();
					while($currentList2->valid()) {
						if($maxTimeC>=$currentList2->current()->getMinTime()) {
							$tempList->push($currentList2->current());
						}
						$currentList2->next();
					}
					$currentList2=$tempList;
				}	
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to filter by player number, and the user wants to see other collections,
				//	 filter the other collections accordingly.
				//-----------------------------------------------------------------------------------------
				*/
				if($playerCheck!=0 && $_POST["userCheck"]=="on") {
					$tempList=new SplDoublyLinkedList();
					$currentList2->rewind();
					while($currentList2->valid()) {
						if($playerCheck>=$currentList2->current()->getMinPlayers() && $playerCheck<=$currentList2->current()->getMaxPlayers()) {
							$tempList->push($currentList2->current());
						}
						$currentList2->next();
					}
					$currentList2=$tempList;
				}
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wants to see other users' collections, remove all elements of other users collections
				// 	 that are also part of the user collection.
				//-----------------------------------------------------------------------------------------
				*/
				if($_POST["userCheck"]=="on") {
					$currentList1->rewind();
					while($currentList1->valid()) {
						$tempList=new SplDoublyLinkedList();
						$currentList2->rewind();
						
						while($currentList2->valid()) {
							if(strcasecmp($currentList2->current()->getTitle(),$currentList1->current()->getTitle())!=0) {
								$tempList->push($currentList2->current());
							}
							$currentList2->next();
						}
						
						$currentList2=$tempList;
						$currentList1->next();
						
					}
					$currentList2=$tempList;
				}

				
				/*
				//-----------------------------------------------------------------------------------------
				//   If after all filters are applied, no games are in the list, inform the user to refine
				//   their search. Otherwise, give the user a table of valid results.
				//-----------------------------------------------------------------------------------------
				*/
				echo "<b>In your collection:</b> </br>";
				if($currentList1->count()==0) {
					echo "No games found. Try refining your search.</br>";
				}
				else {
					echo "<table id=\"t01\"><tr><th> Title</th><th>Type</th><th>Age</th><th>Time</th><th>Genre</th><th>Players</th></tr>";
					$currentList1->rewind();
					while($currentList1->valid()) {
						echo "<tr><td>" . $currentList1->current()->getTitle() . "</td>";
						echo "<td>" . $currentList1->current()->getType() . "</td>";
						echo "<td>" . $currentList1->current()->ageRange() . "</td>";
						echo "<td>" . $currentList1->current()->timeRange() . "</td>";
						echo "<td>" . $currentList1->current()->getGenre() . "</td>";
						echo "<td>" . $currentList1->current()->playerRange() . "</td>";
						echo "</tr>";
						$currentList1->next();
					}
					echo "</table>";
				}
				
				/*
				//-----------------------------------------------------------------------------------------
				//   If the user wanted to see other collections, also show them in a table if there
				//   were any valid games. If there were none, tell the user that none were found in other
				//   collections.
				//-----------------------------------------------------------------------------------------
				*/
				if($_POST["userCheck"]=="on") {
					echo "</br><b>In others' collections:</b> </br>";
					if($currentList2->count()==0) {
						echo "No games found.";
					}
					else {
						echo "<table id=\"t01\"><tr><th>Title</th><th>Type</th><th>Age</th><th>Time</th><th>Genre</th><th>Players</th></tr>";
						$currentList2->rewind();
						while($currentList2->valid()) {
							echo "<tr><td>" . $currentList2->current()->getTitle() . "</td>";
							echo "<td>" . $currentList2->current()->getType() . "</td>";
							echo "<td>" . $currentList2->current()->ageRange() . "</td>";
							echo "<td>" . $currentList2->current()->timeRange() . "</td>";
							echo "<td>" . $currentList2->current()->getGenre() . "</td>";
							echo "<td>" . $currentList2->current()->playerRange() . "</td>";
							echo "</tr>";
							$currentList2->next();
						}
						echo "</table>";
					}
				}
			}
			else{
				echo $errorMessage;
			}
			
		?>
	</div>

    <!-- Back button to go back to index.php-->
	<form>
		<input type="button" value="Back" onClick="history.back()">
	</form>
</body>