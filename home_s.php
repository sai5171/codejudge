<?php
	session_start();
	$servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $u = $_POST['email'];
  $p = $_POST['password'];
	$email= $_POST['email'];
	$password= md5($_POST['password']);
	$extract= mysqli_query($con,"select * from users where email='$email' and pass='$password'");
  $count=mysqli_num_rows($extract);
  $row = mysqli_fetch_assoc($extract);
	if($count==1)
	{
    $_SESSION['username']=$row['nick'];
    $_SESSION['email']=$row['email'];
    echo "yes";
	}
	else
	{
    echo "no";
		$_SESSION['message']="Sorry, Email or password is invalid";
	}
  mysqli_close($con);
?>
