<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']!='codeit@vidyanikethan.asia')
		header("location: practice");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Practice</title>
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
		<div id="section" style="height: 1700px;">
			<?php
				$email =$_SESSION['email'];
				echo "<input type='hidden' id='email' value='$email'></input>";
			?>
			<button style='margin-top:20px;float:right;' type="submit" class="btn btn-default" name="register_btn" id='rank'>Ranklist</button>
			<button style='margin-right:20px;margin-top:20px;float:right;' type="submit" class="btn btn-default" name="register_btn" id='submissions'>My Submissions</button>
			<h3>Practice Problems</h3>
			<p style='padding:0px 0px 0px 20px;'>Note :- click on problem name to view problem statement</p><br>
			<!---->
			<?php
				echo "<table style='width:100%' align='center' class='problem_list table sortable table-responsive table-kattis center table-hover table-multiple-head-rows table-compact'>";
				if(isset($_GET['page']))
					$page = $_GET['page'];
				else
					$page = 0;
				echo "<tr>";
				echo "<th style='border-top:0.1px solid #eee;' width='15%'>Problem Id</th>";
				echo "<th style='border-top:0.1px solid #eee;' width='35'>Problem Name</th>";
				echo "<th style='border-top:0.1px solid #eee;' width='15%'>Time Limit</th>";
				echo "<th style='border-top:0.1px solid #eee;' width='15%'>Score</th>";
				echo "<th style='border-top:0.1px solid #eee;' width='20%'>Submit</th>";
				echo "</tr>";
				$servername = "127.0.0.1";
				$username = "root";
				$password = "$@!Sai5171";
				$database = "codejudge";
				$con = mysqli_connect($servername, $username, $password,$database);
				$limit = 3;
				$offset = $page*$limit;
				$result = mysqli_query($con,"SELECT * FROM practice ORDER BY dlevel ASC, pb_id ASC LIMIT $limit OFFSET $offset");
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					$pb_id=$row['pb_id'];
					echo "<td>".$row['pb_id']."</td>";
					echo "<td style='text-align:left;'><a href='/practice/$pb_id' target='_blank'>".$row['pb_name']."</a></td>";
					echo "<td style='text-align:left;'>".$row['time']."</td>";
					echo "<td style='text-align:left;'>".$row['dlevel']."</td>";
					$email = $_SESSION['email'];
					$result1 = mysqli_query($con,"SELECT * FROM score where email='$email' and pb_id='$pb_id'");
					$row1 = mysqli_fetch_assoc($result1);
					$count = mysqli_num_rows($result1);
					if($row1['score']>0)
						echo "<td><a style='color:#555;background:#AAE2AB no-repeat center/32px url(check.svg);' href='./admin_compile_arena?practiceid=$pb_id' class='btn btn-default'>Submit</a></td>";
					else if($count!=0)
						echo "<td><a style='color:#898992;background:#FFE3E3' href='./admin_compile_arena?practiceid=$pb_id' class='btn btn-default'>Submit</a></td>";
					else
						echo "<td><a style='color:#898992' href='./admin_compile_arena?practiceid=$pb_id' class='btn btn-default'>Submit</a></td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<br><br>";
				if($page!=0)
				{
					$pre = $page - 1;
					echo "<a id='pre' href='/admin_practice?page=$pre' class='btn btn-default' style='height:36px;line-height:36px;border:1px solid #E7E7E8;float:left;cursor:pointer;color:#898992;' role='button'>Prev</a>";
				}
				$offset = ($page+1)*$limit;
				$result = mysqli_query($con,"SELECT * FROM practice ORDER BY dlevel ASC, pb_id ASC LIMIT $limit OFFSET $offset");
				$count=mysqli_num_rows($result);
				if($count!=0)
				{
					$next = $page + 1;
					echo "<a id='next' href='/admin_practice?page=$next' class='btn btn-default' style='height:36px;line-height:36px;border:1px solid #E7E7E8;float:right;cursor:pointer;color:#898992;' role='button'>Next</a>";
				}
				mysqli_close($con);
			?>
			<!---->
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
	$('#rank').click(function() {
		$('h3').html("Ranklist");
		$('p').hide();
		$('table').hide();
		$('#next').hide();
		$('#pre').hide();
		$.ajax({
			type : 'post',
			async : false,
			url : 'ranklist',
			success: function(output){
				$('table').css("width","75%");
				$('table').html(output);
				$('table').show();
				$('#section').css({"height":$('table').height()+700});
			}
		});
	});
	$('#submissions').click(function() {
		$('h3').html("My Submissions");
		$('p').html("");
		$('table').hide();
		$('#next').hide();
		$('#pre').hide();
		$.ajax({
			type : 'post',
			async : false,
			url : 'mysubmissions',
			success: function(output){
				$('table').css("width","75%");
				$('table').html(output);
				$('table').show();
			}
		});
	});
</script>
