<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']!='codeit@vidyanikethan.asia')
		header("location: standings");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contest Submissions</title>
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
		<link rel="stylesheet" type="text/css" href="main2.css">
		<link rel="stylesheet" type="text/css" href="logo.css">
		<style>
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

			/*
			.dropdown:hover .dropdown-content {
					display: block;
					cursor: pointer;
			}*/
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
				<li style="float:left;padding: 0px 0px 0px 10%;"><a class="list_hover" href="/admin">ADMIN</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_users">USERS</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_resources">RESOURCES</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_discuss">DISCUSS</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_practice">PRACTICE</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_contest">CONTEST</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_standings">STANDINGS</a></li>
        <li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_contest_submissions">SUBMISSIONS</a></li>
				<li style="float:left;padding: 0px 0px 0px 0px;"><a class="list_hover" href="/admin_compile_arena">COMPILE ARENA</a></li>
				<li style="float:right;padding:0px 15% 0px 0px;">
					<div class="dp" onclick="myFunction()"></div>
					<div class="dropdown">
						<div id="myDropdown" class="dropdown-content">
							<a href="/admin_profile">SETTINGS</a>
							<a href="/logout">LOGOUT</a>
						</div>
					</div>
				</li>
			</ul>
		</nav>
		</div>
		<div style="padding: 75px 0px 0px 0px;"></div>
		<div id="section" style="height: 700px;width: 80vw;">
			<h3>Contest Submissions</h3>
      <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "$@!Sai5171";
        $database = "codejudge";
        $con = mysqli_connect($servername, $username, $password,$database);
        $result = mysqli_query($con,"SELECT * FROM contest_submissions");
        mysqli_close($con);
        echo "<table style='width:100%;' align='center' class='problem_list table sortable table-responsive table-kattis center table-hover table-multiple-head-rows table-compact'>";
        echo "
        <tr>
					<th style='border-top:0.1px solid #eee;' width='10%'>S.No.</th>
					<th style='border-top:0.1px solid #eee;text-align:center;' width='30%'>Email</th>
					<th style='border-top:0.1px solid #eee;' width='30%'>Submissions</th>
					<th style='border-top:0.1px solid #eee;' width='20%'>Result</th>
				</tr>";
        $i=1;
        while($row = mysqli_fetch_assoc($result))
        {
          echo "
          <tr style='height:50px;'>

  					<td>".$i++."</td>

  					<td style='text-align:left;'><span style='color:#4E92D0';>".$row['email']."</span></td>

  					<td style='text-align:left;'>";
            for($j=1;$j<=$row['success'];$j++) {
              echo "<img title='Test case ".$j."/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;margin:0px 0px 0px 3px;' src='check.svg'>";
            }
            if($row['status']=="Accepted")
              echo "<img title='Test case ".($row['success']+1)."/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;margin:0px 0px 0px 3px;' src='check.svg'>";
            else if($row['status']=="Wrong Answer")
              echo "<img title='Test case ".($row['success']+1)."/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;margin:0px 0px 0px 3px;' src='cross.svg'>";
            else if($row['status']=="Run Time Error")
              echo "<img title='Test case ".($row['success']+1)."/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;margin:0px 0px 0px 3px;' src='cross.svg'>";
            else if($row['status']=="Time Limit Exceeded")
              echo "<img title='Test case ".($row['success']+1)."/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;margin:0px 0px 0px 3px;' src='cross.svg'>";
            echo "
            </td>";

            if($row['status']=="Accepted")
              echo "<td style='text-align:left;color:rgb(53,189,64);'>Accepted</td>";
            else if($row['status']=="Wrong Answer")
              echo "<td style='text-align:left;color:rgb(242,7,7);'>Wrong Answer</td>";
            else if($row['status']=="Run Time Error")
              echo "<td style='text-align:left;color:rgb(242,7,7);'>Run Time Error</td>";
            else if($row['status']=="Time Limit Exceeded")
              echo "<td style='text-align:left;color:rgb(242,7,7);'>Time Limit Exceeded</td>";

          echo "
  				</tr>
          ";
        }
        echo "</table>";
      ?>
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
<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
  $('#section').css({"height":$('table').height()+100});
</script>
