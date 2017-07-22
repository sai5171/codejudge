<?php
	session_start();
	$servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $email = $_POST['email'];
  $val = $_POST['val'];
  mysqli_query($con,"UPDATE users SET status = '$val' WHERE email = '$email';");
  mysqli_close($con);
?>
