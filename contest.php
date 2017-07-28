<?php
	session_start();
	$_SESSION['show']="no";
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']=='codeit@vidyanikethan.asia')
		header("location: admin_contest");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contest</title>
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
		<link rel="stylesheet" type="text/css" href="main1.css">
		<link rel="stylesheet" type="text/css" href="logo.css">
		<link rel="stylesheet" type="text/css" href="time.css">
		<style>
			input[type=datetime-local]::-webkit-inner-spin-button,
			input[type=datetime-local]::-webkit-outer-spin-button {
					-webkit-appearance: none;
					-moz-appearance: none;
					appearance: none;
					margin: 0;
			}
			.dp {
				background: url(
				<?php
				$servername = "127.0.0.1";
				$username = "root";
				$password = "$@!Sai5171";
				$database = "codejudge";
				$con =  mysqli_connect($servername, $username, $password,$database);
				$email = $_SESSION['email'];
				$extract= mysqli_query($con,"select image from users where email='$email'");
				mysqli_close($con);
				$row = mysqli_fetch_assoc($extract);
				if($row['image']==NULL)
				{
					?>icon1.png<?php
				}
				else
					echo '"data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
				?>
				);
				background-position: center;
				background-size: cover;
				border-radius: 100%;
				border:1px solid white;
				width: 45px;
				height: 45px;
				cursor: pointer;
				margin-top:7px;
				-webkit-transition: -webkit-transform .5s ease-in-out;
				-ms-transition: -ms-transform .5s ease-in-out;
				transition: transform .5s ease-in-out;
			}
			.dp:hover {
				transform:rotate(360deg);
				-ms-transform:rotate(360deg);
				-webkit-transform:rotate(360deg);
			}
			.dropdown {
					position: absolute;
					cursor: pointer;
					display: inline-block;
			}
			.dropdown-content {
					display: none;
					position: relative;
					right:50px;
					margin-top:6px;
					background-color: #f9f9f9;
					min-width: 160px;
					box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			}
			.dropdown-content a {
					color: black;
					padding: 12px 16px;
					text-decoration: none;
					display: block;
			}

			.dropdown-content a:hover {
				background-color: #f1f1f1
				cursor: pointer;
			}
			.dropdown:hover .dropbtn {
					background-color: #3e8e41;
			}
		</style>
		<script>
		/* When the user clicks on the button,
		toggle between hiding and showing the dropdown content */
		function myFunction() {

				document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
			if (!event.target.matches('.dp')) {

				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
				}
			}
		}
		</script>
	</head>
	<body>
		<div class="header" style="position: absolute;top: 0px;">
		<nav>
			<ul>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a style="padding: 0px 15px 5px 15px;" href=""><div class="logo">&gt;<i>_</i></div></a></li>
				<li style="float:left;padding: 0px 0px 0px 10%;"><a class="list_hover" href="/welcome">WELCOME</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/resources">RESOURCES</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/discuss">DISCUSS</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/practice">PRACTICE</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/contest">CONTEST</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/standings">STANDINGS</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/compile_arena">COMPILE ARENA</a></li>
				<li style="float:right;padding:0px 15% 0px 0px;">
					<div class="dp" onclick="myFunction()"></div>
					<div class="dropdown">
						<div id="myDropdown" class="dropdown-content">
							<a href="/profile">SETTINGS</a>
							<a href="/logout">LOGOUT</a>
						</div>
					</div>
				</li>
			</ul>
		</nav>
		</div>
		<div style="padding: 75px 0px 0px 0px;"></div>
		<?php
			$servername = "127.0.0.1";
			$username = "root";
			$password = "$@!Sai5171";
			$database = "codejudge";
			$con = mysqli_connect($servername, $username, $password,$database);
			$result = mysqli_query($con,"SELECT * FROM problems");
			$count = mysqli_num_rows($result);
			$email=$_SESSION['email'];
			$result1 = mysqli_query($con,"SELECT * FROM standings where email='$email';");
			mysqli_close($con);
			$count1 = mysqli_num_rows($result1);
			if($count == 0)
			{
				//echo "<div  id='section' style='height: 50px;background-color: #f2dede;border-color: #ebccd1;padding: 10px 10px 10px 20px;'>"."<strong style='text-align: center;color: #a94442;line-height: 26px;font-size: 16px;font-family:'My Custom Font';'>Contest not yet created</strong>"."</div>";
				echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
          echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
          <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
          <strong>"."Contest not yet created"."</strong>
          </div>";
        echo "</div>";
			}
			else if($count1 == 0) {
				echo "<div style=';text-align: center;margin: auto;margin-top:25px;'><form action='contest_add_s' method='post'>
					<input type='submit' class='btn btn-default' name='join_contest' id='join_contest' value='Join Contest'>
				</form></div>";
			}
			else {
				$start_file = fopen("$@!1start.txt","r");
				$start_time = strtotime(fread($start_file,filesize("$@!1start.txt")));
				fclose($start_file);
				$stop_file = fopen("$@!1stop.txt","r");
				$stop_time = strtotime(fread($stop_file,filesize("$@!1stop.txt")));
				fclose($stop_file);
				$present_time = strtotime(date("Y-m-d\TH:i:s"));
				if($present_time < $start_time) {
					$_SESSION['show']="no";
					shell_exec("chmod 000 -R Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/*.*");
					$interval  = $start_time - $present_time;
					$sec   = round($interval);
					/*jquery for time*/
					echo "<input type='hidden' id='set-time' value='$sec'/>
								<div id='countdown' style='font: normal 13px/20px Arial, Helvetica,sans-serif;'>
					  			<div id='tiles' class='color-empty'></div>
					  			<div class='countdown-label'>Contest will start in</div>
								</div>";
					echo "<script src='jquery-1.9.1.min.js' type='text/javascript'></script>";
					echo "<script type='text/javascript'>
					var sec = $( '#set-time' ).val();
					var target_date = new Date().getTime() + ((sec) * 1000);
					var time_limit = ((sec) * 1000);
					/*setTimeout(
						function()
						{
							location.reload();
						}, time_limit );*/
					var days, hours, minutes, seconds;
					var countdown = document.getElementById('tiles');
					getCountdown();
					setInterval(function () { getCountdown(); }, 1000);
					function getCountdown(){
							var current_date = new Date().getTime();
							var seconds_left = (target_date - current_date) / 1000;
							if ( seconds_left >= 0 )
							{
								console.log(time_limit);
								 if ( (seconds_left * 1000 ) < ( time_limit / 2 ) )  {
									 $( '#tiles' ).removeClass('color-empty');
									 $( '#tiles' ).addClass('color-half');
									}
									if ( (seconds_left * 1000 ) < ( time_limit / 4 ) )  {
										$( '#tiles' ).removeClass('color-half');
										$( '#tiles' ).addClass('color-full');
									}
								days = pad( parseInt(seconds_left / 86400) );
								seconds_left = seconds_left % 86400;
								hours = pad( parseInt(seconds_left / 3600) );
								seconds_left = seconds_left % 3600;
								minutes = pad( parseInt(seconds_left / 60) );
								seconds = pad( parseInt( seconds_left % 60 ) );
								countdown.innerHTML = '<span>'+days+':</span><span>' + hours + ':</span><span>' + minutes + ':</span><span>' + seconds + '</span>';
							}
							else
								location.reload();
					}
					function pad(n) {
						return (n < 10 ? '0' : '') + n;
					}
					</script>";
				}
				else if($start_time <= $present_time && $present_time<= $stop_time) {
					$_SESSION['show']="yes";
					shell_exec("chmod 777 -R Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/*.*");
					$interval  = $stop_time - $present_time;
					$sec   = round($interval);
					/*jquery for time*/
					echo "<input type='hidden' id='set-time' value='$sec'/>
								<div id='countdown' style='font: normal 13px/20px Arial, Helvetica,sans-serif;'>
					  			<div id='tiles' class='color-full'></div>
					  			<div class='countdown-label'>Contest ends in</div>
								</div>";
					echo "<script src='jquery-1.9.1.min.js' type='text/javascript'></script>";
					echo "<script type='text/javascript'>
					var sec = $( '#set-time' ).val();
					var target_date = new Date().getTime() + ((sec) * 1000);
					var time_limit = ((sec) * 1000);
					/*setTimeout(
						function()
						{
							location.reload();
						}, time_limit );*/
					var days, hours, minutes, seconds;
					var countdown = document.getElementById('tiles');
					getCountdown();
					setInterval(function () { getCountdown(); }, 1000);
					function getCountdown(){
							var current_date = new Date().getTime();
							var seconds_left = (target_date - current_date) / 1000;
							if ( seconds_left >= 0 )
							{
								console.log(time_limit);
								 if ( (seconds_left * 1000 ) < ( time_limit / 2 ) )  {
									 $( '#tiles' ).removeClass('color-full');
									 $( '#tiles' ).addClass('color-half');
									}
									if ( (seconds_left * 1000 ) < ( time_limit / 4 ) )  {
										$( '#tiles' ).removeClass('color-half');
										$( '#tiles' ).addClass('color-empty');
									}
								days = pad( parseInt(seconds_left / 86400) );
								seconds_left = seconds_left % 86400;
								hours = pad( parseInt(seconds_left / 3600) );
								seconds_left = seconds_left % 3600;
								minutes = pad( parseInt(seconds_left / 60) );
								seconds = pad( parseInt( seconds_left % 60 ) );
								countdown.innerHTML = '<span>'+days+':</span><span>' + hours + ':</span><span>' + minutes + ':</span><span>' + seconds + '</span>';
							}
							else
								location.reload();
					}
					function pad(n) {
						return (n < 10 ? '0' : '') + n;
					}
					</script>";
				}
				else {
					$_SESSION['show']="no";
					shell_exec("chmod 000 -R Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/*.*");
					echo "<div id='countdown' style='font: normal 13px/20px Arial, Helvetica,sans-serif;'>
					  			<div id='tiles' class='color-empty'></div>
					  			<div class='countdown-label'>Contest completed</div>
								</div>";
				}
			}
		?>
		<div id="section" style="height: 1800px;">
			<?php
				$start_file = fopen("$@!1start.txt","r");
				$start_time = strtotime(fread($start_file,filesize("$@!1start.txt")));
				fclose($start_file);
				$stop_file = fopen("$@!1stop.txt","r");
				$stop_time = strtotime(fread($stop_file,filesize("$@!1stop.txt")));
				fclose($stop_file);
				$present_time = strtotime(date("Y-m-d\TH:i:s"));
				$servername = "127.0.0.1";
				$username = "root";
				$password = "$@!Sai5171";
				$database = "codejudge";
				$con = mysqli_connect($servername, $username, $password,$database);
				$result = mysqli_query($con,"SELECT * FROM problems");
				mysqli_close($con);
				$count=mysqli_num_rows($result);
				if( $count == 0 ) {
					echo "<h3>Contest not yet created </h3>";
				}
				else if($present_time < $start_time) {
					echo "<h3>Problems will be displayed once the contest starts</h3>";
				}
				else if($present_time>=$start_time && $present_time<=$stop_time){
					echo "<h3>Contest Problems</h3>";
					echo "<p style='padding:0px 0px 0px 20px;'>Note :- click on problem name to view problem statement</p>";
				}
				else {
					echo "<h3>Contest completed</h3>";
				}
			?>
			<br>
			<br>
			<br>
			<table style="width:100%" align="center" class="problem_list table sortable table-responsive table-kattis center table-hover table-multiple-head-rows table-compact">
			<tr>
				<?php
				if($_SESSION['show']=="yes")
				{
					echo "<th style='border-top:0.1px solid #eee;'>Problem Id</th>";
					echo "<th style='border-top:0.1px solid #eee;'>Problem Name</th>";
					echo "<th style='border-top:0.1px solid #eee;'>Time Limit</th>";
					echo "<th style='border-top:0.1px solid #eee;'>Submit</th>";
				}
				?>
			</tr>
			<?php
				$servername = "127.0.0.1";
				$username = "root";
				$password = "$@!Sai5171";
				$database = "codejudge";
				$con = mysqli_connect($servername, $username, $password,$database);
				$result = mysqli_query($con,"SELECT * FROM problems");
				if($_SESSION['show']=="yes")
				{
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
						$pb_id=$row['pb_id'];
						echo "<td>".$row['pb_id']."</td>";
						echo "<td style='text-align:left;'><a href='/contest/$pb_id' target='f1'>".$row['pb_name']."</a></td>";
						echo "<td style='text-align:left;'>".$row['time']."</td>";
						$email = $_SESSION['email'];
						$result1 = mysqli_query($con,"SELECT * FROM standings where email='$email'");
						$row1 = mysqli_fetch_assoc($result1);
						if($row1[$pb_id.'_co']!=-1)
							echo "<td><a style='color:#555;background:#AAE2AB no-repeat center/32px url(check.svg);' href='./compile_arena?contestid=$pb_id' class='btn btn-default'>Submit</a></td>";
						else if($row1[$pb_id.'_wr']!=0)
							echo "<td><a style='color:#898992;background:#FFE3E3' href='./compile_arena?contestid=$pb_id' class='btn btn-default'>Submit</a></td>";
						else
							echo "<td><a style='color:#555' href='./compile_arena?contestid=$pb_id' class='btn btn-default'>Submit</a></td>";
						echo "</tr>";
					}
				}
				mysqli_close($con);
			?>
			</table>
			<br><br><br>
			<iframe frameborder="0" align="middle" name="f1" width="1120px" height="1195px" ></iframe>
		</div>
		<div style="padding: 75px 0px 0px 0px;"></div>
		<div class="footer" style="position: relative;bottom:0px;">
			<div style="position: relative;right: 0;bottom: 0;left: 0;height: 50px;background-color: #33333D;padding-top: 10px;padding-bottom: 10px;">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="footer-powered col-md-12" style="text-align:center;">
							<h4 style="display:inline;">Designed &amp; Developed by&nbsp;</h4>
							<h4 style="display:inline;"><a href="https://www.facebook.com/S5171" target="_blank">Sai Kiran</a></h4>
							<h4 style="display:inline;"><img src="sai.jpg" style="margin-top: -7px;height: 45px;width: 45px;border: 1px solid white;border-radius: 100%;"></h4>
							<span style="color:#CF494C;">&nbsp;|&nbsp;</span>
							<h4 style="display:inline;"><a href="" target="_blank">Edala Lokesh</a></h4>
							<h4 style="display:inline;"><img src="lokesh.jpg" style="margin-top: -7px;height: 45px;width: 45px;border: 1px solid white;border-radius: 100%;"></h4>
							<span style="color:#CF494C;">&nbsp;|&nbsp;</span>
							<h4 style="display:inline;"><a href="https://www.facebook.com/vedaprakash.cherukuru.5" target="_blank">Veda Prakash</a></h4>
							<h4 style="display:inline;"><img src="veda.jpg" style="margin-top: -7px;height: 45px;width: 45px;border: 1px solid white;border-radius: 100%;"></h4>
	          </div>
	        </div>
	      </div>
	    </div>
		</div>
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
