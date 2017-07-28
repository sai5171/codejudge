<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "codejudge";
	$con =  mysqli_connect($servername, $username, $password,$database);
	if(isset($_POST['register_btn']))
	{
		$old_pasword = md5($_POST['opassword']);
		$new_password = md5($_POST['password']);
		$pre_email = $_SESSION['email'];

		$extract=mysqli_query($con,"select * from users where email='$pre_email' and pass='$old_pasword'");
		$count=mysqli_num_rows($extract);

		$extract= mysqli_query($con,"select * from users where email='$pre_email'");
		$row = mysqli_fetch_assoc($extract);

		if($count==0)
		{
			$_SESSION['profile_message']="Invalid current password";
		}
		else if($row['pass']==$new_password)
		{
			$_SESSION['profile_message']="It's seems your new password matches with the current password!";
		}
		else
		{
			mysqli_query($con,"UPDATE users SET pass='$new_password' WHERE email='$pre_email'");
			$_SESSION['profile_message']="Password Successfully Updated";
		}
		if($_SESSION['email']=="codeit@vidyanikethan.asia")
			header("location: admin_profile");
		else
			header("location: profile");
	}
	mysqli_close($con);
?>
