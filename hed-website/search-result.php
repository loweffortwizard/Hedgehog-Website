<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>
	
	<?php
			/*
				this script will display records from the headghog database
				in a table
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-search-result');
		#saving error as textfile
		
		session_start();
		//check to see if the current session has a logged in user or active user
		if ( isset($_SESSION['user']) ){
			
		$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
			or die ('Sorry, cannot connect to MySQL');
		#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
		#else it will have the value of the text content, meaning that the connention was not made.
		
		$hedgehog_name = strip_tags($_POST['name']);
		#var pet_name has the value of posted name
		
		$query = mysqli_query($conn, 'SELECT * FROM hedgehogs WHERE hedgehog_name like "%' . $hedgehog_name . '%" ');
		# create var named query and asign it the value of 
		
		echo "<h1> Registered Hedgehogs </h1>";
		#print header
		
		echo "<table>
				<tr>
					<th>hedgehog ID</th>
					<th>hedgehog Name</th>
					<th>hedgehog Age</th>
					<th>hedgehog Height</th>
					<th>hedgehog Weight</th>
					<th>hedgehog Species</th>
					<th>hedgehog Group</th>
					<th>Return</th>
				</tr>";
		#print out table headers
		
		while ($row = mysqli_fetch_array($query))
			#for every array data in the query variable - asign it to var row 
			#for every data print out this
		{
			echo "<tr>
					<td> ", $row['hedgehog_id'] ." </td>
					<td> ", $row['hedgehog_name'] ." </td>
					<td> ", $row['hedgehog_age'] ." </td>
					<td> ", $row['hedgehog_weight'] ." </td>
					<td> ", $row['hedgehog_height'] ." </td>
					<td> ", $row['hedgehog_species'] ." </td>
					<td> ", $row['hedgehog_group'] ." </td>
					<td> <a href='search.php'> Return </a> </td>
				</tr>";
				#last row will link to php script to delete the seclete recored
				#as well as display hedgehog_id in the link window
			#print out var row data
		}
		
		#if nothing comes, this will appear
		echo "<td> No recored. </td>
		<td> No recored. </td>
		<td> No recored. </td>
		<td> No recored. </td>
		<td> No recored. </td>
		<td> No recored. </td>
		<td> No recored. </td>
		<td> <a href='search.php'> Return </a> </td>";
		#null recored for above
		
		echo "</table>";
		
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
	
</body>
</html>