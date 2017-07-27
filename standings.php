<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']=='codeit@vidyanikethan.asia')
		header("location: admin_standings");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Standings</title>
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
				<li style="float:left;padding: 0px 0px 0px 10%;"><a class="list_hover" href="/resources">RESOURCES</a></li>
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
			$count=mysqli_num_rows($result);
			if($count==0)
			{
				//echo "<div  id='section' style='height: 50px;background-color: #f2dede;border-color: #ebccd1;padding: 10px 10px 10px 20px;'>"."<strong style='text-align: center;color: #a94442;line-height: 26px;font-size: 16px;font-family:'My Custom Font';'>Contest not yet created</strong>"."</div>";
        echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
          echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
          <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
          <strong>"."Contest not yet created"."</strong>
          </div>";
        echo "</div>";
			}
		?>
		<div id="section" style="height: 100px;">
			<h3>Standings</h3>
			<?php
				$servername = "127.0.0.1";
				$username = "root";
				$password = "$@!Sai5171";
				$database = "codejudge";
				$con = mysqli_connect($servername, $username, $password,$database);
				$result = mysqli_query($con,"SELECT * FROM standings");
				$count=mysqli_num_rows($result);
				if($count!=0)
				echo "
				<table style='width:100%;' align='center' class='problem_list table sortable table-responsive table-kattis center table-hover table-multiple-head-rows table-compact'>
				<tr style='height:50px;'>
					<th style='border-top:0.1px solid #eee;' width='1%'>RK</th>
					<th style='border-top:0.1px solid #eee;text-align:center;' width='40%'>Email</th>
					<th style='border-top:0.1px solid #eee;' width='3%'>SLV.</th>
					<th style='border-top:0.1px solid #eee;' width='3%'>Time</th>
					<th style='border-top:0.1px solid #eee;'><a>A</a></th>
					<th style='border-top:0.1px solid #eee;'><a>B</a></th>
					<th style='border-top:0.1px solid #eee;'><a>C</a></th>
					<th style='border-top:0.1px solid #eee;'><a>D</a></th>
					<th style='border-top:0.1px solid #eee;'><a>E</a></th>
					<th style='border-top:0.1px solid #eee;'><a>F</a></th>
					<th style='border-top:0.1px solid #eee;'><a>G</a></th>
				</tr>
				";
				$result = mysqli_query($con,"SELECT * FROM standings ORDER BY score DESC,penalty ASC;");
				$i=1;
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr style='height:50px;'>";
					$email=$row['email'];
					$temp = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users where email='$email';"));
					$nick = $temp['nick'];
					$score=$row['score'];
					$penalty=$row['penalty'];
					$A_wr=$row['A_wr'];
					$A_co=$row['A_co'];
				  $B_wr=$row['B_wr'];
				  $B_co=$row['B_co'];
					$C_wr=$row['C_wr'];
					$C_co=$row['C_co'];
					$D_wr=$row['D_wr'];
					$D_co=$row['D_co'];
					$E_wr=$row['E_wr'];
					$E_co=$row['E_co'];
					$F_wr=$row['F_wr'];
					$F_co=$row['F_co'];
					$G_wr=$row['G_wr'];
					$G_co=$row['G_co'];
					echo "<td>".$i."</td>";
					$i++;
					echo "<td style='text-align:left'><span style='color:#4E92D0';>".$email."</span><span style='float:right'> - $nick</span></td>";
					echo "<td>".$score."</td>";
					echo "<td>".$penalty."</td>";
					if($A_co!=-1)//A_correct
					{
						$A_wr++;
						echo "<td style='background-color:rgb(170,226,171);background-image: url(check.svg);background-repeat:no-repeat;background-position:center;background-size:55px 35px;'><small>".$A_wr."<br>".$A_co."</small></td>";
					}
					else//A_wrong
					{
						if($A_wr==0)
							echo "<td></td>";
						else
							echo "<td style='background-color:rgb(246,123,81);background-image: url(cross.svg);background-repeat:no-repeat;background-position:center;background-size:45px 35px;'><span style='color:white;'><small>".$A_wr."<br>--</small></span></td>";
					}
					if($B_co!=-1)//B_correct
					{
						$B_wr++;
						echo "<td style='background-color:rgb(170,226,171);background-image: url(check.svg);background-repeat:no-repeat;background-position:center;background-size:55px 35px;'><small>".$B_wr."<br>".$B_co."</small></td>";
					}
					else//B_wrong
					{
						if($B_wr==0)
							echo "<td></td>";
						else
							echo "<td style='background-color:rgb(246,123,81);background-image: url(cross.svg);background-repeat:no-repeat;background-position:center;background-size:45px 35px;'><span style='color:white;'><small>".$B_wr."<br>--</small></span></td>";
					}
					if($C_co!=-1)//C_correct
					{
						$C_wr++;
						echo "<td style='background-color:rgb(170,226,171);background-image: url(check.svg);background-repeat:no-repeat;background-position:center;background-size:55px 35px;'><small>".$C_wr."<br>".$C_co."</small></td>";
					}
					else//C_wrong
					{
						if($C_wr==0)
							echo "<td></td>";
						else
							echo "<td style='background-color:rgb(246,123,81);background-image: url(cross.svg);background-repeat:no-repeat;background-position:center;background-size:45px 35px;'><span style='color:white;'><small>".$C_wr."<br>--</small></span></td>";
					}
					if($D_co!=-1)//D_correct
					{
						$D_wr++;
						echo "<td style='background-color:rgb(170,226,171);background-image: url(check.svg);background-repeat:no-repeat;background-position:center;background-size:55px 35px;'><small>".$D_wr."<br>".$D_co."</small></td>";
					}
					else//D_wrong
					{
						if($D_wr==0)
							echo "<td></td>";
						else
							echo "<td style='background-color:rgb(246,123,81);background-image: url(cross.svg);background-repeat:no-repeat;background-position:center;background-size:45px 35px;'><span style='color:white;'><small>".$D_wr."<br>--</small></span></td>";
					}
					if($E_co!=-1)//E_correct
					{
						$E_wr++;
						echo "<td style='background-color:rgb(170,226,171);background-image: url(check.svg);background-repeat:no-repeat;background-position:center;background-size:55px 35px;'><small>".$E_wr."<br>".$E_co."</small></td>";
					}
					else//E_wrong
					{
						if($E_wr==0)
							echo "<td></td>";
						else
							echo "<td style='background-color:rgb(246,123,81);background-image: url(cross.svg);background-repeat:no-repeat;background-position:center;background-size:45px 35px;'><span style='color:white;'><small>".$E_wr."<br>--</small></span></td>";
					}
					if($F_co!=-1)//F_correct
					{
						$F_wr++;
						echo "<td style='background-color:rgb(170,226,171);background-image: url(check.svg);background-repeat:no-repeat;background-position:center;background-size:55px 35px;'><small>".$F_wr."<br>".$F_co."</small></td>";
					}
					else//F_wrong
					{
						if($F_wr==0)
							echo "<td></td>";
						else
							echo "<td style='background-color:rgb(246,123,81);background-image: url(cross.svg);background-repeat:no-repeat;background-position:center;background-size:45px 35px;'><span style='color:white;'><small>".$F_wr."<br>--</small></span></td>";
					}
					if($G_co!=-1)//G_correct
					{
						$G_wr++;
						echo "<td style='background-color:rgb(170,226,171);background-image: url(check.svg);background-repeat:no-repeat;background-position:center;background-size:55px 35px;'><small>".$G_wr."<br>".$G_co."</small></td>";
					}
					else//G_wrong
					{
						if($G_wr==0)
							echo "<td></td>";
						else
							echo "<td style='background-color:rgb(246,123,81);background-image: url(cross.svg);background-repeat:no-repeat;background-position:center;background-size:45px 35px;'><span style='color:white;'><small>".$G_wr."<br>--</small></span></td>";
					}
					echo "</tr>";
				}
			?>
			</table>
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
	$('#section').css({"height":$('table').height()+100});
</script>
