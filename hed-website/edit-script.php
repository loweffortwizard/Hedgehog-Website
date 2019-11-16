<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link type="text/css" href="css/forms.css" rel="stylesheet" />
	<link type="text/css" href="css/tables.css" rel="stylesheet" />
</head>
<body>	
<div>
	<?php
			/*
				this script will allow the user to edit a pet recored from the database
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-edit-script');
		#saving error as textfile
		
		$conn = mysqli_connect("localhost", "marw_trowe", "rowet", "marw_trowe")
			or die ('Sorry, cannot connect to MySQL');
		#var conn has the value of mysqli_connect with a "localhost", "username", "password", and "name of database"
		#else it will have the value of the text content, meaning that the connention was not made.
	
		$hedgehog_id = $_GET['hedgehog_id'];
		#var hedgehog_id has the get value of hedgehog_id
		
		$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM hedgehogs WHERE hedgehog_id='$hedgehog_id'") );
		#var data has the value of hedgehog_id if it = the value of $hedgehog_id
		echo mysqli_error($conn);
	
	?>
	
	<form action="update-edit.php" method="post">
	<!-- link to php and creation of form -->
		<input type="hidden" name="id" value="<?php echo $data['hedgehog_id'] ?>" /> </p>
		
		<p> Enter Hedgehog Name: <input required type="text" name="name" value="<?php echo $data['hedgehog_name'] ?>"/> </p>
		<p> Enter Hedgehog Age: <input required type="text" name="age" value="<?php echo $data['hedgehog_age'] ?>" /> </p>
		<p> Enter Hedgehog Weight: <input required type="text" name="weight" value="<?php echo $data['hedgehog_weight'] ?>" /> </p> 
		<p> Enter Hedgehog Height: <input required type="text" name="height" value="<?php echo $data['hedgehog_height'] ?>" /> </p> 
		<p> Enter Hedgehog Species: <input required type="text" name="species" value="<?php echo $data['hedgehog_species'] ?>" /> </p> 
		<!-- options -->

		<p> Enter A Group </p>
			<select name="group" required> 
			  <option value="green">Green</option>
			  <option value="red">Red</option>
			  <option value="blue">Blue</option>
			  <option value="yellow">Yellow</option>
			</select>
		
		<p> <input type="submit" value="Update Details" /> </p>
		<!-- submission button -->
	</form>
	
	<!-- return to home -->
	<form>
		<input id="btnReturn" type="button" value="Return" 
       onclick="return btnReturn_onclick()" />

		<script language="javascript" type="text/javascript">
			function btnReturn_onclick() 
			{
				window.location.href = "edit.php";
			}
		</script>
		<!-- submission button -->
	</form>
	
	<?php
			/*
				this script will check the session
			*/
		ini_set('display_errors', 0);
		#displaying errors to user
		ini_set('log_errors', 1);
		#recoring error made
		#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
		ini_set('error_log', 'error-edit-script');
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