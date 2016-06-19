<?php
		
	//start session
	session_start();	
	include('database.php');
	include('functions.php');
	
	//connect to database
	$conn=connect_db();
	
	//get username and password from $_POST
	$username = sanitizeString($_POST["username"]);
	$password = sanitizeString($_POST["password"]);

	
	

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

	$user = mysqli_fetch_row($result);
	
	
	
	//Check in the DB
	if(password_verify('$password',$user[2])){

		//If authenticated: say hello!
		$_SESSION["username"] = $username;
		header("Location: feed.php");
		//echo "Success!! Welcome ".$username;

	}else{
		//else ask to login again..	
		echo "Invalid password! Try again!";

	}
?>