<!DOCTYPE html>
<html>

<head>

	<title>New User</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />

</head>
<body>
		
	<?php
		
		/*
			this script will allow the user to create a new user and save the content from the form to the admin table
		*/
		
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-new-user-script');
		#saving error as textfile
			
		$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
					or die ('Sorry, cannot connect to MySQL');
		#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
		#else it will have the value of the text content, meaning that the connention was not made.
		
		$username = strip_tags($_POST['username']);
		#var username has the value of username from the post method
		$password = strip_tags($_POST['password']);
		#var password has the value of password from the post method
		$lvlAccess = 1;
		#var lvlAccess has the value of 1 = low level access
		
		$query = "INSERT INTO admin (user_id, username, password, level_access)
					VALUES(0, '$username', '$password', '$lvlAccess')";
						
		if( mysqli_query($conn, $query) ) {
		#if :
			echo "<table>
					<tr>
						<th>Notice</th>
					</tr>";
				#print out table headers
				
			echo"<tr>
					<td> ' <strong> You have successfully been added to the database, thank you for joining us. Please click the 'return' to login. </strong> ' <td>
					<td> <a href='login.html'> Return </a> </td>
				</tr>";
						#print out data
					
			echo "</table>";
			
		} 
		
		else {
		#if not then do this instead:	
			echo "<table>
					<tr>
						<th>Notice</th>
					</tr>";
				#print out table headers
				
			echo"<tr>
					<td> ' <strong> Sorry, there was an error in adding the record, please try again. </strong> ' <td>
					<td> <a href='login.html'> Return </a> </td>
				</tr>";
						#print out data
					
			echo "</table>";
		}
	?>
	
		
</body>
</html>