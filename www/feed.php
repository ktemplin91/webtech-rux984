<!DOCTYPE html>
<html>
<head>
	<title>MyFacebook Feed</title>
</head>
<body>
<?php
	include('database.php');
	
	session_start();

	$conn = connect_db();

	$username = $_SESSION["username"];
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

	//user information 
	$row = mysqli_fetch_assoc($result);

	
	echo "<h1>Welcome back ".$row['Name']."!</h1>";
	echo "<img src='".$row['profile_pic']."'>";
	$profile_pic= $row['profile_pic'];
	//echo "<hr>";

	echo "<form method='POST' action='posts.php'>";
	echo "<p><textarea name='content'>Say something...</textarea></p>";
	echo "<input type='hidden' name='UID' value='$row[Id]'>";
	echo "<p><input type='submit'></p>";	
	echo "</form>";

	echo "<br>";

	$result_posts = mysqli_query($conn, "SELECT * FROM post");
	$num_of_rows = mysqli_num_rows($result_posts);
	

	echo "<h2>My Feed</h2>";
	if ($num_of_rows == 0) {
		echo "<p>No new posts to show!</p>";
	}

	//show all posts on myfacebook
	for($i = 0; $i < $num_of_rows; $i++){

		$row = mysqli_fetch_row($result_posts);
		echo "$row[2] said $row[4] ($row[5])";
		echo "<form action='likes.php' method='POST'> <input type='hidden' name='PID' value='$row[0]'> <input type='submit' value='Like'></form>";
		echo "<br>";
		//coments results
		$result_comments = mysqli_query($conn, "SELECT * FROM comment WHERE PID='$row[0]'");
		$num_of_rows2 = mysqli_num_rows($result_comments);
		if($num_of_rows2 ==0){
			
			
		}else{
			for($j=0; $j < $num_of_rows2; $j++){
				$commrow = mysqli_fetch_row($result_comments);
				echo "$commrow[3] commented $commrow[4] ($commrow[5])";
				echo "<form action='likescomment.php' method='POST'> <input type='hidden' name='PID' value='$commrow[0]'> <input type='submit' value='Like Comment'></form>";
				echo "<br>";
			}
		}
		
		
		//comments
		echo "<form method='POST' action='comments.php'>";
		echo "<p><textarea name='content'>Comment...</textarea></p>";
		echo "<input type='hidden' name='PID' value='$row[0]'>";
		echo "<input type='hidden' name='UID' value='$row[1]'>";
		echo "<input type='hidden' name='username' value='$username'>";
		echo "<input type='hidden' name='profile_pic' value='$profile_pic'>";
		echo "<p><input type='submit' value='Comment'></p>";	
		echo "</form>";
		//echo "<form action='comments.php' method='POST'> <input type='hidden' name='PID' value='$row[0]'> <input type='submit' value='Comment'></form>";
		echo "<br>";
		
		
		
		
	}

	
	
?>


</body>
</html>
