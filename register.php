<!DOCTYPE html>
<html>
	<head>
		<title>Register for Cse-Arena</title>
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
			#scbc {
				width: 0.1px;
				height: 0.1px;
				opacity: 0;
				position: absolute;
				z-index: -1;
				overflow: hidden;
				position: absolute;
			}
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
				if($_SESSION['message']=="Successfully registered. We will redirect you to home page within 5 seconds.")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['message']."</strong>
            </div>";
          echo "</div>";
        }
        else if($_SESSION['message']=="Email id already exists." || $_SESSION['message']=="Please enter payment details.")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['message']."</strong>
            </div>";
          echo "</div>";
        }
				if($_SESSION['message']=="Successfully registered. We will redirect you to home page within 5 seconds.")
					header('Refresh: 5;url=home');
				session_unset();
				session_destroy();
			}
			if(isset($_SESSION['username']))
				header("location: home");
		?>
		<div id="section" style="width: 75vw;height:90vh;">
			<div class="logo">&gt;<i>_</i></div>
			<h3 style="padding:0px 0px 0px 100px;">Register for Cse-Arena</h3>
			<p style="font-size: 16px;background:linear-gradient(60deg, rgba(66,35,51,0.7), rgba(157,75,53,0.7), rgba(61,53,68,0.7));">
				Note :- Pay the registration free through Internet Banking or Bank Counter deposit to following Bank Account. Registration Fee : Rs. 100/- per participant.<br>
				<table style="width:30%;font-size: 16px;">
					<tr style="line-height: 150%;"><td>Account Holder Name</td><td width="10%">:</td><td>Chairman-CETA</td></tr>
					<tr style="line-height: 150%;"><td>Account No.</td><td>:</td><td>154010011041938</td></tr>
					<tr style="line-height: 150%;"><td>Bank Name</td><td>:</td><td>Andhra Bank</td></tr>
					<tr style="line-height: 150%;"><td>IFSC Code</td><td>:</td><td>ANDB0001540</td></tr>
				</table>
			</p>
			<div style="background-color: none;float: center;padding:35px;">
				<form style="text-align:center;" enctype="multipart/form-data" method="post" action="connect_s">
					<div class="col-sm-6">
						<div class="form-group" align="left">
				    	<label style="font-size: 17px;">College Name</label><br>
				    	<input style="width: 100%;" minlength="3" maxlength="250" type="text" class="form-control" id="clg_name" name="clg_name" required>
				    </div>
						<div class="form-group" align="left">
				    	<label style="font-size: 17px;">College Roll No.</label><br>
				    	<input style="width: 25%;" minlength="3" maxlength="25" type="text" class="form-control" id="clg_roll" name="clg_roll" required>
				    </div>
						<hr>
						<div class="form-group" align="left">
				    	<label style="font-size: 17px;">Payment</label><br>
				    	<input style="width: 100%;" minlength="3" maxlength="50" type="text" class="form-control" id="prid" name="prid" placeholder="Payment Reference Id">
				    </div>
						<p>OR</p>
						<div class="form-group" align="left">
							<input type="file" name="scbc" id="scbc" accept="image/x-png,image/gif,image/jpeg" data-multiple-caption="{count} files selected" multiple />
							<label style="width: 100%;" class="btn btn-default" id="scbcl" for="scbc"><span style="overflow: hidden;">Scanned copy of Bank Challan</span></label>
				    </div>
					</div>
					<div class="col-sm-6">
				    <div class="form-group" align="left">
				    	<label style="font-size: 17px;">Full Name</label><br>
				    	<input style="width: 100%;" minlength="3" maxlength="50" type="text" class="form-control" id="name" name="name" required>
				    </div>
				    <div class="form-group" align="left">
				    	<label style="font-size: 17px;">Email-id</label><br>
				    	<input style="width: 100%;" maxlength="50" type="email" class="form-control" id="email" name="email" required>
				    </div>
						<div class="form-group" align="left">
				    	<label style="font-size: 17px;">User Name</label><br>
				    	<input style="width: 50%;" minlength="3" maxlength="25" type="text" class="form-control" id="nick" name="nick" required>
				    </div>
				    <div class="form-group" align="left" style="padding:5px 0px 0px 0px;">
				    	<label style="font-size: 17px;">Password</label><br>
				     	<input style="width: 75%;" minlength="8" maxlength="50" type="password" class="form-control" id="password" name="password" required>
				    </div>
				    <div class="form-group" align="left" style="padding:5px 0px 0px 0px;">
				    	<label style="font-size: 17px;">Re-enter Password</label><br>
				     	<input style="width: 75%;" minlength="8" maxlength="50" type="password" class="form-control" id="passwordr" name="passwordr" required>
				    </div>
				    <button type="submit" class="btn btn-default" name="register_btn">Submit</button><br>
					</div>
				</form>
			</div>
		</div>
		<div style="padding: 75px 0px 0px 0px;"></div>
		<!--<div class="footer">
		</div>-->
	</body>
</html>
<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	var password = document.getElementById("password"), passwordr = document.getElementById("passwordr");
	function validatePassword(){
	  if(password.value != passwordr.value) {
	    passwordr.setCustomValidity("Passwords Don't Match");
	  } else {
	    passwordr.setCustomValidity('');
	  }
	}
	password.onchange = validatePassword;
	passwordr.onkeyup = validatePassword;
	$("#scbc").change(function(){
		$("#scbcl").css("border","none");
		$("#scbcl").css("background-color","#35BD40");
		$("#scbcl").css("background-image","url('check.svg')");
		$("#scbcl").css("background-repeat","no-repeat");
		$("#scbcl").css("background-position","center");
		$("#scbcl").css("background-size","50px 30px");
	});
	$('#message_close').hover(function(){
    $("#message_close").css("cursor","pointer");
  });
	$('#message_close').click(function(){
    $('#message').fadeOut(1000).remove();
  });
</script>
