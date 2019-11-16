<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>
	
	<?php
			/*
				this script will create a session for logged in users, login user based
				on their level of access and whether the username and password entered
				matches that in the database table - admin. 
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-login-script');
		#saving error as textfile
		
		$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
			or die ('Sorry, cannot connect to MySQL');
		#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
		#else it will have the value of the text content, meaning that the connention was not made.
		
		//login variables - with post method
		$theUsername = $_POST['username'];
		$thePassword = $_POST['password'];
		
		//removes special characters such as '' and "" to remove mysql injection
		$theUsername = mysqli_real_escape_string($conn, $theUsername);
		$thePassword = mysqli_real_escape_string($conn, $thePassword);
		
		//level 1 is reg user
		$level1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin
													WHERE username='$theUsername'
													AND password='$thePassword'
													AND level_access=1"));
		# level1 has the value of the number of rows collected from the mysqi query
		# then selects from admin table where the password and username match what is in the admin table
		
		//level 2 is super user
		$level2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin
													WHERE username='$theUsername'
													AND password='$thePassword'
													AND level_access=2"));
		# level2 has the value of the number of rows collected from the mysqi query
		# then selects from admin table where the password and username match what is in the admin table
		
		/*
			creating sessions for login
		*/
		
		#cheacking user level access to show hyperlinks
		if ($level2 > 0){
			#if level2 has the value greater than 0 - do this - login true
			session_start();
			$_SESSION['user'] = $theUsername;
			$_SESSION['level'] = 2;
			header("Location: Level-2-homepage.php");
			
		}
		
		else if ($level1 > 0){
			#if level1 has the value greater than 0 - do this - login true
			session_start();
			$_SESSION['user'] = $theUsername;
			$_SESSION['level'] = 1;
			header("Location: Level-1-homepage.php");
		}
		
		/* Notes on if statements above:
			The first statement is session_start() which creates a new session and stores it on the server. We then add two pieces of data to the session:
			 $_SESSION[‘user’] is used to store the username of the logged in user.
			 $_SESSION[‘level’] is used to store the access level of the logged in user.
			$_SESSION is an array that is stored on the web server only.
		*/
		
		else{
			#else login failed - do this
				echo "<table>
					<tr>
						<th>Login Failed</th>
					</tr>";
			#print out table headers
			
			
				echo "<tr>
						<td> <a href='login.html'> Retry </a> </td>
					</tr>";
				#print out var row data
				
			echo "</table>";
		}
		
	?>
	
</body>
</html>