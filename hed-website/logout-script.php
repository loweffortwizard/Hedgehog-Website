<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>
	
	<?php
			/*
				this script will logout the user and end the session
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-logout-script');
		#saving error as textfile
		
		session_start();
		
		$_SESSION = array(); //this will clear all variables stored in the session var_dump
		session_destroy(); //this will kill the session
		setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0); //this will kill the cookie
		/*
			When a session starts is creates a cookie named PHPSESSID that is used to store the ID for the current session, 
			if this cookie does not exist it is unable to access the session. 
			Line 17 is used to make sure that when a user logs out, t
			he cookie is destroyed, 
			this will mean if you log out an unauthorised user will not be able to access any restricted pages
		*/
		
				echo "<table>
					<tr>
						<th>Logged Out</th>
						<th>Login</th>
						<th>Return to Website</th>
					</tr>";
			#print out table headers
			
			
			echo "<tr>
					<td> You have now logged out of the website, come again soon. </td>
					<td> <a href='login.html'> Log Back In. </a> </td>
					<td> <a href='index.html'> Return. </a> </td>
				</tr>";
			#print out login link
				
			echo "</table>";
	?>
	
</body>
</html>