<!DOCTYPE html>
<html>
<head>
	<title>session</title>
</head>
<style>
table {
    border-collapse: collapse;
	width: 100%;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	background-color: #fff;
}
th {
    height: 50px;
	background-color: #732A8B;
    color: white;
}
table, th, td {
    border-bottom: 1px solid #ddd;
}
td {
	padding: 15px;
    text-align: center;
}
tr:hover {
	background-color: #f5f5f5
}
h1{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	text-align: center;
}
body{
	background-color: #D1C8D4;
}
</style>
<body>	
	
	<?php
			/*
				this script will
			*/
			
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
			
			
		/*
			content of the document here
			############################
		*/
			
			//checking the session
			if ($_SESSION['level'] == 1) {
				
				echo "<table>
					<tr>
						<th>Home</th>
					</tr>";
				
				echo "<tr>
						<td> '<a href='Level-1-homepage.php'> Home </a>' </td>
					</tr>";
				
				echo "</table>";
			}
			
			else if ($_SESSION['level'] == 2) {
				echo "<table>
					<tr>
						<th>Home</th>
					</tr>";
				
				echo "<tr>
						<td> '<a href='Level-2-homepage.php'> Home </a>' </td>
					</tr>";
				
				echo "</table>";
			}
			
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
		}//session
	
	else {
		echo "<table>
					<tr>
						<th>Notice - Must Login</th>
					</tr>";
				
				echo "<tr>
						<td> '<a href='login.html'> Home </a>' </td>
					</tr>";
				
				echo "</table>"
	}
	
	?>
	
</body>
</html>