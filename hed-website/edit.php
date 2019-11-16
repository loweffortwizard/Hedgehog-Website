<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>
	
	<?php
			/*
				this script will display records from the hedgehogs  database
				in a table
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-edit');
		#saving error as textfile	
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
			
		$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
			or die ('Sorry, cannot connect to MySQL');
		#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
		#else it will have the value of the text content, meaning that the connention was not made.
		
		$query = mysqli_query($conn, 'SELECT * FROM hedgehogs ');
		# create var named query and asign it the value of the connect to database and all
		##data from the pets table in the database
		
		echo "<h1> Registered Hedgehogs  </h1>";
		#print header
		
		echo "<table>
				<tr>
					<th>Hedgehog ID</th>
					<th>Hedgehog Name</th>
					<th>Hedgehog Age</th>
					<th>Hedgehog Weight</th>
					<th>Hedgehog Height</th>
					<th>Hedgehog Species</th>
					<th>Hedgehog Group</th>
					<th>Edit</th>
					<th>Return</th>
				</tr>";
		#print out table headers
		
		while ($row = mysqli_fetch_array($query))
			#for every array data in the query variable - asign it to var row 
			#for every data print out this
		{
			echo "<tr>
					<td> ". $row['hedgehog_id'] ." </td>
					<td> ". $row['hedgehog_name'] ." </td>
					<td> ". $row['hedgehog_age'] ." </td>
					<td> ". $row['hedgehog_weight'] ." </td>
					<td> ". $row['hedgehog_height'] ." </td>
					<td> ". $row['hedgehog_species'] ." </td>
					<td> ". $row['hedgehog_group'] ." </td>
					<td> <a href='edit-script.php?hedgehog_id=".$row['hedgehog_id']." '> Edit </a> </td>
					<td> <a href='level-2-homepage.php'> Return </a> </td>
				</tr>";
				#last row will link to php script to delete the seclete recored
				#as well as display hedgehog_id in the link window
			#print out var row data
		}
		
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