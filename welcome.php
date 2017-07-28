<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']=='codeit@vidyanikethan.asia')
		header("location: admin_resources");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<script type="text/javascript">
			//document.addEventListener('contextmenu', event => event.preventDefault());
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
			@font-face {
          font-family: "My custom Bahamas Font";
          src: url(Bahamas.ttf) format("truetype");
      }
      #login:focus {
        background-color: #DC6180;
        color: white;
      }
      h4 {
        font-size: 26px;
        letter-spacing: 2.5px;
        font-family: 'My custom Bahamas Font';
        text-align: center;
      }
      p {
        text-align: center;
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
		<div id="section" style="height: 1000px;">
        <div class="row">
          <div class="col-sm-12">
            <h4>SREE VIDYANIKETHAN ENGINEERING COLLEGE</h4>
            <p>Dept. of Computer Science and Engineering</p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-6">
            <img src="codeitt.jpg" height="150" width="150" style="margin-left: auto;margin-right: auto;display: block;">
          </div>
          <div class="col-sm-3">
          </div>
        </div>
				<div class="row">
					<p style="text-align: justify;padding:15px 15px 0px 15px;">The <b>CODEIT-Hackathon</b> aims at providing a non-commercial platform for budding engineers to showcase their programming and debugging skills. This contest is organized with a hope to push future Indian software developers to become a pioneer in the industry. </p>
					<p style="color: #CF494C;"><i><b>CODEIT-Hackathon can kick-start young people’s ambition and motivation.</b></i></p>
					<p style="color: #CF494C;text-align: right;padding: 0px 100px 0px 0px;"><b>-HOD, CSE-SVEC</b><p>
					<hr>
					<p style="text-align: justify;padding: 15px 15px 0px 15px;font-size: 14px;"><b><i>Directions:-</i></b><br>
1) Please click on "CONTEST" tab where you can glance counting time.<br>
2) Please click on "Join Contest" button and wait until contest gets started.<br>
3) A list of problems will be displayed on the same page and you can see "Submit" button on the right side for each problem.<br>
4) Click on any problem, Concern problem statement will be displayed on the same page in pdf format just scroll down to see it.<br>
5) In order to build code kindly click on submit button, you will be directed to "COMPILE ARENA" page where you can write/edit code exclusively in C & C++ only.<br>
6) You also have a feasibility to check your code against your own test cases by clicking "RUN" button and enter test cases manually.<br>
7) In order to final submit kindly enter "PROBLEM ID" in the box and click on submit button. Remember your code will be tested against 100+ test cases by the inbuilt compiler.<br>
8) ERRORS MAY OCCUR DUE TO:-<br>
                    <span style='padding: 0px 0px 0px 100px;'>a) Wrong answer</span><br>
                    <span style='padding: 0px 0px 0px 100px;'>b) Runtime error</span><br>
                    <span style='padding: 0px 0px 0px 100px;'>c) Time limit Exceeded</span><br>
                    <span style='padding: 0px 0px 0px 100px;'>d) Memory limit exceeded</span><br>
                    <span style='padding: 0px 0px 0px 100px;'>e) Compile error</span><br>
9) In order to see your submission ranking, Click on "STANDINGS" tab.<br>
</p><br>
<p style='text-align: center;'>ALL THE BEST AND ENJOY CODING!!!!</p>
				</div>
      </div>
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
