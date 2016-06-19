<?php
  session_start();
  include('database.php');
  include('functions.php');
  
  $conn = connect_db();
  
  $UID = sanitizeString($_POST["UID"]);
  $PID = sanitizeString($_POST["PID"]);
  $content = sanitizeString($_POST["content"]);
  $username = sanitizeString($_POST["username"]);
  $profile_pic = sanitizeString($_POST["profile_pic"]);
  $likes = sanitizeString(0);
  
  echo "$UID";
  echo "$PID";
  echo "$content";
  echo "$username";
  echo "$profile_pic"; 
 
  
  
  
$result= mysqli_query($conn, "INSERT INTO comment(PID, content, UID, name, profile_pic,likes) VALUES ('$PID','$content','$UID','$username','$profile_pic','$likes')");
 
  
 echo "$result";
  

  if($result){
	header("Location: feed.php");
  }else{
    echo "something went wrong!";
  }