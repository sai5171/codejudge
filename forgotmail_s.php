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
    if(isset($_POST['register_btn']))
    {
    	$email= $_POST['email'];

    	$extract= mysqli_query($con,"select * from users where email='$email'");
        $count=mysqli_num_rows($extract);
        if($count==0)
        {
            $_SESSION['message']="Email Id is not registered";
            header("location: forgot");
        }
        else
        {
            $row = mysqli_fetch_assoc($extract);
            $subject= "Password Recovery - Codeit";
            $password=randomPassword();
            $msg = "You have requested a password change for Codeit\n\nThe new password is ".$password;
            $from = "From: codeit@vidyanikethan.asia"."\r\n";
						$from .= "Bcc: codeit@vidyanikethan.asia"."\r\n";
            $passworde=md5($password);
            mysqli_query($con,"update users set pass='$passworde' where email='$email'");

            mail($email,$subject,$msg,$from);
            $_SESSION['message']="A recovery password has been sent to your email. We will redirect you to home page within 5 seconds.";
            //header('Refresh: 5;url=forgot-password');
						header("location: forgot");
        }
    }

	function randomPassword() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array();
	    $alphaLength = strlen($alphabet) - 1;
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass);
	}
	mysqli_close($con);
?>
