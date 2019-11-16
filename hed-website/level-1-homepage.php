<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>
	
	<?php
			/*
				this script will be the homepage for a reg user with 
				options to add, see and search for the pets. 
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-homepage-level');
		#saving error as textfile
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
		
		$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
			or die ('Sorry, cannot connect to MySQL');
		#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
		#else it will have the value of the text content, meaning that the connention was not made.
		
		echo "<h1> Welcome User </h1>";
		#print header
		
		echo "<table>
				<tr>
					<th>Add Pet</th>
					<th>Show Pet</th>
					<th>Search Pet</th>
					<th>Logout</th>
				</tr>";
		#print out table headers
		
		echo "<tr>
				<td> <a href='add.php'> Add </a> </td>
				<td> <a href='show.php'> Show </a> </td>
				<td> <a href='search.php'> Search </a> </td>
				<td> <a href='logout-script.php'> Logout </a> </td>
			</tr>";
		
		echo "<h1> Choose an option from the table. </h1>";
		
		//checking the session
			if ($_SESSION['level'] == 1) {
				
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