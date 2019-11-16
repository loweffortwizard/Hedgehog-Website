<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>
	
	<?php
			/*
				this script will be a homepage for the user with level two access.
				they will beable to add, edit, remove, show and look up hedgehogs as well as user stats. 
			*/
		
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-homepage-level-2');
		#saving error as textfile
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
		
		$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
			or die ('Sorry, cannot connect to MySQL');
		#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
		#else it will have the value of the text content, meaning that the connention was not made.
		
		echo "<h1> Welcome Admin </h1>";
		#print header
		
		/*
			The header( “Location: “) function will redirect a user to a different web page/URL
		*/
		
		echo "<table>
				<tr>
					<th>Add Pet</th>
					<th>Edit Pet</th>
					<th>Show Pet</th>
					<th>Search Pet</th>
					<th>Display Stats</th>
					<th>Display Stats</th>
					<th>Logout</th>
				</tr>";
		#print out table headers
		
		echo "<tr>
				<td> <a href='add-level-2.php'> Add </a> </td>
				<td> <a href='edit.php'> Edit </a> </td>
				<td> <a href='show-super.php'> Show </a> </td>
				<td> <a href='search-level-2.php'> Search </a> </td>
				<td> <a href='display_stats.php'> Browser Stats </a> </td>
				<td> <a href='display_stats_resolution.php'> Resolution Stats </a> </td>
				<td> <a href='logout-script.php'> Logout </a> </td>
			</tr>";
		
		echo "<h1> Choose an option from the table. </h1>";
		
		//checking the session
			if ($_SESSION['level'] == 1) {
			//if the active user has level one access, do this
				echo "<table>
					<tr>
						<th>Home</th>
					</tr>";
				
				echo "<tr>
						<td> <a href='Level-1-homepage.php'> Home </a> </td>
					</tr>";
				
				echo "</table>";
			}
			
			else if ($_SESSION['level'] == 2) {
			//if the active user has level to access, do this
				echo "<table>
					<tr>
						<th>Home</th>
					</tr>";
				
				echo "<tr>
						<td> <a href='Level-2-homepage.php'> Home </a> </td>
					</tr>";
				
				echo "</table>";
			}
			
			else {
			//if there is no active user force login
				echo "<table>
					<tr>
						<th>Notice - Must Login</th>
					</tr>";
				
				echo "<tr>
						<td> <a href='login.html'> Login </a> </td>
					</tr>";
				
				echo "</table>";
			}
		
		}//session
		else {
		//if there is no active user force login
			echo "<table>
				<tr>
					<th>Notice - Must Login</th>
				</tr>";
					
			echo "<tr>
					<td> <a href='login.html'> Login </a> </td>
				</tr>";
					
			echo "</table>";
		}
	?>
	
</body>
</html>