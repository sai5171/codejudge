<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "codejudge";
	$con =  mysqli_connect($servername, $username, $password,$database);
	if(isset($_POST['register_btn']))
	{
		$new_name = $_POST['name'];
		$new_nick = $_POST['nick'];
		$new_email = $_POST['email'];
		$old_password = md5($_POST['opassword']);
		$pre_email = $_SESSION['email'];
		$extract=mysqli_query($con,"select * from users where email='$pre_email' and pass='$old_password'");
		$count=mysqli_num_rows($extract);
		if($count==0)
		{
			$_SESSION['profile_message']="Invalid current password";
		}
		else
		{
			//dp upload
			if(!(empty($_FILES['image_dp']['tmp_name'])))
			{
				$file_size = $_FILES['image_dp']['size'];
				if($file_size>61440)
				{
					$_SESSION['profile_message']="File too large. File must be less than 60 kilobytes.";
					if($_SESSION['email']=="codeit@vidyanikethan.asia")
						header("location: admin_profile");
					else
						header("location: profile");
					return 0;
				}
				else if(getimagesize($_FILES['image_dp']['tmp_name'])== FALSE )
				{
					$_SESSION['profile_message']="Please select an image.";
					if($_SESSION['email']=="codeit@vidyanikethan.asia")
						header("location: admin_profile");
					else
						header("location: profile");
					return 0;
				}
				else
				{
					$imagetmp=addslashes (file_get_contents($_FILES['image_dp']['tmp_name']));
					mysqli_query($con,"update users SET image='$imagetmp' WHERE email='$pre_email'");
				}
			}
			if($new_email==$pre_email)
			{
				$extract = mysqli_query($con,"update users SET nick='$new_nick', name='$new_name	' WHERE email='$pre_email'");
				$_SESSION['username']=$new_nick;
				$_SESSION['profile_message']="Profile Successfully Updated";
			}
			else
			{
				$extract= mysqli_query($con,"select * from users where email='$new_email'");
				$count = mysqli_num_rows($extract);
				if($count==0)
				{
					$extract = mysqli_query($con,"update users SET email='$new_email', nick='$new_nick', name='$new_name' WHERE email='$pre_email'");
					$_SESSION['username']=$new_nick;
					$_SESSION['email']=$new_email;
					$_SESSION['profile_message']="Profile Successfully Updated";
				}
				else
				{
					$_SESSION['profile_message']="Email id already exist";
				}
			}
		}
		if($_SESSION['email']=="codeit@vidyanikethan.asia")
			header("location: admin_profile");
		else
			header("location: profile");
	}
	mysqli_close($con);
?>
