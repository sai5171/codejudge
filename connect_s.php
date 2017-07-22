<?php
	session_start();
	echo "<html><body style='background-color:white;'>
    <h1 style='color:black;text-align:center;'>Loading please wait...</h1>
    <img style='position: absolute;margin: auto;top: 0;left: 0;right: 0;bottom: 0;' src='loading.gif'></body></html>";
		$servername = "127.0.0.1";
    $username = "root";
    $password = "$@!Sai5171";
    $database = "codejudge";
    $con =  mysqli_connect($servername, $username, $password,$database);
		$date = date("d-m-Y h:i:s A");
    if(isset($_POST['register_btn']))
    {
			$clg_name = $_POST['clg_name'];
			$clg_roll = $_POST['clg_roll'];
			$prid = $_POST['prid'];
			if($_FILES["scbc"]['tmp_name'] == "") {
				$scbc = "";
				if($prid=="") {
					$_SESSION['message']="Please enter payment details.";
					header("location: register");
					return ;
				}
		  } else {
		    $scbc = addslashes(file_get_contents($_FILES["scbc"]['tmp_name']));
		  }
    	$name= $_POST['name'];
			$email= $_POST['email'];
    	$nick= $_POST['nick'];
			$mail_password = $_POST['password'];
    	$password= md5($_POST['password']);
    	$extract= mysqli_query($con,"select * from users where email='$email'");
    	$count=mysqli_num_rows($extract);
    	if($count==1)
    	{
    		$_SESSION['message']="Email id already exists.";
    		header("location: register");
    	}
    	else
    	{
    		mysqli_query($con,"INSERT INTO users VALUES ('$email','$password','$name','$nick','','$clg_name','$clg_roll','$prid','$scbc','$date','0')");
        $subject= "Registration - Codeit";
        $msg = "Thank you for getting registered for Codeit.\n\n Your email id is :".$email."\n\nYour password is ".$mail_password;
        $from = "From: codeit@vidyanikethan.asia"."\r\n";
				$from .= "Bcc: codeit@vidyanikethan.asia"."\r\n";
        mail($email,$subject,$msg,$from);
    		$_SESSION['message']="Successfully registered. We will redirect you to home page within 5 seconds.";
				header("location: register");
    	}
    }
    mysqli_close($con);
?>
