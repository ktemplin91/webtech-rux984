<?php
		
	//start session
	session_start();	
	include('database.php');
	include('functions.php');
	
	//get username and password from $_POST
	$username = sanitizeString($_POST["username"]);
	$password = sanitizeString($_POST["password"]);
	$email = sanitizeString($_POST["email"]);
	$name = sanitizeString($_POST["name"]);
	$dob = sanitizeString($_POST["dob"]);
	$veriq = sanitizeString($_POST["verification_question"]);
	$verians= sanitizeString($_POST["verification_answer"]);
	$gender = sanitizeString($_POST["gender"]);
	$location =sanitizeString($_POST["location"]);
	$profile_pic= sanitizeString($_POST["profile_pic"]);

	
	//echo"$username";
	//echo"$password";
	//echo"$email";
	//echo"$name";
	//echo"$dob";
	//echo"$veriq";
	//echo"$verians";
	//echo"$gender";
	//echo"$location";
	//echo"$profile_pic";
	
	
	//hashed password
	$password=password_hash (  '$password' , PASSWORD_BCRYPT,array(
		'cost'=> 10));
	echo"$password";
	
	
	$conn = connect_db();
	if( mysqli_connect_errno($conn)){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($conn, "INSERT INTO users (Username, Password, Name, email, dob, verification_question, verification_answer, location, profile_pic) VALUES ( '$username', '$password', '$name', '$email', '$dob','$veriq', '$verians', '$location', '$profile_pic')");

	
	
	if($result){
		header('Location: login.html');
	}else{

		echo "Something is wrong!";
	}
	
?>