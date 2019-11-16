<!DOCTYPE html>
<html>
<head>
	<title>Remove</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>	
	
	<?php
			/*
				this script will delete a recored from the hedgehogs database
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-remove');
		#saving error as textfile
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
		
			$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
				or die ('Sorry, cannot connect to MySQL');
			#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
			#else it will have the value of the text content, meaning that the connention was not made.
			
			$id = $_GET['hedgehog_id'];
			#var id has the value of hedgehog_id
			
			if(mysqli_query($conn, "DELETE FROM hedgehogs WHERE hedgehog_id='$id'")){
				echo "<table>
					<tr>
						<th>Notice</th>
					</tr>";
				#print out table headers
				
				echo"<tr>
						<td> Recored removed. <td>
						<td> <a href='show-super.php'> Return </a> </td>
					</tr>";
					#print out data
				
				echo "</table>";
			}
			else{
				echo 
				"<table>
					<tr>
						<th>Issue - recored not removed</th>
					</tr>";
				echo mysqli_error($conn);
				
				echo "<tr>
						<td><a href='show-super.php'> Return </a>/td>
					</tr>";
				
				echo "</table>";
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
						<td> <a href='login.html'> Home </a> </td>
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
						<td> '<a href='login.html'> Home </a>' </td>
					</tr>";
				
				echo "</table>";
	}
	?>
	
</body>
</html>