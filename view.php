<?php
  session_start();
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con = mysqli_connect($servername, $username, $password,$database);
  if(isset($_GET['submissionid']))
    $sid = $_GET['submissionid'];
  else
    header("location: error");
  $email = $_SESSION['email'];
  $result = mysqli_query($con,"SELECT * FROM submissions where email='$email' and submissions_id=$sid");
  mysqli_close($con);
  $count = mysqli_num_rows($result);
  echo "
  <html>
    <head>
  		<title>My Submission</title>
  		<script type='text/javascript'>
  			document.addEventListener('contextmenu', event => event.preventDefault());
  		</script>
  		<link rel='icon' type='image/png' href='/icon.png'>
  		<link rel='stylesheet' type='text/css' href='/bootstrap.min.css'>
  		<link rel='stylesheet' type='text/css' href='/font-awesome.min.css'>
  		<link rel='stylesheet' type='text/css' href='/jquery-ui.min.css'>
  		<link rel='stylesheet' type='text/css' href='/select2.css'>
  		<link rel='stylesheet' type='text/css' href='/system.css'>
  		<link rel='stylesheet' type='text/css' href='/main.css'>
  		<link rel='stylesheet' type='text/css' href='/main1.css'>
		  <link rel='stylesheet' type='text/css' href='/main2.css'>
		  <link rel='stylesheet' type='text/css' href='/logo.css'>
	   </head>
    <body>
		  <div class='header' style='position: absolute;top: 0px;'>
		    </div>
  		<div style='padding: 75px 0px 0px 0px;'></div>";
      if($count==0)
      {
        echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>
  				<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
  				<a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
  				<strong>The requested URL was not found on this server. If you entered the URL manually please check your spelling and try again.</strong>
  				</div>
  			</div>";
      }
      else {
        echo "<pre style='margin:30px 50px 10px 50px;'>".htmlentities(file_get_contents("XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/$sid.cpp"))."</pre>";
      }
  		echo "<div style='padding: 75px 0px 0px 0px;'></div>
  		<div class='footer' style='position: fixed;bottom:0px;'>
  		</div>
  	</body>
  </html>";

  echo "<script src='jquery.min.js'></script>
  <script>
    $('#message_close').hover(function(){
      $('#message_close').css('cursor','pointer');
    });
    $('#message_close').click(function(){
      $('#message').fadeOut(1000).remove();
    });
  </script>";
?>
