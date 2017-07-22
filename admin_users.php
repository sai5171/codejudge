<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']!='codeit@vidyanikethan.asia')
		header("location: resources");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Users</title>
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
			<h3>Users</h3>
      <?php
				echo "<table style='width:100%' align='center' class='problem_list table sortable table-responsive table-kattis center table-hover table-multiple-head-rows table-compact'>";
				if(isset($_GET['page']))
					$page = $_GET['page'];
				else
					$page = 0;
				echo "<tr>";
				echo "<th style='border-top:0.1px solid #eee;' width='20%'>Date</th>";
				echo "<th style='border-top:0.1px solid #eee;' width='30%'>Email</th>";
				echo "<th style='border-top:0.1px solid #eee;' width='15%'>Reference Id</th>";
        echo "<th style='border-top:0.1px solid #eee;' width='15%'>Challan</th>";
        echo "<th style='border-top:0.1px solid #eee;' width='20%'>Status</th>";
				echo "</tr>";
				$servername = "127.0.0.1";
				$username = "root";
				$password = "$@!Sai5171";
				$database = "codejudge";
				$con = mysqli_connect($servername, $username, $password,$database);
				$limit = 10;
				$offset = $page*$limit;
				$result = mysqli_query($con,"SELECT * FROM users order by date desc LIMIT $limit OFFSET $offset");
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr height='50px;'>";
					echo "<td style='text-align:left;'>".$row['date']."</td>";
					echo "<td style='text-align:left;'>".$row['email']."</td>";
          echo "<td style='text-align:left;'>".$row['prid']."</td>";
          if($row['scbc']!="")
            echo "<td><a href=\"data:image/jpeg;base64,".base64_encode( $row['scbc'] )."\" download='".$row['email'].".jpeg'>Download</a></td>";
          else
            echo "<td></td>";
          if($row['status']=="-1") {
            echo "<td style='text-align:center;'>Not Paid</td>";
          }
          else if($row['status']=="1") {
            echo "<td style='text-align:center;'>Paid</td>";
          }
          else {
            echo "
            <td style='text-align:center;'>
              <a style='color:#898992;' onclick='not_paid(this);' onMouseOver=\"this.style.cursor='pointer'\" class='btn btn-default'>Not Paid</a>
              <a style='color:#898992;' onclick='paid(this);' onMouseOver=\"this.style.cursor='pointer'\" class='btn btn-default'>Paid</a>
            </td>";
          }
          echo "</tr>";
        }
        echo "</table>";
				if($page!=0)
				{
					$pre = $page - 1;
					echo "<a id='pre' href='/admin_users?page=$pre' class='btn btn-default' style='height:36px;line-height:36px;border:1px solid #E7E7E8;float:left;cursor:pointer;color:#898992;' role='button'>Prev</a>";
				}
				$offset = ($page+1)*$limit;
				$result = mysqli_query($con,"SELECT * FROM users order by date desc LIMIT $limit OFFSET $offset");
				$count=mysqli_num_rows($result);
				if($count!=0)
				{
					$next = $page + 1;
					echo "<a id='next' href='/admin_users?page=$next' class='btn btn-default' style='height:36px;line-height:36px;border:1px solid #E7E7E8;float:right;cursor:pointer;color:#898992;' role='button'>Next</a>";
				}
			?>
		</div>
		<div style="padding: 75px 0px 0px 0px;"></div>
		<div class="footer" style="position: relative;bottom:0px;">
		</div>
	</body>
</html>
<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
  function not_paid(that) {
    var email =  jQuery(that).parent().parent().children(':nth-child(1)').html();
    var val = "-1";
    $.post( "admin_users_s", { email : email , val : val } );
    jQuery(that).parent().html("Not Paid");
  }
  function paid(that) {
    var email =  jQuery(that).parent().parent().children(':nth-child(1)').html();
    var val = "1";
    $.post( "admin_users_s", { email : email , val : val } );
    jQuery(that).parent().html("Paid");
  }
</script>
