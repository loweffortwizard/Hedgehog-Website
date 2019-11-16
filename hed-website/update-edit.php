<!DOCTYPE html>
<html>

<head>

	<title>Edit</title>
	<link type="text/css" href="css/forms.css" rel="stylesheet" />
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>
		
	<?php
	
	/*
		this script will update the recored from the edit-pet-script to the database recored of the pets table
	*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-update');
		#saving error as textfile
	
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
				
			$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
						or die ('Sorry, cannot connect to MySQL');
			#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
			#else it will have the value of the text content, meaning that the connention was not made.
			
			$hedgehog_id = strip_tags($_POST['id']);
			#var hedgehog_id has the value of id from the post method
			
			$hedgehog_name = strip_tags($_POST['name']);
			#var hedgehog_name has the value of name from the post method
			$hedgehog_age = strip_tags($_POST['age']);
			#var hedgehog_age has the value of age from the post method
			$hedgehog_weight = strip_tags($_POST['weight']);
			#var hedgehog_weight has the value of type from the post method
			$hedgehog_height = strip_tags($_POST['height']);
			#var hedgehog_height has the value of type from the post method
			$hedgehog_species = strip_tags($_POST['species']);
			#var hedgehog_species has the value of type from the post method
			$hedgehog_group = strip_tags($_POST['group']);
			#var hedgehog_group has the value of group from the post method
			
			$query = "UPDATE hedgehogs
						SET hedgehog_id='$hedgehog_id', 
						hedgehog_name='$hedgehog_name', 
						hedgehog_age='$hedgehog_age', 
						hedgehog_weight='$hedgehog_weight',
						hedgehog_height='$hedgehog_height', 				
						hedgehog_species='$hedgehog_species', 				
						hedgehog_group='$hedgehog_group' 				
						WHERE hedgehog_id='$hedgehog_id' ";
			#updating hedgehogs with contect from the html names
			
			mysqli_query($conn, $query);
			#send values of conn and query
			
			echo "<table>
						<tr>
							<th>Notice</th>
							
						</tr>";
					#print out table headers
					
			echo"<tr>
					<td> Recored updated.
						<br>
						<a href='edit.php'> Return </a> 
					<td>

				</tr>";
						#print out data
					
			echo "</table>";
			
			echo mysqli_error($conn);
			#test if error
				
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
					<td> '<a href='login.html'> Login </a>' </td>
				</tr>";
					
			echo "</table>";
		}
	?>

	
		
</body>
</html>