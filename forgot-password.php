<!DOCTYPE html>
<html>
	<head>
		<title>Forgot Your Password?</title>
		<script type="text/javascript">
			document.addEventListener('contextmenu', event => event.preventDefault());
		</script>
		<link rel="icon" type="image/png" href="icon.png">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="select2.css">
		<link rel="stylesheet" type="text/css" href="system.css">
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="stylesheet" type="text/css" href="logo.css">
		<style>
			body {
				background-image: url(background1.jpg);
				background-repeat: repeat;
			}
		</style>
	</head>
	<body>
		<!--<div class="header" style="position: absolute;top: 0px;"></div>
		<div style="padding: 75px 0px 0px 0px;"></div>-->
		<?php
			session_start();
			if(isset($_SESSION['message']))
			{
				if($_SESSION['message']=="A recovery password has been sent to your email. We will redirect you to home page within 5 seconds.")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['message']."</strong>
            </div>";
          echo "</div>";
        }
        else if($_SESSION['message']=="Email Id is not registered")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['message']."</strong>
            </div>";
          echo "</div>";
        }
				if($_SESSION['message']=="A recovery password has been sent to your email. We will redirect you to home page within 5 seconds.")
					header('Refresh: 5;url=home');
				session_unset();
				session_destroy();
			}
			if(isset($_SESSION['username']))
				header("location: admin");
		?>
		<div id="section">
			<div class="logo">&gt;<i>_</i></div>
			<h3 style="padding:0px 0px 0px 100px;">Forgot Your Password?</h3>
			<p style="text-align: left;line-height: 26px;font-size: 16px;font-family:'My Custom Font';padding: 0px 0px 0px 20px;">
			You can request a password reset for Codeit. It will be sent to an e-mail address registered with your account.</p>
			<form style="text-align:left;padding: 0px 0px 0px 20px;" method="post" action="forgotmail_s">
			    <div class="form-group" align="left">
			    	<label for="email" style="font-size: 17px;">Email-id:</label>
			    	<input style="width: 200px;" maxlength="50" type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
			    	<button type="submit" class="btn btn-default" name="register_btn">Send new password</button>
			    </div>
			</form>
		</div>
		<div style="padding: 75px 0px 0px 0px;"></div>
		<!--<div class="footer">
		</div>-->
	</body>
</html>
<script src='jquery.min.js'></script>
<script>
  $('#message_close').hover(function(){
    $("#message_close").css("cursor","pointer");
  });
  $('#message_close').click(function(){
    $('#message').fadeOut(1000).remove();
  });
</script>
