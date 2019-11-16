<!DOCTYPE html>
<html>

<head>

	<title>show</title>
	<link type="text/css" href="css/forms.css" rel="stylesheet" />
	<link type="text/css" href="css/tables.css" rel="stylesheet" />

</head>
<body>
		
	<?php
		
		/*
			this script will display records from heagehog table, in database
		*/
		
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-show-super');
		#saving error as textfile
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
			
			$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
				or die ('Sorry, cannot connect to MySQL');
			#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
			#else it will have the value of the text content, meaning that the connention was not made.
			
			$query = mysqli_query($conn, 'SELECT * FROM hedgehogs');
			# create var named query and asign it the value of the connect to database and all
			##data from the hedgehogs table in the database
			
			echo "<h1> Registered Hedgehogs </h1>";
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
						<th>Remove</th>
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
						<td> <a href='remove.php?hedgehog_id=".$row['hedgehog_id']." '> Remove </a> </td>
						<td> <a href='level-2-homepage.php'> Return </a> </td>
						
					</tr>";
				#print out var row data
			}
			echo "</table>";
		
		//checking the session
		
			if ($_SESSION['level'] == 1) {
			//if the active user has level one access, do this:
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
			//else if the active user is level two do this:
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
			//if there is no active user, force them to login and do this:
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
	//if there is no active user, force login and do this:
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
	
	<?php
	
	/*
		below scripts will capture user statistics for screen res and browser. 
	*/
		//Browser Detection
		$browser = $_SERVER['HTTP_USER_AGENT'];
		//Resolution
		#this is creating the website user agent - checking what browser opened the page
		
		if(isset($_COOKIE['users_resolution'])){
			#if there is a cookie allready
			$screen_res = $_COOKIE['users_resolution'];
			#var screen_res has the value of _COOKIE
			#this is getting the resolution of the users screen
		} else {
			#if there is no cookie, do this
			#will run JavaScript to create a cookie
	?>
	
	<script language='javascript'>
	<!-- declaration of script -->
	
	//function will create a cookie that saves the screen resolution of the sure
	
	function writeCookie()
	//creation of function writeCookie
		{
			var today = new Date();
			//new var today has the value of a new Date
			var the_date = new Date('December 31, 2023');
			//var the_date has the value of Date
			//this is creating an experation for the cookie
			var the_cookie_date = the_date.toGMTString();
			//var the_cookie_date has the value of the_date 
			var the_cookie = 'users_resolution='+screen.width+'x'+screen.height;
			//var the_cookie has the value of 'users_resolution' text + the screen width and height
			var the_cookie = the_cookie + ';expires='+the_cookie_date;
			//var the_cookie has the value of itself and the experation date
			document.cookie = the_cookie;
			//cookie has the value of the_cookie
			location = 'show-super.php';
			//location has the value of the webpage name (show-super.php)
		}
		writeCookie();
		//run function writeCookie
	</script>
	<?php
		}
		$conn= mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
			or die ("Sorry -  could not connect to MySQL");
		//checking connenction to mysql database
		
		$query = "INSERT INTO stats VALUES ('$browser', '$screen_res')";
		//var query has the value $browser + $screen_res
		//creating the address agent - not creating the query only creating the variable
		
		$result = mysqli_query($conn, $query);
		//var result has the value of the connection to the database and the query variable
		//creating the query
		
		if ($result) 
			//if the result is sucssessful, do this;
		{
			echo "";
			//print out the added and thankyou for user input.
			
		} else {
			//if the result is not sucssessful, do this;
			echo "";
		}
	?>
	
		
</body>
</html>