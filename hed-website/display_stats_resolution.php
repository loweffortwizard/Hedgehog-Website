<!DOCTYPE html>
<html>
<head>
	<title>User Statistics</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<style>
body{
	background-color: #E496FF;
	color: fff;
	max-width: 450px;
	height: 630px;
    padding: 30px;
    margin: 50px auto;
    box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
    border-radius: 10px;
    border: 6px solid #000;
}
p{
	border: 1px solid #000;
}
</style>
<body>
	<h3> Stats on resolution: </h3>
	<hr />
	<?php
	
			# 	a PHP script that interrorgates a MySQL database that stores various 
			#	statistics about users that access a web page.
		
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-display-stats-resolution');
		#saving error as textfile
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
		
			$conn= mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
				or die ("Sorry -  could not connect to MySQL");
			//checking connenction to mysql database

			// Use a select query to find the number of 1440x900 matches
			$res_1440x900 = mysqli_num_rows(mysqli_query($conn,"SELECT screen_res FROM stats WHERE screen_res='1440x900'"));
			#var rows has the value of all the data in the database table known as screen_res where the resolution is = to 1440x900
			echo "Screen resolution: 1440x900 has a total of ", "<br />" . $res_1440x900 . " records in the table." . "<hr />";
			//print out the total amount screen resolution data in the database, based on var $rows
			
			// Use a select query to find the number of 1280x1024 matches
			$res_1280x1024 = mysqli_num_rows(mysqli_query($conn,"SELECT screen_res FROM stats WHERE screen_res='1280x1024'"));
			#var rows has the value of all the data in the database table known as screen_res where the resolution is = to 1280x1024
			echo "Screen resolution: 1280x1024 has a total of ", "<br />" . $res_1280x1024 . " records in the table." . "<hr />";
			//print out the total amount screen resolution data in the database, based on var $rows
			
			// Use a select query to find the number of 800x600 matches
			$res_800x600 = mysqli_num_rows(mysqli_query($conn,"SELECT screen_res FROM stats WHERE screen_res='800x600'"));
			#var rows has the value of all the data in the database table known as screen_res where the resolution is = to 800x600
			echo "Screen resolution: 800x600 has a total of ", "<br />" . $res_800x600 . " records in the table." . "<hr />";
			//print out the total amount screen resolution data in the database, based on var $rows
			
			// Use a select query to find the number of 1366x768 matches
			$res_1366x768 = mysqli_num_rows(mysqli_query($conn,"SELECT screen_res FROM stats WHERE screen_res='1366x768'"));
			#var rows has the value of all the data in the database table known as screen_res where the resolution is = to 1366x768
			echo "Screen resolution: 1366x768 has a total of ", "<br />" . $res_1366x768 . " records in the table." . "<hr />";
			//print out the total amount screen resolution data in the database, based on var $rows
		
		//checking the session
			if ($_SESSION['level'] == 1) {
			//if the active user has level one access, do this
				echo "<p> <a href='level-1-homepage.php'> Return </a> </p>";
				#print return link back to homepage
			}
			
			else if ($_SESSION['level'] == 2) {
			//if the active user has level to access, do this
				echo "<p> <a href='level-2-homepage.php'> Return </a> </p>";
				#print return link back to homepage
			}
			
			else {
			//if there is no active user force login
				echo "<table>
					<tr>
						<th>Notice - Must Login</th>
					</tr>";
				
				echo "<tr>
						<td> <a href='login.html'> Home </a> </td>
					</tr>";
				
				echo "</table>";
			}
			
		}//sesssion 
		
		else {
		//if there is no active user force login
			echo "<table>
				<tr>
					<th>Notice - Must Login</th>
				</tr>";
					
			echo "<tr>
					<td> <a href='login.html'> Home </a> </td>
				</tr>";
					
			echo "</table>";
		}
	?>

</body>
</html>