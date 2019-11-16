<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link type="text/css" href="css/forms.css" rel="stylesheet" />
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>	
<div>
	<form action="search-result.php" method="post">
	<!-- link to php and creation of form -->
		<!-- options -->
		<p> Enter Name: <input type="text" name="name" required/> </p>

		<p> <input type="submit" value="Find Hedgehog(s)" /> </p>
		<!-- submission button -->
	</form>
	
	<!-- return to home -->
	<form>
		<input id="btnReturn" type="button" value="Return" 
       onclick="return btnReturn_onclick()" />

		<script language="javascript" type="text/javascript">
			function btnReturn_onclick() 
			{
				window.location.href = "level-1-homepage.php";
			}
		</script>
		<!-- submission button -->
	</form>
	
	<?php
			/*
				this script will create error textfiles and check the session. 
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-search');
		#saving error as textfile
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
			
			
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
</div>
</body>
</html>