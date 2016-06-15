<?php
		
	//start session
	session_start();	
	include('database.php');
	
	//get username and password from $_POST
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$name = $_POST["name"];
	$dob = $_POST["dob"];
	$veriq = $_POST["verification_question"];
	$verians= $_POST["verification_answer"];
	$gender = $_POST["gender"];
	$location =$_POST["location"];
	$profile_pic= $_POST["profile_pic"];

	$conn = connect_db();
	if( mysqli_connect_errno($conn)){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($conn, "INSERT INTO `users` (`Username`, `Password`, `Name`, `email`, `dob`, `gender`, `verification_question`, `verification_answer`, `location`, `profile_pic`) VALUES ( `$username`, `$password`, `$name`, `$email`, `$dob`, `$gender`, `$veriq`, `$verians`, `$location`, `$profile_pic`)");

	
?>