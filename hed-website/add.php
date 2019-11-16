<!DOCTYPE html>
<html>
<head> 
	
	<title>Add</title> 
	<link type="text/css" href="css/forms.css" rel="stylesheet" />
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>

<body>
<div>
	<form action="add-script.php" method="post">
	<!-- link to php and creation of form -->
		<p> Enter Name: <input type="text" name="name" placeholder="full name" required/> </p>
		<p> Enter Age: <input type="text" name="age" placeholder="years" required/> </p>
		<p> Enter weight: <input type="text" name="weight" placeholder="grams" required/> </p> 
		<p> Enter height: <input type="text" name="height" placeholder="inches" required/> </p> 
		<p> Enter species: <input type="text" name="species" placeholder="species" required value="Erinaceus europaeus"/> </p> 
		<!-- options -->
		
		<p> Enter A Group </p>
			<select name="group"> 
			  <option value="green">Green</option>
			  <option value="red">Red</option>
			  <option value="blue">Blue</option>
			  <option value="yellow">Yellow</option>
			</select>
		<p> <input type="submit" value="Add" /> </p>
	</form>
	
	<form action="level-1-homepage.php" method="post">
		<p> <input type="submit" value="Return" /> </p>
		<!-- submission button -->
	</form>
	
	<?php
			/*
				this script will create an error textfile (if any)
				and check the session
			*/
			
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-add');
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