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
		<title>Admin</title>
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
		<?php
			if(isset($_SESSION['problem_message']))
			{
				//echo "<div  id='section' style='height: 50px;background-color: #f2dede;border-color: #ebccd1;padding: 10px 10px 10px 20px;'>"."<strong style='text-align: center;color: #a94442;line-height: 26px;font-size: 16px;font-family:'My Custom Font';'>".$_SESSION['problem_message']."</strong>"."</div>";
				if($_SESSION['problem_message']=="All contest problems, inputs and outputs uploaded successfully")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['problem_message']."</strong>
            </div>";
          echo "</div>";
        }
				else if($_SESSION['problem_message']=="All contest problems, inputs and outputs deleted successfully")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['problem_message']."</strong>
            </div>";
          echo "</div>";
        }
				else if($_SESSION['problem_message']=="Start time updated successfully")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['problem_message']."</strong>
            </div>";
          echo "</div>";
        }
				else if($_SESSION['problem_message']=="Stop time updated successfully")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['problem_message']."</strong>
            </div>";
          echo "</div>";
        }
        else if($_SESSION['problem_message']=="Stop time should be ahead of start time")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['problem_message']."</strong>
            </div>";
          echo "</div>";
        }
				else if($_SESSION['problem_message']=="Practice problem, time limit, difficulty level, inputs and outputs uploaded successfully")
				{
					echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['problem_message']."</strong>
            </div>";
          echo "</div>";
				}
				else if($_SESSION['problem_message']=="Practice problem ID should be unique")
				{
					echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
						echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
						<a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
						<strong>".$_SESSION['problem_message']."</strong>
						</div>";
					echo "</div>";
				}
				unset($_SESSION['problem_message']);
			}
		?>
		<div id="section" style="height: 2100px;width: 80vw;">
			<h3 id="headings">Add contest problems</h3>
			<br>
			<br>
			<br>
			<form name="form1" action="admin_s" method="post" enctype="multipart/form-data">
			<table style="width: 100%;" align="center" class="problem_list table sortable table-responsive table-kattis center table-hover table-multiple-head-rows table-compact">
				<tr>
					<th style="border-top:0.1px solid #eee;" width="5%">Id</th>
					<th style="border-top:0.1px solid #eee;" width="15%">Name</th>
					<th style="border-top:0.1px solid #eee;" width="5%">Pdf</th>
					<th style="border-top:0.1px solid #eee;" width="15%">Time Limit</th>
					<th style="border-top:0.1px solid #eee;" width="30%">Inputs</th>
					<th style="border-top:0.1px solid #eee;" width="30%">Outputs</th>
				</tr>
				<!--1st row-->
				<tr>
					<td>
						<input style="width: 50px;" name="pbn1" type="text" class="form-control" maxlength="1" placeholder="PN1">
					</td>
					<td>
						<input style="width: 175px;" name="prname1" type="text" class="form-control" maxlength="25" placeholder="Problem Name 1">
					</td>
					<td>
						<input type="file" name="file-pdf1" id="file-pdf1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-pdf1l" for="file-pdf1"><span style="overflow: hidden;">Choose a pdf file_01</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="tl1" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input type="file" name="file-1i1" id="file-1i1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i1l" for="file-1i1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-1i2" id="file-1i2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i2l" for="file-1i2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-1i3" id="file-1i3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i3l" for="file-1i3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-1i4" id="file-1i4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i4l" for="file-1i4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-1i5" id="file-1i5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i5l" for="file-1i5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-1i6" id="file-1i6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i6l" for="file-1i6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-1i7" id="file-1i7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i7l" for="file-1i7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-1i8" id="file-1i8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i8l" for="file-1i8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-1i9" id="file-1i9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i9l" for="file-1i9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-1i10" id="file-1i10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i10l" for="file-1i10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-1i11" id="file-1i11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i11l" for="file-1i11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-1i12" id="file-1i12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1i12l"for="file-1i12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-1o1" id="file-1o1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o1l" for="file-1o1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-1o2" id="file-1o2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o2l" for="file-1o2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-1o3" id="file-1o3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o3l" for="file-1o3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-1o4" id="file-1o4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o4l" for="file-1o4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-1o5" id="file-1o5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o5l" for="file-1o5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-1o6" id="file-1o6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o6l" for="file-1o6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-1o7" id="file-1o7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o7l" for="file-1o7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-1o8" id="file-1o8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o8l" for="file-1o8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-1o9" id="file-1o9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o9l" for="file-1o9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-1o10" id="file-1o10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o10l" for="file-1o10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-1o11" id="file-1o11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o11l" for="file-1o11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-1o12" id="file-1o12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1o12l" for="file-1o12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<!--2st row-->
				<tr>
					<td>
						<input style="width: 50px;" name="pbn2" type="text" class="form-control" maxlength="1" placeholder="PN2">
					</td>
					<td>
						<input style="width: 175px;" name="prname2" type="text" class="form-control" maxlength="25" placeholder="Problem Name 2">
					</td>
					<td>
						<input type="file" name="file-pdf2" id="file-pdf2" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-pdf2l" for="file-pdf2"><span style="overflow: hidden;">Choose a pdf file_02</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="tl2" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input type="file" name="file-2i1" id="file-2i1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i1l" for="file-2i1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-2i2" id="file-2i2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i2l" for="file-2i2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-2i3" id="file-2i3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i3l" for="file-2i3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-2i4" id="file-2i4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i4l" for="file-2i4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-2i5" id="file-2i5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i5l" for="file-2i5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-2i6" id="file-2i6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i6l" for="file-2i6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-2i7" id="file-2i7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i7l" for="file-2i7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-2i8" id="file-2i8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i8l" for="file-2i8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-2i9" id="file-2i9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i9l" for="file-2i9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-2i10" id="file-2i10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i10l" for="file-2i10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-2i11" id="file-2i11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i11l" for="file-2i11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-2i12" id="file-2i12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2i12l"for="file-2i12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-2o1" id="file-2o1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o1l" for="file-2o1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-2o2" id="file-2o2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o2l" for="file-2o2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-2o3" id="file-2o3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o3l" for="file-2o3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-2o4" id="file-2o4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o4l" for="file-2o4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-2o5" id="file-2o5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o5l" for="file-2o5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-2o6" id="file-2o6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o6l" for="file-2o6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-2o7" id="file-2o7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o7l" for="file-2o7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-2o8" id="file-2o8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o8l" for="file-2o8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-2o9" id="file-2o9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o9l" for="file-2o9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-2o10" id="file-2o10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o10l" for="file-2o10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-2o11" id="file-2o11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o11l" for="file-2o11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-2o12" id="file-2o12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-2o12l" for="file-2o12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<!--3st row-->
				<tr>
					<td>
						<input style="width: 50px;" name="pbn3" type="text" class="form-control" maxlength="1" placeholder="PN3">
					</td>
					<td>
						<input style="width: 175px;" name="prname3" type="text" class="form-control" maxlength="25" placeholder="Problem Name 3">
					</td>
					<td>
						<input type="file" name="file-pdf3" id="file-pdf3" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-pdf3l" for="file-pdf3"><span style="overflow: hidden;">Choose a pdf file_03</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="tl3" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input type="file" name="file-3i1" id="file-3i1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i1l" for="file-3i1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-3i2" id="file-3i2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i2l" for="file-3i2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-3i3" id="file-3i3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i3l" for="file-3i3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-3i4" id="file-3i4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i4l" for="file-3i4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-3i5" id="file-3i5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i5l" for="file-3i5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-3i6" id="file-3i6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i6l" for="file-3i6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-3i7" id="file-3i7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i7l" for="file-3i7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-3i8" id="file-3i8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i8l" for="file-3i8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-3i9" id="file-3i9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i9l" for="file-3i9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-3i10" id="file-3i10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i10l" for="file-3i10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-3i11" id="file-3i11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i11l" for="file-3i11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-3i12" id="file-3i12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3i12l"for="file-3i12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-3o1" id="file-3o1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o1l" for="file-3o1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-3o2" id="file-3o2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o2l" for="file-3o2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-3o3" id="file-3o3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o3l" for="file-3o3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-3o4" id="file-3o4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o4l" for="file-3o4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-3o5" id="file-3o5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o5l" for="file-3o5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-3o6" id="file-3o6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o6l" for="file-3o6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-3o7" id="file-3o7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o7l" for="file-3o7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-3o8" id="file-3o8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o8l" for="file-3o8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-3o9" id="file-3o9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o9l" for="file-3o9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-3o10" id="file-3o10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o10l" for="file-3o10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-3o11" id="file-3o11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o11l" for="file-3o11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-3o12" id="file-3o12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-3o12l" for="file-3o12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<!--4st row-->
				<tr>
					<td>
						<input style="width: 50px;" name="pbn4" type="text" class="form-control" maxlength="1" placeholder="PN4">
					</td>
					<td>
						<input style="width: 175px;" name="prname4" type="text" class="form-control" maxlength="25" placeholder="Problem Name 4">
					</td>
					<td>
						<input type="file" name="file-pdf4" id="file-pdf4" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-pdf4l" for="file-pdf4"><span style="overflow: hidden;">Choose a pdf file_04</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="tl4" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input type="file" name="file-4i1" id="file-4i1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i1l" for="file-4i1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-4i2" id="file-4i2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i2l" for="file-4i2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-4i3" id="file-4i3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i3l" for="file-4i3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-4i4" id="file-4i4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i4l" for="file-4i4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-4i5" id="file-4i5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i5l" for="file-4i5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-4i6" id="file-4i6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i6l" for="file-4i6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-4i7" id="file-4i7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i7l" for="file-4i7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-4i8" id="file-4i8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i8l" for="file-4i8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-4i9" id="file-4i9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i9l" for="file-4i9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-4i10" id="file-4i10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i10l" for="file-4i10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-4i11" id="file-4i11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i11l" for="file-4i11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-4i12" id="file-4i12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4i12l"for="file-4i12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-4o1" id="file-4o1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o1l" for="file-4o1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-4o2" id="file-4o2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o2l" for="file-4o2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-4o3" id="file-4o3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o3l" for="file-4o3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-4o4" id="file-4o4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o4l" for="file-4o4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-4o5" id="file-4o5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o5l" for="file-4o5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-4o6" id="file-4o6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o6l" for="file-4o6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-4o7" id="file-4o7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o7l" for="file-4o7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-4o8" id="file-4o8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o8l" for="file-4o8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-4o9" id="file-4o9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o9l" for="file-4o9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-4o10" id="file-4o10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o10l" for="file-4o10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-4o11" id="file-4o11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o11l" for="file-4o11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-4o12" id="file-4o12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-4o12l" for="file-4o12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<!--5st row-->
				<tr>
					<td>
						<input style="width: 50px;" name="pbn5" type="text" class="form-control" maxlength="1" placeholder="PN5">
					</td>
					<td>
						<input style="width: 175px;" name="prname5" type="text" class="form-control" maxlength="25" placeholder="Problem Name 5">
					</td>
					<td>
						<input type="file" name="file-pdf5" id="file-pdf5" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-pdf5l" for="file-pdf5"><span style="overflow: hidden;">Choose a pdf file_05</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="tl5" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input type="file" name="file-5i1" id="file-5i1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i1l" for="file-5i1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-5i2" id="file-5i2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i2l" for="file-5i2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-5i3" id="file-5i3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i3l" for="file-5i3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-5i4" id="file-5i4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i4l" for="file-5i4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-5i5" id="file-5i5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i5l" for="file-5i5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-5i6" id="file-5i6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i6l" for="file-5i6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-5i7" id="file-5i7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i7l" for="file-5i7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-5i8" id="file-5i8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i8l" for="file-5i8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-5i9" id="file-5i9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i9l" for="file-5i9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-5i10" id="file-5i10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i10l" for="file-5i10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-5i11" id="file-5i11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i11l" for="file-5i11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-5i12" id="file-5i12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5i12l"for="file-5i12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-5o1" id="file-5o1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o1l" for="file-5o1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-5o2" id="file-5o2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o2l" for="file-5o2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-5o3" id="file-5o3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o3l" for="file-5o3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-5o4" id="file-5o4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o4l" for="file-5o4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-5o5" id="file-5o5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o5l" for="file-5o5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-5o6" id="file-5o6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o6l" for="file-5o6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-5o7" id="file-5o7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o7l" for="file-5o7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-5o8" id="file-5o8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o8l" for="file-5o8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-5o9" id="file-5o9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o9l" for="file-5o9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-5o10" id="file-5o10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o10l" for="file-5o10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-5o11" id="file-5o11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o11l" for="file-5o11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-5o12" id="file-5o12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-5o12l" for="file-5o12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<!--6st row-->
				<tr>
					<td>
						<input style="width: 50px;" name="pbn6" type="text" class="form-control" maxlength="1" placeholder="PN6">
					</td>
					<td>
						<input style="width: 175px;" name="prname6" type="text" class="form-control" maxlength="25" placeholder="Problem Name 6">
					</td>
					<td>
						<input type="file" name="file-pdf6" id="file-pdf6" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-pdf6l" for="file-pdf6"><span style="overflow: hidden;">Choose a pdf file_06</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="tl6" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input type="file" name="file-6i1" id="file-6i1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i1l" for="file-6i1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-6i2" id="file-6i2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i2l" for="file-6i2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-6i3" id="file-6i3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i3l" for="file-6i3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-6i4" id="file-6i4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i4l" for="file-6i4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-6i5" id="file-6i5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i5l" for="file-6i5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-6i6" id="file-6i6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i6l" for="file-6i6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-6i7" id="file-6i7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i7l" for="file-6i7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-6i8" id="file-6i8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i8l" for="file-6i8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-6i9" id="file-6i9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i9l" for="file-6i9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-6i10" id="file-6i10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i10l" for="file-6i10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-6i11" id="file-6i11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i11l" for="file-6i11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-6i12" id="file-6i12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6i12l"for="file-6i12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-6o1" id="file-6o1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o1l" for="file-6o1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-6o2" id="file-6o2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o2l" for="file-6o2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-6o3" id="file-6o3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o3l" for="file-6o3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-6o4" id="file-6o4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o4l" for="file-6o4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-6o5" id="file-6o5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o5l" for="file-6o5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-6o6" id="file-6o6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o6l" for="file-6o6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-6o7" id="file-6o7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o7l" for="file-6o7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-6o8" id="file-6o8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o8l" for="file-6o8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-6o9" id="file-6o9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o9l" for="file-6o9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-6o10" id="file-6o10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o10l" for="file-6o10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-6o11" id="file-6o11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o11l" for="file-6o11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-6o12" id="file-6o12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-6o12l" for="file-6o12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<!--7st row-->
				<tr>
					<td>
						<input style="width: 50px;" name="pbn7" type="text" class="form-control" maxlength="1" placeholder="PN7">
					</td>
					<td>
						<input style="width: 175px;" name="prname7" type="text" class="form-control" maxlength="25" placeholder="Problem Name 7">
					</td>
					<td>
						<input type="file" name="file-pdf7" id="file-pdf7" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-pdf7l" for="file-pdf7"><span style="overflow: hidden;">Choose a pdf file_07</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="tl7" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input type="file" name="file-7i1" id="file-7i1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i1l" for="file-7i1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-7i2" id="file-7i2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i2l" for="file-7i2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-7i3" id="file-7i3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i3l" for="file-7i3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-7i4" id="file-7i4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i4l" for="file-7i4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-7i5" id="file-7i5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i5l" for="file-7i5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-7i6" id="file-7i6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i6l" for="file-7i6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-7i7" id="file-7i7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i7l" for="file-7i7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-7i8" id="file-7i8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i8l" for="file-7i8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-7i9" id="file-7i9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i9l" for="file-7i9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-7i10" id="file-7i10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i10l" for="file-7i10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-7i11" id="file-7i11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i11l" for="file-7i11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-7i12" id="file-7i12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7i12l"for="file-7i12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-7o1" id="file-7o1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o1l" for="file-7o1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-7o2" id="file-7o2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o2l" for="file-7o2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-7o3" id="file-7o3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o3l" for="file-7o3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-7o4" id="file-7o4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o4l" for="file-7o4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-7o5" id="file-7o5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o5l" for="file-7o5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-7o6" id="file-7o6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o6l" for="file-7o6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-7o7" id="file-7o7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o7l" for="file-7o7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-7o8" id="file-7o8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o8l" for="file-7o8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-7o9" id="file-7o9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o9l" for="file-7o9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-7o10" id="file-7o10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o10l" for="file-7o10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-7o11" id="file-7o11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o11l" for="file-7o11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-7o12" id="file-7o12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-7o12l" for="file-7o12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><span>Upload all questions</span></td>
					<td><input style="border:none;background-color:rgb(170,226,171);" type="submit" class="btn btn-default" name="uploadall" id="uploadall" value="Upload All"></input></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><span>Delete all questions</span></td>
					<td><input style="border:none;background-color:rgb(246,123,81);" type="submit" class="btn btn-default" name="deleteall" id="deleteall" value="Delete All"></input></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><span>Contest Start Time</span></td>
					<td></td>
					<td><input style="width:225px;" name="start_time" type="datetime-local" step="1" class="form-control" value="<?php
					$start = fopen("$@!1start.txt","r");
					echo fread($start,filesize("$@!1start.txt"));
					fclose($start);
					?>"></td>
					<td><input style="width:196px;" type="submit" class="btn btn-default" name="updatestart" id="updatestart" value="Update Start"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><span>Contest Stop Time</span></td>
					<td></td>
					<td><input style="width:225px;" name="stop_time" type="datetime-local" step="1" class="form-control" value="<?php
					$stop = fopen("$@!1stop.txt","r");
					echo fread($stop,filesize("$@!1stop.txt"));
					fclose($stop);
					?>"></td>
					<td><input style="width:196px;" type="submit" class="btn btn-default" name="updatestop" id="updatestop" value="Update Stop"></td>
				</tr>
			</table>
			</form>
			<br><br><br>
			<h3 id="headings">Add practice problem</h3>
			<br>
			<br>
			<br>
			<form name="form1" action="admin_s" method="post" enctype="multipart/form-data">
				<table style="" align="center" class="problem_list table sortable table-responsive table-kattis center table-hover table-multiple-head-rows table-compact">
				<tr>
					<th style="border-top:0.1px solid #eee;" width="5%">Id</th>
					<th style="border-top:0.1px solid #eee;" width="5%">Name</th>
					<th style="border-top:0.1px solid #eee;" width="5%">Pdf</th>
					<th style="border-top:0.1px solid #eee;" width="5%">Time Limit</th>
					<th style="border-top:0.1px solid #eee;" width="5%">Difficulty Level</th>
					<th style="border-top:0.1px solid #eee;" width="35%">Inputs</th>
					<th style="border-top:0.1px solid #eee;" width="35%">Outputs</th>
				</tr>
				<!--1st row-->
				<tr>
					<td>
						<input style="width: 75px;" name="pcid" type="text" class="form-control" maxlength="10" placeholder="PC">
					</td>
					<td>
						<input style="width: 150px;" name="pcname" type="text" class="form-control" maxlength="25" placeholder="Problem Name">
					</td>
					<td>
						<input type="file" name="file-pdfpc1" id="file-pdfpc1" data-multiple-caption="{count} files selected" multiple />
						<label style="width:150px;" class="btn btn-default" id="file-pdfpc1l" for="file-pdfpc1"><span style="overflow: hidden;">Choose a pdf file</span></label>
					</td>
					<td>
						<input style="width: 60px;" name="pctl" min=1 max=30 type="number" class="form-control" placeholder="TL">
					</td>
					<td>
						<input style="width: 60px;" name="pcdl" min=1.0 max=10.0 type="number" step="0.1" class="form-control" placeholder="DL">
					</td>
					<td>
						<input type="file" name="file-1ipc1" id="file-1ipc1" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc1l" for="file-1ipc1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-1ipc2" id="file-1ipc2"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc2l" for="file-1ipc2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-1ipc3" id="file-1ipc3"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc3l" for="file-1ipc3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-1ipc4" id="file-1ipc4"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc4l" for="file-1ipc4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-1ipc5" id="file-1ipc5"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc5l" for="file-1ipc5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-1ipc6" id="file-1ipc6"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc6l" for="file-1ipc6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-1ipc7" id="file-1ipc7"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc7l" for="file-1ipc7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-1ipc8" id="file-1ipc8"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc8l" for="file-1ipc8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-1ipc9" id="file-1ipc9"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc9l" for="file-1ipc9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-1ipc10" id="file-1ipc10" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc10l" for="file-1ipc10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-1ipc11" id="file-1ipc11" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc11l" for="file-1ipc11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-1ipc12" id="file-1ipc12" data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1ipc12l"for="file-1ipc12"><span style="overflow: hidden;">12</span></label>
					</td>
					<td>
						<input type="file" name="file-1opc1" id="file-1opc1"  data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc1l" for="file-1opc1"><span style="overflow: hidden;">01</span></label>
						<input type="file" name="file-1opc2" id="file-1opc2"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc2l" for="file-1opc2"><span style="overflow: hidden;">02</span></label>
						<input type="file" name="file-1opc3" id="file-1opc3"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc3l" for="file-1opc3"><span style="overflow: hidden;">03</span></label>
						<input type="file" name="file-1opc4" id="file-1opc4"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc4l" for="file-1opc4"><span style="overflow: hidden;">04</span></label>
						<input type="file" name="file-1opc5" id="file-1opc5"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc5l" for="file-1opc5"><span style="overflow: hidden;">05</span></label>
						<input type="file" name="file-1opc6" id="file-1opc6"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc6l" for="file-1opc6"><span style="overflow: hidden;">06</span></label>
						<input type="file" name="file-1opc7" id="file-1opc7"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc7l" for="file-1opc7"><span style="overflow: hidden;">07</span></label>
						<input type="file" name="file-1opc8" id="file-1opc8"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc8l" for="file-1opc8"><span style="overflow: hidden;">08</span></label>
						<input type="file" name="file-1opc9" id="file-1opc9"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc9l" for="file-1opc9"><span style="overflow: hidden;">09</span></label>
						<input type="file" name="file-1opc10" id="file-1opc10"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc10l" for="file-1opc10"><span style="overflow: hidden;">10</span></label>
						<input type="file" name="file-1opc11" id="file-1opc11"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc11l" for="file-1opc11"><span style="overflow: hidden;">11</span></label>
						<input type="file" name="file-1opc12" id="file-1opc12"   data-multiple-caption="{count} files selected" multiple />
						<label class="btn btn-default" id="file-1opc12l" for="file-1opc12"><span style="overflow: hidden;">12</span></label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><span>Upload to practice</span></td>
					<td><input style="border:none;background-color:rgb(170,226,171);" type="submit" class="btn btn-default" name="pcupload" id="pcupload" value="Upload"></input></td>
				</tr>
				</table>
			</form>
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
<script src="custom-file-input.js"></script>
<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script>

$("#file-pdf1").change(function(){
	$("#file-pdf1l").css("border","none");
	$("#file-pdf1l").css("background-color","#35BD40");
	$("#file-pdf1l").css("background-image","url('check.svg')");
	$("#file-pdf1l").css("background-repeat","no-repeat");
	$("#file-pdf1l").css("background-position","center");
	$("#file-pdf1l").css("background-size","50px 30px");
});
$("#file-1i1").change(function(){
	$("#file-1i1l").css("border","none");
	$("#file-1i1l").css("background-color","#35BD40");
	$("#file-1i1l").css("background-image","url('check.svg')");
	$("#file-1i1l").css("background-repeat","no-repeat");
	$("#file-1i1l").css("background-position","center");
	$("#file-1i1l").css("background-size","50px 30px");
});
$("#file-1i2").change(function(){
	$("#file-1i2l").css("border","none");
	$("#file-1i2l").css("background-color","#35BD40");
	$("#file-1i2l").css("background-image","url('check.svg')");
	$("#file-1i2l").css("background-repeat","no-repeat");
	$("#file-1i2l").css("background-position","center");
	$("#file-1i2l").css("background-size","50px 30px");
});
$("#file-1i3").change(function(){
	$("#file-1i3l").css("border","none");
	$("#file-1i3l").css("background-color","#35BD40");
	$("#file-1i3l").css("background-image","url('check.svg')");
	$("#file-1i3l").css("background-repeat","no-repeat");
	$("#file-1i3l").css("background-position","center");
	$("#file-1i3l").css("background-size","50px 30px");
});
$("#file-1i4").change(function(){
	$("#file-1i4l").css("border","none");
	$("#file-1i4l").css("background-color","#35BD40");
	$("#file-1i4l").css("background-image","url('check.svg')");
	$("#file-1i4l").css("background-repeat","no-repeat");
	$("#file-1i4l").css("background-position","center");
	$("#file-1i4l").css("background-size","50px 30px");
});
$("#file-1i5").change(function(){
	$("#file-1i5l").css("border","none");
	$("#file-1i5l").css("background-color","#35BD40");
	$("#file-1i5l").css("background-image","url('check.svg')");
	$("#file-1i5l").css("background-repeat","no-repeat");
	$("#file-1i5l").css("background-position","center");
	$("#file-1i5l").css("background-size","50px 30px");
});
$("#file-1i6").change(function(){
	$("#file-1i6l").css("border","none");
	$("#file-1i6l").css("background-color","#35BD40");
	$("#file-1i6l").css("background-image","url('check.svg')");
	$("#file-1i6l").css("background-repeat","no-repeat");
	$("#file-1i6l").css("background-position","center");
	$("#file-1i6l").css("background-size","50px 30px");
});
$("#file-1i7").change(function(){
	$("#file-1i7l").css("border","none");
	$("#file-1i7l").css("background-color","#35BD40");
	$("#file-1i7l").css("background-image","url('check.svg')");
	$("#file-1i7l").css("background-repeat","no-repeat");
	$("#file-1i7l").css("background-position","center");
	$("#file-1i7l").css("background-size","50px 30px");
});
$("#file-1i8").change(function(){
	$("#file-1i8l").css("border","none");
	$("#file-1i8l").css("background-color","#35BD40");
	$("#file-1i8l").css("background-image","url('check.svg')");
	$("#file-1i8l").css("background-repeat","no-repeat");
	$("#file-1i8l").css("background-position","center");
	$("#file-1i8l").css("background-size","50px 30px");
});
$("#file-1i9").change(function(){
	$("#file-1i9l").css("border","none");
	$("#file-1i9l").css("background-color","#35BD40");
	$("#file-1i9l").css("background-image","url('check.svg')");
	$("#file-1i9l").css("background-repeat","no-repeat");
	$("#file-1i9l").css("background-position","center");
	$("#file-1i9l").css("background-size","50px 30px");
});
$("#file-1i10").change(function(){
	$("#file-1i10l").css("border","none");
	$("#file-1i10l").css("background-color","#35BD40");
	$("#file-1i10l").css("background-image","url('check.svg')");
	$("#file-1i10l").css("background-repeat","no-repeat");
	$("#file-1i10l").css("background-position","center");
	$("#file-1i10l").css("background-size","50px 30px");
});
$("#file-1i11").change(function(){
	$("#file-1i11l").css("border","none");
	$("#file-1i11l").css("background-color","#35BD40");
	$("#file-1i11l").css("background-image","url('check.svg')");
	$("#file-1i11l").css("background-repeat","no-repeat");
	$("#file-1i11l").css("background-position","center");
	$("#file-1i11l").css("background-size","50px 30px");
});
$("#file-1i12").change(function(){
	$("#file-1i12l").css("border","none");
	$("#file-1i12l").css("background-color","#35BD40");
	$("#file-1i12l").css("background-image","url('check.svg')");
	$("#file-1i12l").css("background-repeat","no-repeat");
	$("#file-1i12l").css("background-position","center");
	$("#file-1i12l").css("background-size","50px 30px");
});
$("#file-1o1").change(function(){
	$("#file-1o1l").css("border","none");
	$("#file-1o1l").css("background-color","#35BD40");
	$("#file-1o1l").css("background-image","url('check.svg')");
	$("#file-1o1l").css("background-repeat","no-repeat");
	$("#file-1o1l").css("background-position","center");
	$("#file-1o1l").css("background-size","50px 30px");
});
$("#file-1o2").change(function(){
	$("#file-1o2l").css("border","none");
	$("#file-1o2l").css("background-color","#35BD40");
	$("#file-1o2l").css("background-image","url('check.svg')");
	$("#file-1o2l").css("background-repeat","no-repeat");
	$("#file-1o2l").css("background-position","center");
	$("#file-1o2l").css("background-size","50px 30px");
});
$("#file-1o3").change(function(){
	$("#file-1o3l").css("border","none");
	$("#file-1o3l").css("background-color","#35BD40");
	$("#file-1o3l").css("background-image","url('check.svg')");
	$("#file-1o3l").css("background-repeat","no-repeat");
	$("#file-1o3l").css("background-position","center");
	$("#file-1o3l").css("background-size","50px 30px");
});
$("#file-1o4").change(function(){
	$("#file-1o4l").css("border","none");
	$("#file-1o4l").css("background-color","#35BD40");
	$("#file-1o4l").css("background-image","url('check.svg')");
	$("#file-1o4l").css("background-repeat","no-repeat");
	$("#file-1o4l").css("background-position","center");
	$("#file-1o4l").css("background-size","50px 30px");
});
$("#file-1o5").change(function(){
	$("#file-1o5l").css("border","none");
	$("#file-1o5l").css("background-color","#35BD40");
	$("#file-1o5l").css("background-image","url('check.svg')");
	$("#file-1o5l").css("background-repeat","no-repeat");
	$("#file-1o5l").css("background-position","center");
	$("#file-1o5l").css("background-size","50px 30px");
});
$("#file-1o6").change(function(){
	$("#file-1o6l").css("border","none");
	$("#file-1o6l").css("background-color","#35BD40");
	$("#file-1o6l").css("background-image","url('check.svg')");
	$("#file-1o6l").css("background-repeat","no-repeat");
	$("#file-1o6l").css("background-position","center");
	$("#file-1o6l").css("background-size","50px 30px");
});
$("#file-1o7").change(function(){
	$("#file-1o7l").css("border","none");
	$("#file-1o7l").css("background-color","#35BD40");
	$("#file-1o7l").css("background-image","url('check.svg')");
	$("#file-1o7l").css("background-repeat","no-repeat");
	$("#file-1o7l").css("background-position","center");
	$("#file-1o7l").css("background-size","50px 30px");
});
$("#file-1o8").change(function(){
	$("#file-1o8l").css("border","none");
	$("#file-1o8l").css("background-color","#35BD40");
	$("#file-1o8l").css("background-image","url('check.svg')");
	$("#file-1o8l").css("background-repeat","no-repeat");
	$("#file-1o8l").css("background-position","center");
	$("#file-1o8l").css("background-size","50px 30px");
});
$("#file-1o9").change(function(){
	$("#file-1o9l").css("border","none");
	$("#file-1o9l").css("background-color","#35BD40");
	$("#file-1o9l").css("background-image","url('check.svg')");
	$("#file-1o9l").css("background-repeat","no-repeat");
	$("#file-1o9l").css("background-position","center");
	$("#file-1o9l").css("background-size","50px 30px");
});
$("#file-1o10").change(function(){
	$("#file-1o10l").css("border","none");
	$("#file-1o10l").css("background-color","#35BD40");
	$("#file-1o10l").css("background-image","url('check.svg')");
	$("#file-1o10l").css("background-repeat","no-repeat");
	$("#file-1o10l").css("background-position","center");
	$("#file-1o10l").css("background-size","50px 30px");
});
$("#file-1o11").change(function(){
	$("#file-1o11l").css("border","none");
	$("#file-1o11l").css("background-color","#35BD40");
	$("#file-1o11l").css("background-image","url('check.svg')");
	$("#file-1o11l").css("background-repeat","no-repeat");
	$("#file-1o11l").css("background-position","center");
	$("#file-1o11l").css("background-size","50px 30px");
});
$("#file-1o12").change(function(){
	$("#file-1o12l").css("border","none");
	$("#file-1o12l").css("background-color","#35BD40");
	$("#file-1o12l").css("background-image","url('check.svg')");
	$("#file-1o12l").css("background-repeat","no-repeat");
	$("#file-1o12l").css("background-position","center");
	$("#file-1o12l").css("background-size","50px 30px");
});
$("#file-pdf2").change(function(){
	$("#file-pdf2l").css("border","none");
	$("#file-pdf2l").css("background-color","#35BD40");
	$("#file-pdf2l").css("background-image","url('check.svg')");
	$("#file-pdf2l").css("background-repeat","no-repeat");
	$("#file-pdf2l").css("background-position","center");
	$("#file-pdf2l").css("background-size","50px 30px");
});
$("#file-2i1").change(function(){
	$("#file-2i1l").css("border","none");
	$("#file-2i1l").css("background-color","#35BD40");
	$("#file-2i1l").css("background-image","url('check.svg')");
	$("#file-2i1l").css("background-repeat","no-repeat");
	$("#file-2i1l").css("background-position","center");
	$("#file-2i1l").css("background-size","50px 30px");
});
$("#file-2i2").change(function(){
	$("#file-2i2l").css("border","none");
	$("#file-2i2l").css("background-color","#35BD40");
	$("#file-2i2l").css("background-image","url('check.svg')");
	$("#file-2i2l").css("background-repeat","no-repeat");
	$("#file-2i2l").css("background-position","center");
	$("#file-2i2l").css("background-size","50px 30px");
});
$("#file-2i3").change(function(){
	$("#file-2i3l").css("border","none");
	$("#file-2i3l").css("background-color","#35BD40");
	$("#file-2i3l").css("background-image","url('check.svg')");
	$("#file-2i3l").css("background-repeat","no-repeat");
	$("#file-2i3l").css("background-position","center");
	$("#file-2i3l").css("background-size","50px 30px");
});
$("#file-2i4").change(function(){
	$("#file-2i4l").css("border","none");
	$("#file-2i4l").css("background-color","#35BD40");
	$("#file-2i4l").css("background-image","url('check.svg')");
	$("#file-2i4l").css("background-repeat","no-repeat");
	$("#file-2i4l").css("background-position","center");
	$("#file-2i4l").css("background-size","50px 30px");
});
$("#file-2i5").change(function(){
	$("#file-2i5l").css("border","none");
	$("#file-2i5l").css("background-color","#35BD40");
	$("#file-2i5l").css("background-image","url('check.svg')");
	$("#file-2i5l").css("background-repeat","no-repeat");
	$("#file-2i5l").css("background-position","center");
	$("#file-2i5l").css("background-size","50px 30px");
});
$("#file-2i6").change(function(){
	$("#file-2i6l").css("border","none");
	$("#file-2i6l").css("background-color","#35BD40");
	$("#file-2i6l").css("background-image","url('check.svg')");
	$("#file-2i6l").css("background-repeat","no-repeat");
	$("#file-2i6l").css("background-position","center");
	$("#file-2i6l").css("background-size","50px 30px");
});
$("#file-2i7").change(function(){
	$("#file-2i7l").css("border","none");
	$("#file-2i7l").css("background-color","#35BD40");
	$("#file-2i7l").css("background-image","url('check.svg')");
	$("#file-2i7l").css("background-repeat","no-repeat");
	$("#file-2i7l").css("background-position","center");
	$("#file-2i7l").css("background-size","50px 30px");
});
$("#file-2i8").change(function(){
	$("#file-2i8l").css("border","none");
	$("#file-2i8l").css("background-color","#35BD40");
	$("#file-2i8l").css("background-image","url('check.svg')");
	$("#file-2i8l").css("background-repeat","no-repeat");
	$("#file-2i8l").css("background-position","center");
	$("#file-2i8l").css("background-size","50px 30px");
});
$("#file-2i9").change(function(){
	$("#file-2i9l").css("border","none");
	$("#file-2i9l").css("background-color","#35BD40");
	$("#file-2i9l").css("background-image","url('check.svg')");
	$("#file-2i9l").css("background-repeat","no-repeat");
	$("#file-2i9l").css("background-position","center");
	$("#file-2i9l").css("background-size","50px 30px");
});
$("#file-2i10").change(function(){
	$("#file-2i10l").css("border","none");
	$("#file-2i10l").css("background-color","#35BD40");
	$("#file-2i10l").css("background-image","url('check.svg')");
	$("#file-2i10l").css("background-repeat","no-repeat");
	$("#file-2i10l").css("background-position","center");
	$("#file-2i10l").css("background-size","50px 30px");
});
$("#file-2i11").change(function(){
	$("#file-2i11l").css("border","none");
	$("#file-2i11l").css("background-color","#35BD40");
	$("#file-2i11l").css("background-image","url('check.svg')");
	$("#file-2i11l").css("background-repeat","no-repeat");
	$("#file-2i11l").css("background-position","center");
	$("#file-2i11l").css("background-size","50px 30px");
});
$("#file-2i12").change(function(){
	$("#file-2i12l").css("border","none");
	$("#file-2i12l").css("background-color","#35BD40");
	$("#file-2i12l").css("background-image","url('check.svg')");
	$("#file-2i12l").css("background-repeat","no-repeat");
	$("#file-2i12l").css("background-position","center");
	$("#file-2i12l").css("background-size","50px 30px");
});
$("#file-2o1").change(function(){
	$("#file-2o1l").css("border","none");
	$("#file-2o1l").css("background-color","#35BD40");
	$("#file-2o1l").css("background-image","url('check.svg')");
	$("#file-2o1l").css("background-repeat","no-repeat");
	$("#file-2o1l").css("background-position","center");
	$("#file-2o1l").css("background-size","50px 30px");
});
$("#file-2o2").change(function(){
	$("#file-2o2l").css("border","none");
	$("#file-2o2l").css("background-color","#35BD40");
	$("#file-2o2l").css("background-image","url('check.svg')");
	$("#file-2o2l").css("background-repeat","no-repeat");
	$("#file-2o2l").css("background-position","center");
	$("#file-2o2l").css("background-size","50px 30px");
});
$("#file-2o3").change(function(){
	$("#file-2o3l").css("border","none");
	$("#file-2o3l").css("background-color","#35BD40");
	$("#file-2o3l").css("background-image","url('check.svg')");
	$("#file-2o3l").css("background-repeat","no-repeat");
	$("#file-2o3l").css("background-position","center");
	$("#file-2o3l").css("background-size","50px 30px");
});
$("#file-2o4").change(function(){
	$("#file-2o4l").css("border","none");
	$("#file-2o4l").css("background-color","#35BD40");
	$("#file-2o4l").css("background-image","url('check.svg')");
	$("#file-2o4l").css("background-repeat","no-repeat");
	$("#file-2o4l").css("background-position","center");
	$("#file-2o4l").css("background-size","50px 30px");
});
$("#file-2o5").change(function(){
	$("#file-2o5l").css("border","none");
	$("#file-2o5l").css("background-color","#35BD40");
	$("#file-2o5l").css("background-image","url('check.svg')");
	$("#file-2o5l").css("background-repeat","no-repeat");
	$("#file-2o5l").css("background-position","center");
	$("#file-2o5l").css("background-size","50px 30px");
});
$("#file-2o6").change(function(){
	$("#file-2o6l").css("border","none");
	$("#file-2o6l").css("background-color","#35BD40");
	$("#file-2o6l").css("background-image","url('check.svg')");
	$("#file-2o6l").css("background-repeat","no-repeat");
	$("#file-2o6l").css("background-position","center");
	$("#file-2o6l").css("background-size","50px 30px");
});
$("#file-2o7").change(function(){
	$("#file-2o7l").css("border","none");
	$("#file-2o7l").css("background-color","#35BD40");
	$("#file-2o7l").css("background-image","url('check.svg')");
	$("#file-2o7l").css("background-repeat","no-repeat");
	$("#file-2o7l").css("background-position","center");
	$("#file-2o7l").css("background-size","50px 30px");
});
$("#file-2o8").change(function(){
	$("#file-2o8l").css("border","none");
	$("#file-2o8l").css("background-color","#35BD40");
	$("#file-2o8l").css("background-image","url('check.svg')");
	$("#file-2o8l").css("background-repeat","no-repeat");
	$("#file-2o8l").css("background-position","center");
	$("#file-2o8l").css("background-size","50px 30px");
});
$("#file-2o9").change(function(){
	$("#file-2o9l").css("border","none");
	$("#file-2o9l").css("background-color","#35BD40");
	$("#file-2o9l").css("background-image","url('check.svg')");
	$("#file-2o9l").css("background-repeat","no-repeat");
	$("#file-2o9l").css("background-position","center");
	$("#file-2o9l").css("background-size","50px 30px");
});
$("#file-2o10").change(function(){
	$("#file-2o10l").css("border","none");
	$("#file-2o10l").css("background-color","#35BD40");
	$("#file-2o10l").css("background-image","url('check.svg')");
	$("#file-2o10l").css("background-repeat","no-repeat");
	$("#file-2o10l").css("background-position","center");
	$("#file-2o10l").css("background-size","50px 30px");
});
$("#file-2o11").change(function(){
	$("#file-2o11l").css("border","none");
	$("#file-2o11l").css("background-color","#35BD40");
	$("#file-2o11l").css("background-image","url('check.svg')");
	$("#file-2o11l").css("background-repeat","no-repeat");
	$("#file-2o11l").css("background-position","center");
	$("#file-2o11l").css("background-size","50px 30px");
});
$("#file-2o12").change(function(){
	$("#file-2o12l").css("border","none");
	$("#file-2o12l").css("background-color","#35BD40");
	$("#file-2o12l").css("background-image","url('check.svg')");
	$("#file-2o12l").css("background-repeat","no-repeat");
	$("#file-2o12l").css("background-position","center");
	$("#file-2o12l").css("background-size","50px 30px");
});
$("#file-pdf3").change(function(){
	$("#file-pdf3l").css("border","none");
	$("#file-pdf3l").css("background-color","#35BD40");
	$("#file-pdf3l").css("background-image","url('check.svg')");
	$("#file-pdf3l").css("background-repeat","no-repeat");
	$("#file-pdf3l").css("background-position","center");
	$("#file-pdf3l").css("background-size","50px 30px");
});
$("#file-3i1").change(function(){
	$("#file-3i1l").css("border","none");
	$("#file-3i1l").css("background-color","#35BD40");
	$("#file-3i1l").css("background-image","url('check.svg')");
	$("#file-3i1l").css("background-repeat","no-repeat");
	$("#file-3i1l").css("background-position","center");
	$("#file-3i1l").css("background-size","50px 30px");
});
$("#file-3i2").change(function(){
	$("#file-3i2l").css("border","none");
	$("#file-3i2l").css("background-color","#35BD40");
	$("#file-3i2l").css("background-image","url('check.svg')");
	$("#file-3i2l").css("background-repeat","no-repeat");
	$("#file-3i2l").css("background-position","center");
	$("#file-3i2l").css("background-size","50px 30px");
});
$("#file-3i3").change(function(){
	$("#file-3i3l").css("border","none");
	$("#file-3i3l").css("background-color","#35BD40");
	$("#file-3i3l").css("background-image","url('check.svg')");
	$("#file-3i3l").css("background-repeat","no-repeat");
	$("#file-3i3l").css("background-position","center");
	$("#file-3i3l").css("background-size","50px 30px");
});
$("#file-3i4").change(function(){
	$("#file-3i4l").css("border","none");
	$("#file-3i4l").css("background-color","#35BD40");
	$("#file-3i4l").css("background-image","url('check.svg')");
	$("#file-3i4l").css("background-repeat","no-repeat");
	$("#file-3i4l").css("background-position","center");
	$("#file-3i4l").css("background-size","50px 30px");
});
$("#file-3i5").change(function(){
	$("#file-3i5l").css("border","none");
	$("#file-3i5l").css("background-color","#35BD40");
	$("#file-3i5l").css("background-image","url('check.svg')");
	$("#file-3i5l").css("background-repeat","no-repeat");
	$("#file-3i5l").css("background-position","center");
	$("#file-3i5l").css("background-size","50px 30px");
});
$("#file-3i6").change(function(){
	$("#file-3i6l").css("border","none");
	$("#file-3i6l").css("background-color","#35BD40");
	$("#file-3i6l").css("background-image","url('check.svg')");
	$("#file-3i6l").css("background-repeat","no-repeat");
	$("#file-3i6l").css("background-position","center");
	$("#file-3i6l").css("background-size","50px 30px");
});
$("#file-3i7").change(function(){
	$("#file-3i7l").css("border","none");
	$("#file-3i7l").css("background-color","#35BD40");
	$("#file-3i7l").css("background-image","url('check.svg')");
	$("#file-3i7l").css("background-repeat","no-repeat");
	$("#file-3i7l").css("background-position","center");
	$("#file-3i7l").css("background-size","50px 30px");
});
$("#file-3i8").change(function(){
	$("#file-3i8l").css("border","none");
	$("#file-3i8l").css("background-color","#35BD40");
	$("#file-3i8l").css("background-image","url('check.svg')");
	$("#file-3i8l").css("background-repeat","no-repeat");
	$("#file-3i8l").css("background-position","center");
	$("#file-3i8l").css("background-size","50px 30px");
});
$("#file-3i9").change(function(){
	$("#file-3i9l").css("border","none");
	$("#file-3i9l").css("background-color","#35BD40");
	$("#file-3i9l").css("background-image","url('check.svg')");
	$("#file-3i9l").css("background-repeat","no-repeat");
	$("#file-3i9l").css("background-position","center");
	$("#file-3i9l").css("background-size","50px 30px");
});
$("#file-3i10").change(function(){
	$("#file-3i10l").css("border","none");
	$("#file-3i10l").css("background-color","#35BD40");
	$("#file-3i10l").css("background-image","url('check.svg')");
	$("#file-3i10l").css("background-repeat","no-repeat");
	$("#file-3i10l").css("background-position","center");
	$("#file-3i10l").css("background-size","50px 30px");
});
$("#file-3i11").change(function(){
	$("#file-3i11l").css("border","none");
	$("#file-3i11l").css("background-color","#35BD40");
	$("#file-3i11l").css("background-image","url('check.svg')");
	$("#file-3i11l").css("background-repeat","no-repeat");
	$("#file-3i11l").css("background-position","center");
	$("#file-3i11l").css("background-size","50px 30px");
});
$("#file-3i12").change(function(){
	$("#file-3i12l").css("border","none");
	$("#file-3i12l").css("background-color","#35BD40");
	$("#file-3i12l").css("background-image","url('check.svg')");
	$("#file-3i12l").css("background-repeat","no-repeat");
	$("#file-3i12l").css("background-position","center");
	$("#file-3i12l").css("background-size","50px 30px");
});
$("#file-3o1").change(function(){
	$("#file-3o1l").css("border","none");
	$("#file-3o1l").css("background-color","#35BD40");
	$("#file-3o1l").css("background-image","url('check.svg')");
	$("#file-3o1l").css("background-repeat","no-repeat");
	$("#file-3o1l").css("background-position","center");
	$("#file-3o1l").css("background-size","50px 30px");
});
$("#file-3o2").change(function(){
	$("#file-3o2l").css("border","none");
	$("#file-3o2l").css("background-color","#35BD40");
	$("#file-3o2l").css("background-image","url('check.svg')");
	$("#file-3o2l").css("background-repeat","no-repeat");
	$("#file-3o2l").css("background-position","center");
	$("#file-3o2l").css("background-size","50px 30px");
});
$("#file-3o3").change(function(){
	$("#file-3o3l").css("border","none");
	$("#file-3o3l").css("background-color","#35BD40");
	$("#file-3o3l").css("background-image","url('check.svg')");
	$("#file-3o3l").css("background-repeat","no-repeat");
	$("#file-3o3l").css("background-position","center");
	$("#file-3o3l").css("background-size","50px 30px");
});
$("#file-3o4").change(function(){
	$("#file-3o4l").css("border","none");
	$("#file-3o4l").css("background-color","#35BD40");
	$("#file-3o4l").css("background-image","url('check.svg')");
	$("#file-3o4l").css("background-repeat","no-repeat");
	$("#file-3o4l").css("background-position","center");
	$("#file-3o4l").css("background-size","50px 30px");
});
$("#file-3o5").change(function(){
	$("#file-3o5l").css("border","none");
	$("#file-3o5l").css("background-color","#35BD40");
	$("#file-3o5l").css("background-image","url('check.svg')");
	$("#file-3o5l").css("background-repeat","no-repeat");
	$("#file-3o5l").css("background-position","center");
	$("#file-3o5l").css("background-size","50px 30px");
});
$("#file-3o6").change(function(){
	$("#file-3o6l").css("border","none");
	$("#file-3o6l").css("background-color","#35BD40");
	$("#file-3o6l").css("background-image","url('check.svg')");
	$("#file-3o6l").css("background-repeat","no-repeat");
	$("#file-3o6l").css("background-position","center");
	$("#file-3o6l").css("background-size","50px 30px");
});
$("#file-3o7").change(function(){
	$("#file-3o7l").css("border","none");
	$("#file-3o7l").css("background-color","#35BD40");
	$("#file-3o7l").css("background-image","url('check.svg')");
	$("#file-3o7l").css("background-repeat","no-repeat");
	$("#file-3o7l").css("background-position","center");
	$("#file-3o7l").css("background-size","50px 30px");
});
$("#file-3o8").change(function(){
	$("#file-3o8l").css("border","none");
	$("#file-3o8l").css("background-color","#35BD40");
	$("#file-3o8l").css("background-image","url('check.svg')");
	$("#file-3o8l").css("background-repeat","no-repeat");
	$("#file-3o8l").css("background-position","center");
	$("#file-3o8l").css("background-size","50px 30px");
});
$("#file-3o9").change(function(){
	$("#file-3o9l").css("border","none");
	$("#file-3o9l").css("background-color","#35BD40");
	$("#file-3o9l").css("background-image","url('check.svg')");
	$("#file-3o9l").css("background-repeat","no-repeat");
	$("#file-3o9l").css("background-position","center");
	$("#file-3o9l").css("background-size","50px 30px");
});
$("#file-3o10").change(function(){
	$("#file-3o10l").css("border","none");
	$("#file-3o10l").css("background-color","#35BD40");
	$("#file-3o10l").css("background-image","url('check.svg')");
	$("#file-3o10l").css("background-repeat","no-repeat");
	$("#file-3o10l").css("background-position","center");
	$("#file-3o10l").css("background-size","50px 30px");
});
$("#file-3o11").change(function(){
	$("#file-3o11l").css("border","none");
	$("#file-3o11l").css("background-color","#35BD40");
	$("#file-3o11l").css("background-image","url('check.svg')");
	$("#file-3o11l").css("background-repeat","no-repeat");
	$("#file-3o11l").css("background-position","center");
	$("#file-3o11l").css("background-size","50px 30px");
});
$("#file-3o12").change(function(){
	$("#file-3o12l").css("border","none");
	$("#file-3o12l").css("background-color","#35BD40");
	$("#file-3o12l").css("background-image","url('check.svg')");
	$("#file-3o12l").css("background-repeat","no-repeat");
	$("#file-3o12l").css("background-position","center");
	$("#file-3o12l").css("background-size","50px 30px");
});
$("#file-pdf4").change(function(){
	$("#file-pdf4l").css("border","none");
	$("#file-pdf4l").css("background-color","#35BD40");
	$("#file-pdf4l").css("background-image","url('check.svg')");
	$("#file-pdf4l").css("background-repeat","no-repeat");
	$("#file-pdf4l").css("background-position","center");
	$("#file-pdf4l").css("background-size","50px 30px");
});
$("#file-4i1").change(function(){
	$("#file-4i1l").css("border","none");
	$("#file-4i1l").css("background-color","#35BD40");
	$("#file-4i1l").css("background-image","url('check.svg')");
	$("#file-4i1l").css("background-repeat","no-repeat");
	$("#file-4i1l").css("background-position","center");
	$("#file-4i1l").css("background-size","50px 30px");
});
$("#file-4i2").change(function(){
	$("#file-4i2l").css("border","none");
	$("#file-4i2l").css("background-color","#35BD40");
	$("#file-4i2l").css("background-image","url('check.svg')");
	$("#file-4i2l").css("background-repeat","no-repeat");
	$("#file-4i2l").css("background-position","center");
	$("#file-4i2l").css("background-size","50px 30px");
});
$("#file-4i3").change(function(){
	$("#file-4i3l").css("border","none");
	$("#file-4i3l").css("background-color","#35BD40");
	$("#file-4i3l").css("background-image","url('check.svg')");
	$("#file-4i3l").css("background-repeat","no-repeat");
	$("#file-4i3l").css("background-position","center");
	$("#file-4i3l").css("background-size","50px 30px");
});
$("#file-4i4").change(function(){
	$("#file-4i4l").css("border","none");
	$("#file-4i4l").css("background-color","#35BD40");
	$("#file-4i4l").css("background-image","url('check.svg')");
	$("#file-4i4l").css("background-repeat","no-repeat");
	$("#file-4i4l").css("background-position","center");
	$("#file-4i4l").css("background-size","50px 30px");
});
$("#file-4i5").change(function(){
	$("#file-4i5l").css("border","none");
	$("#file-4i5l").css("background-color","#35BD40");
	$("#file-4i5l").css("background-image","url('check.svg')");
	$("#file-4i5l").css("background-repeat","no-repeat");
	$("#file-4i5l").css("background-position","center");
	$("#file-4i5l").css("background-size","50px 30px");
});
$("#file-4i6").change(function(){
	$("#file-4i6l").css("border","none");
	$("#file-4i6l").css("background-color","#35BD40");
	$("#file-4i6l").css("background-image","url('check.svg')");
	$("#file-4i6l").css("background-repeat","no-repeat");
	$("#file-4i6l").css("background-position","center");
	$("#file-4i6l").css("background-size","50px 30px");
});
$("#file-4i7").change(function(){
	$("#file-4i7l").css("border","none");
	$("#file-4i7l").css("background-color","#35BD40");
	$("#file-4i7l").css("background-image","url('check.svg')");
	$("#file-4i7l").css("background-repeat","no-repeat");
	$("#file-4i7l").css("background-position","center");
	$("#file-4i7l").css("background-size","50px 30px");
});
$("#file-4i8").change(function(){
	$("#file-4i8l").css("border","none");
	$("#file-4i8l").css("background-color","#35BD40");
	$("#file-4i8l").css("background-image","url('check.svg')");
	$("#file-4i8l").css("background-repeat","no-repeat");
	$("#file-4i8l").css("background-position","center");
	$("#file-4i8l").css("background-size","50px 30px");
});
$("#file-4i9").change(function(){
	$("#file-4i9l").css("border","none");
	$("#file-4i9l").css("background-color","#35BD40");
	$("#file-4i9l").css("background-image","url('check.svg')");
	$("#file-4i9l").css("background-repeat","no-repeat");
	$("#file-4i9l").css("background-position","center");
	$("#file-4i9l").css("background-size","50px 30px");
});
$("#file-4i10").change(function(){
	$("#file-4i10l").css("border","none");
	$("#file-4i10l").css("background-color","#35BD40");
	$("#file-4i10l").css("background-image","url('check.svg')");
	$("#file-4i10l").css("background-repeat","no-repeat");
	$("#file-4i10l").css("background-position","center");
	$("#file-4i10l").css("background-size","50px 30px");
});
$("#file-4i11").change(function(){
	$("#file-4i11l").css("border","none");
	$("#file-4i11l").css("background-color","#35BD40");
	$("#file-4i11l").css("background-image","url('check.svg')");
	$("#file-4i11l").css("background-repeat","no-repeat");
	$("#file-4i11l").css("background-position","center");
	$("#file-4i11l").css("background-size","50px 30px");
});
$("#file-4i12").change(function(){
	$("#file-4i12l").css("border","none");
	$("#file-4i12l").css("background-color","#35BD40");
	$("#file-4i12l").css("background-image","url('check.svg')");
	$("#file-4i12l").css("background-repeat","no-repeat");
	$("#file-4i12l").css("background-position","center");
	$("#file-4i12l").css("background-size","50px 30px");
});
$("#file-4o1").change(function(){
	$("#file-4o1l").css("border","none");
	$("#file-4o1l").css("background-color","#35BD40");
	$("#file-4o1l").css("background-image","url('check.svg')");
	$("#file-4o1l").css("background-repeat","no-repeat");
	$("#file-4o1l").css("background-position","center");
	$("#file-4o1l").css("background-size","50px 30px");
});
$("#file-4o2").change(function(){
	$("#file-4o2l").css("border","none");
	$("#file-4o2l").css("background-color","#35BD40");
	$("#file-4o2l").css("background-image","url('check.svg')");
	$("#file-4o2l").css("background-repeat","no-repeat");
	$("#file-4o2l").css("background-position","center");
	$("#file-4o2l").css("background-size","50px 30px");
});
$("#file-4o3").change(function(){
	$("#file-4o3l").css("border","none");
	$("#file-4o3l").css("background-color","#35BD40");
	$("#file-4o3l").css("background-image","url('check.svg')");
	$("#file-4o3l").css("background-repeat","no-repeat");
	$("#file-4o3l").css("background-position","center");
	$("#file-4o3l").css("background-size","50px 30px");
});
$("#file-4o4").change(function(){
	$("#file-4o4l").css("border","none");
	$("#file-4o4l").css("background-color","#35BD40");
	$("#file-4o4l").css("background-image","url('check.svg')");
	$("#file-4o4l").css("background-repeat","no-repeat");
	$("#file-4o4l").css("background-position","center");
	$("#file-4o4l").css("background-size","50px 30px");
});
$("#file-4o5").change(function(){
	$("#file-4o5l").css("border","none");
	$("#file-4o5l").css("background-color","#35BD40");
	$("#file-4o5l").css("background-image","url('check.svg')");
	$("#file-4o5l").css("background-repeat","no-repeat");
	$("#file-4o5l").css("background-position","center");
	$("#file-4o5l").css("background-size","50px 30px");
});
$("#file-4o6").change(function(){
	$("#file-4o6l").css("border","none");
	$("#file-4o6l").css("background-color","#35BD40");
	$("#file-4o6l").css("background-image","url('check.svg')");
	$("#file-4o6l").css("background-repeat","no-repeat");
	$("#file-4o6l").css("background-position","center");
	$("#file-4o6l").css("background-size","50px 30px");
});
$("#file-4o7").change(function(){
	$("#file-4o7l").css("border","none");
	$("#file-4o7l").css("background-color","#35BD40");
	$("#file-4o7l").css("background-image","url('check.svg')");
	$("#file-4o7l").css("background-repeat","no-repeat");
	$("#file-4o7l").css("background-position","center");
	$("#file-4o7l").css("background-size","50px 30px");
});
$("#file-4o8").change(function(){
	$("#file-4o8l").css("border","none");
	$("#file-4o8l").css("background-color","#35BD40");
	$("#file-4o8l").css("background-image","url('check.svg')");
	$("#file-4o8l").css("background-repeat","no-repeat");
	$("#file-4o8l").css("background-position","center");
	$("#file-4o8l").css("background-size","50px 30px");
});
$("#file-4o9").change(function(){
	$("#file-4o9l").css("border","none");
	$("#file-4o9l").css("background-color","#35BD40");
	$("#file-4o9l").css("background-image","url('check.svg')");
	$("#file-4o9l").css("background-repeat","no-repeat");
	$("#file-4o9l").css("background-position","center");
	$("#file-4o9l").css("background-size","50px 30px");
});
$("#file-4o10").change(function(){
	$("#file-4o10l").css("border","none");
	$("#file-4o10l").css("background-color","#35BD40");
	$("#file-4o10l").css("background-image","url('check.svg')");
	$("#file-4o10l").css("background-repeat","no-repeat");
	$("#file-4o10l").css("background-position","center");
	$("#file-4o10l").css("background-size","50px 30px");
});
$("#file-4o11").change(function(){
	$("#file-4o11l").css("border","none");
	$("#file-4o11l").css("background-color","#35BD40");
	$("#file-4o11l").css("background-image","url('check.svg')");
	$("#file-4o11l").css("background-repeat","no-repeat");
	$("#file-4o11l").css("background-position","center");
	$("#file-4o11l").css("background-size","50px 30px");
});
$("#file-4o12").change(function(){
	$("#file-4o12l").css("border","none");
	$("#file-4o12l").css("background-color","#35BD40");
	$("#file-4o12l").css("background-image","url('check.svg')");
	$("#file-4o12l").css("background-repeat","no-repeat");
	$("#file-4o12l").css("background-position","center");
	$("#file-4o12l").css("background-size","50px 30px");
});
$("#file-pdf5").change(function(){
	$("#file-pdf5l").css("border","none");
	$("#file-pdf5l").css("background-color","#35BD40");
	$("#file-pdf5l").css("background-image","url('check.svg')");
	$("#file-pdf5l").css("background-repeat","no-repeat");
	$("#file-pdf5l").css("background-position","center");
	$("#file-pdf5l").css("background-size","50px 30px");
});
$("#file-5i1").change(function(){
	$("#file-5i1l").css("border","none");
	$("#file-5i1l").css("background-color","#35BD40");
	$("#file-5i1l").css("background-image","url('check.svg')");
	$("#file-5i1l").css("background-repeat","no-repeat");
	$("#file-5i1l").css("background-position","center");
	$("#file-5i1l").css("background-size","50px 30px");
});
$("#file-5i2").change(function(){
	$("#file-5i2l").css("border","none");
	$("#file-5i2l").css("background-color","#35BD40");
	$("#file-5i2l").css("background-image","url('check.svg')");
	$("#file-5i2l").css("background-repeat","no-repeat");
	$("#file-5i2l").css("background-position","center");
	$("#file-5i2l").css("background-size","50px 30px");
});
$("#file-5i3").change(function(){
	$("#file-5i3l").css("border","none");
	$("#file-5i3l").css("background-color","#35BD40");
	$("#file-5i3l").css("background-image","url('check.svg')");
	$("#file-5i3l").css("background-repeat","no-repeat");
	$("#file-5i3l").css("background-position","center");
	$("#file-5i3l").css("background-size","50px 30px");
});
$("#file-5i4").change(function(){
	$("#file-5i4l").css("border","none");
	$("#file-5i4l").css("background-color","#35BD40");
	$("#file-5i4l").css("background-image","url('check.svg')");
	$("#file-5i4l").css("background-repeat","no-repeat");
	$("#file-5i4l").css("background-position","center");
	$("#file-5i4l").css("background-size","50px 30px");
});
$("#file-5i5").change(function(){
	$("#file-5i5l").css("border","none");
	$("#file-5i5l").css("background-color","#35BD40");
	$("#file-5i5l").css("background-image","url('check.svg')");
	$("#file-5i5l").css("background-repeat","no-repeat");
	$("#file-5i5l").css("background-position","center");
	$("#file-5i5l").css("background-size","50px 30px");
});
$("#file-5i6").change(function(){
	$("#file-5i6l").css("border","none");
	$("#file-5i6l").css("background-color","#35BD40");
	$("#file-5i6l").css("background-image","url('check.svg')");
	$("#file-5i6l").css("background-repeat","no-repeat");
	$("#file-5i6l").css("background-position","center");
	$("#file-5i6l").css("background-size","50px 30px");
});
$("#file-5i7").change(function(){
	$("#file-5i7l").css("border","none");
	$("#file-5i7l").css("background-color","#35BD40");
	$("#file-5i7l").css("background-image","url('check.svg')");
	$("#file-5i7l").css("background-repeat","no-repeat");
	$("#file-5i7l").css("background-position","center");
	$("#file-5i7l").css("background-size","50px 30px");
});
$("#file-5i8").change(function(){
	$("#file-5i8l").css("border","none");
	$("#file-5i8l").css("background-color","#35BD40");
	$("#file-5i8l").css("background-image","url('check.svg')");
	$("#file-5i8l").css("background-repeat","no-repeat");
	$("#file-5i8l").css("background-position","center");
	$("#file-5i8l").css("background-size","50px 30px");
});
$("#file-5i9").change(function(){
	$("#file-5i9l").css("border","none");
	$("#file-5i9l").css("background-color","#35BD40");
	$("#file-5i9l").css("background-image","url('check.svg')");
	$("#file-5i9l").css("background-repeat","no-repeat");
	$("#file-5i9l").css("background-position","center");
	$("#file-5i9l").css("background-size","50px 30px");
});
$("#file-5i10").change(function(){
	$("#file-5i10l").css("border","none");
	$("#file-5i10l").css("background-color","#35BD40");
	$("#file-5i10l").css("background-image","url('check.svg')");
	$("#file-5i10l").css("background-repeat","no-repeat");
	$("#file-5i10l").css("background-position","center");
	$("#file-5i10l").css("background-size","50px 30px");
});
$("#file-5i11").change(function(){
	$("#file-5i11l").css("border","none");
	$("#file-5i11l").css("background-color","#35BD40");
	$("#file-5i11l").css("background-image","url('check.svg')");
	$("#file-5i11l").css("background-repeat","no-repeat");
	$("#file-5i11l").css("background-position","center");
	$("#file-5i11l").css("background-size","50px 30px");
});
$("#file-5i12").change(function(){
	$("#file-5i12l").css("border","none");
	$("#file-5i12l").css("background-color","#35BD40");
	$("#file-5i12l").css("background-image","url('check.svg')");
	$("#file-5i12l").css("background-repeat","no-repeat");
	$("#file-5i12l").css("background-position","center");
	$("#file-5i12l").css("background-size","50px 30px");
});
$("#file-5o1").change(function(){
	$("#file-5o1l").css("border","none");
	$("#file-5o1l").css("background-color","#35BD40");
	$("#file-5o1l").css("background-image","url('check.svg')");
	$("#file-5o1l").css("background-repeat","no-repeat");
	$("#file-5o1l").css("background-position","center");
	$("#file-5o1l").css("background-size","50px 30px");
});
$("#file-5o2").change(function(){
	$("#file-5o2l").css("border","none");
	$("#file-5o2l").css("background-color","#35BD40");
	$("#file-5o2l").css("background-image","url('check.svg')");
	$("#file-5o2l").css("background-repeat","no-repeat");
	$("#file-5o2l").css("background-position","center");
	$("#file-5o2l").css("background-size","50px 30px");
});
$("#file-5o3").change(function(){
	$("#file-5o3l").css("border","none");
	$("#file-5o3l").css("background-color","#35BD40");
	$("#file-5o3l").css("background-image","url('check.svg')");
	$("#file-5o3l").css("background-repeat","no-repeat");
	$("#file-5o3l").css("background-position","center");
	$("#file-5o3l").css("background-size","50px 30px");
});
$("#file-5o4").change(function(){
	$("#file-5o4l").css("border","none");
	$("#file-5o4l").css("background-color","#35BD40");
	$("#file-5o4l").css("background-image","url('check.svg')");
	$("#file-5o4l").css("background-repeat","no-repeat");
	$("#file-5o4l").css("background-position","center");
	$("#file-5o4l").css("background-size","50px 30px");
});
$("#file-5o5").change(function(){
	$("#file-5o5l").css("border","none");
	$("#file-5o5l").css("background-color","#35BD40");
	$("#file-5o5l").css("background-image","url('check.svg')");
	$("#file-5o5l").css("background-repeat","no-repeat");
	$("#file-5o5l").css("background-position","center");
	$("#file-5o5l").css("background-size","50px 30px");
});
$("#file-5o6").change(function(){
	$("#file-5o6l").css("border","none");
	$("#file-5o6l").css("background-color","#35BD40");
	$("#file-5o6l").css("background-image","url('check.svg')");
	$("#file-5o6l").css("background-repeat","no-repeat");
	$("#file-5o6l").css("background-position","center");
	$("#file-5o6l").css("background-size","50px 30px");
});
$("#file-5o7").change(function(){
	$("#file-5o7l").css("border","none");
	$("#file-5o7l").css("background-color","#35BD40");
	$("#file-5o7l").css("background-image","url('check.svg')");
	$("#file-5o7l").css("background-repeat","no-repeat");
	$("#file-5o7l").css("background-position","center");
	$("#file-5o7l").css("background-size","50px 30px");
});
$("#file-5o8").change(function(){
	$("#file-5o8l").css("border","none");
	$("#file-5o8l").css("background-color","#35BD40");
	$("#file-5o8l").css("background-image","url('check.svg')");
	$("#file-5o8l").css("background-repeat","no-repeat");
	$("#file-5o8l").css("background-position","center");
	$("#file-5o8l").css("background-size","50px 30px");
});
$("#file-5o9").change(function(){
	$("#file-5o9l").css("border","none");
	$("#file-5o9l").css("background-color","#35BD40");
	$("#file-5o9l").css("background-image","url('check.svg')");
	$("#file-5o9l").css("background-repeat","no-repeat");
	$("#file-5o9l").css("background-position","center");
	$("#file-5o9l").css("background-size","50px 30px");
});
$("#file-5o10").change(function(){
	$("#file-5o10l").css("border","none");
	$("#file-5o10l").css("background-color","#35BD40");
	$("#file-5o10l").css("background-image","url('check.svg')");
	$("#file-5o10l").css("background-repeat","no-repeat");
	$("#file-5o10l").css("background-position","center");
	$("#file-5o10l").css("background-size","50px 30px");
});
$("#file-5o11").change(function(){
	$("#file-5o11l").css("border","none");
	$("#file-5o11l").css("background-color","#35BD40");
	$("#file-5o11l").css("background-image","url('check.svg')");
	$("#file-5o11l").css("background-repeat","no-repeat");
	$("#file-5o11l").css("background-position","center");
	$("#file-5o11l").css("background-size","50px 30px");
});
$("#file-5o12").change(function(){
	$("#file-5o12l").css("border","none");
	$("#file-5o12l").css("background-color","#35BD40");
	$("#file-5o12l").css("background-image","url('check.svg')");
	$("#file-5o12l").css("background-repeat","no-repeat");
	$("#file-5o12l").css("background-position","center");
	$("#file-5o12l").css("background-size","50px 30px");
});
$("#file-pdf6").change(function(){
	$("#file-pdf6l").css("border","none");
	$("#file-pdf6l").css("background-color","#35BD40");
	$("#file-pdf6l").css("background-image","url('check.svg')");
	$("#file-pdf6l").css("background-repeat","no-repeat");
	$("#file-pdf6l").css("background-position","center");
	$("#file-pdf6l").css("background-size","50px 30px");
});
$("#file-6i1").change(function(){
	$("#file-6i1l").css("border","none");
	$("#file-6i1l").css("background-color","#35BD40");
	$("#file-6i1l").css("background-image","url('check.svg')");
	$("#file-6i1l").css("background-repeat","no-repeat");
	$("#file-6i1l").css("background-position","center");
	$("#file-6i1l").css("background-size","50px 30px");
});
$("#file-6i2").change(function(){
	$("#file-6i2l").css("border","none");
	$("#file-6i2l").css("background-color","#35BD40");
	$("#file-6i2l").css("background-image","url('check.svg')");
	$("#file-6i2l").css("background-repeat","no-repeat");
	$("#file-6i2l").css("background-position","center");
	$("#file-6i2l").css("background-size","50px 30px");
});
$("#file-6i3").change(function(){
	$("#file-6i3l").css("border","none");
	$("#file-6i3l").css("background-color","#35BD40");
	$("#file-6i3l").css("background-image","url('check.svg')");
	$("#file-6i3l").css("background-repeat","no-repeat");
	$("#file-6i3l").css("background-position","center");
	$("#file-6i3l").css("background-size","50px 30px");
});
$("#file-6i4").change(function(){
	$("#file-6i4l").css("border","none");
	$("#file-6i4l").css("background-color","#35BD40");
	$("#file-6i4l").css("background-image","url('check.svg')");
	$("#file-6i4l").css("background-repeat","no-repeat");
	$("#file-6i4l").css("background-position","center");
	$("#file-6i4l").css("background-size","50px 30px");
});
$("#file-6i5").change(function(){
	$("#file-6i5l").css("border","none");
	$("#file-6i5l").css("background-color","#35BD40");
	$("#file-6i5l").css("background-image","url('check.svg')");
	$("#file-6i5l").css("background-repeat","no-repeat");
	$("#file-6i5l").css("background-position","center");
	$("#file-6i5l").css("background-size","50px 30px");
});
$("#file-6i6").change(function(){
	$("#file-6i6l").css("border","none");
	$("#file-6i6l").css("background-color","#35BD40");
	$("#file-6i6l").css("background-image","url('check.svg')");
	$("#file-6i6l").css("background-repeat","no-repeat");
	$("#file-6i6l").css("background-position","center");
	$("#file-6i6l").css("background-size","50px 30px");
});
$("#file-6i7").change(function(){
	$("#file-6i7l").css("border","none");
	$("#file-6i7l").css("background-color","#35BD40");
	$("#file-6i7l").css("background-image","url('check.svg')");
	$("#file-6i7l").css("background-repeat","no-repeat");
	$("#file-6i7l").css("background-position","center");
	$("#file-6i7l").css("background-size","50px 30px");
});
$("#file-6i8").change(function(){
	$("#file-6i8l").css("border","none");
	$("#file-6i8l").css("background-color","#35BD40");
	$("#file-6i8l").css("background-image","url('check.svg')");
	$("#file-6i8l").css("background-repeat","no-repeat");
	$("#file-6i8l").css("background-position","center");
	$("#file-6i8l").css("background-size","50px 30px");
});
$("#file-6i9").change(function(){
	$("#file-6i9l").css("border","none");
	$("#file-6i9l").css("background-color","#35BD40");
	$("#file-6i9l").css("background-image","url('check.svg')");
	$("#file-6i9l").css("background-repeat","no-repeat");
	$("#file-6i9l").css("background-position","center");
	$("#file-6i9l").css("background-size","50px 30px");
});
$("#file-6i10").change(function(){
	$("#file-6i10l").css("border","none");
	$("#file-6i10l").css("background-color","#35BD40");
	$("#file-6i10l").css("background-image","url('check.svg')");
	$("#file-6i10l").css("background-repeat","no-repeat");
	$("#file-6i10l").css("background-position","center");
	$("#file-6i10l").css("background-size","50px 30px");
});
$("#file-6i11").change(function(){
	$("#file-6i11l").css("border","none");
	$("#file-6i11l").css("background-color","#35BD40");
	$("#file-6i11l").css("background-image","url('check.svg')");
	$("#file-6i11l").css("background-repeat","no-repeat");
	$("#file-6i11l").css("background-position","center");
	$("#file-6i11l").css("background-size","50px 30px");
});
$("#file-6i12").change(function(){
	$("#file-6i12l").css("border","none");
	$("#file-6i12l").css("background-color","#35BD40");
	$("#file-6i12l").css("background-image","url('check.svg')");
	$("#file-6i12l").css("background-repeat","no-repeat");
	$("#file-6i12l").css("background-position","center");
	$("#file-6i12l").css("background-size","50px 30px");
});
$("#file-6o1").change(function(){
	$("#file-6o1l").css("border","none");
	$("#file-6o1l").css("background-color","#35BD40");
	$("#file-6o1l").css("background-image","url('check.svg')");
	$("#file-6o1l").css("background-repeat","no-repeat");
	$("#file-6o1l").css("background-position","center");
	$("#file-6o1l").css("background-size","50px 30px");
});
$("#file-6o2").change(function(){
	$("#file-6o2l").css("border","none");
	$("#file-6o2l").css("background-color","#35BD40");
	$("#file-6o2l").css("background-image","url('check.svg')");
	$("#file-6o2l").css("background-repeat","no-repeat");
	$("#file-6o2l").css("background-position","center");
	$("#file-6o2l").css("background-size","50px 30px");
});
$("#file-6o3").change(function(){
	$("#file-6o3l").css("border","none");
	$("#file-6o3l").css("background-color","#35BD40");
	$("#file-6o3l").css("background-image","url('check.svg')");
	$("#file-6o3l").css("background-repeat","no-repeat");
	$("#file-6o3l").css("background-position","center");
	$("#file-6o3l").css("background-size","50px 30px");
});
$("#file-6o4").change(function(){
	$("#file-6o4l").css("border","none");
	$("#file-6o4l").css("background-color","#35BD40");
	$("#file-6o4l").css("background-image","url('check.svg')");
	$("#file-6o4l").css("background-repeat","no-repeat");
	$("#file-6o4l").css("background-position","center");
	$("#file-6o4l").css("background-size","50px 30px");
});
$("#file-6o5").change(function(){
	$("#file-6o5l").css("border","none");
	$("#file-6o5l").css("background-color","#35BD40");
	$("#file-6o5l").css("background-image","url('check.svg')");
	$("#file-6o5l").css("background-repeat","no-repeat");
	$("#file-6o5l").css("background-position","center");
	$("#file-6o5l").css("background-size","50px 30px");
});
$("#file-6o6").change(function(){
	$("#file-6o6l").css("border","none");
	$("#file-6o6l").css("background-color","#35BD40");
	$("#file-6o6l").css("background-image","url('check.svg')");
	$("#file-6o6l").css("background-repeat","no-repeat");
	$("#file-6o6l").css("background-position","center");
	$("#file-6o6l").css("background-size","50px 30px");
});
$("#file-6o7").change(function(){
	$("#file-6o7l").css("border","none");
	$("#file-6o7l").css("background-color","#35BD40");
	$("#file-6o7l").css("background-image","url('check.svg')");
	$("#file-6o7l").css("background-repeat","no-repeat");
	$("#file-6o7l").css("background-position","center");
	$("#file-6o7l").css("background-size","50px 30px");
});
$("#file-6o8").change(function(){
	$("#file-6o8l").css("border","none");
	$("#file-6o8l").css("background-color","#35BD40");
	$("#file-6o8l").css("background-image","url('check.svg')");
	$("#file-6o8l").css("background-repeat","no-repeat");
	$("#file-6o8l").css("background-position","center");
	$("#file-6o8l").css("background-size","50px 30px");
});
$("#file-6o9").change(function(){
	$("#file-6o9l").css("border","none");
	$("#file-6o9l").css("background-color","#35BD40");
	$("#file-6o9l").css("background-image","url('check.svg')");
	$("#file-6o9l").css("background-repeat","no-repeat");
	$("#file-6o9l").css("background-position","center");
	$("#file-6o9l").css("background-size","50px 30px");
});
$("#file-6o10").change(function(){
	$("#file-6o10l").css("border","none");
	$("#file-6o10l").css("background-color","#35BD40");
	$("#file-6o10l").css("background-image","url('check.svg')");
	$("#file-6o10l").css("background-repeat","no-repeat");
	$("#file-6o10l").css("background-position","center");
	$("#file-6o10l").css("background-size","50px 30px");
});
$("#file-6o11").change(function(){
	$("#file-6o11l").css("border","none");
	$("#file-6o11l").css("background-color","#35BD40");
	$("#file-6o11l").css("background-image","url('check.svg')");
	$("#file-6o11l").css("background-repeat","no-repeat");
	$("#file-6o11l").css("background-position","center");
	$("#file-6o11l").css("background-size","50px 30px");
});
$("#file-6o12").change(function(){
	$("#file-6o12l").css("border","none");
	$("#file-6o12l").css("background-color","#35BD40");
	$("#file-6o12l").css("background-image","url('check.svg')");
	$("#file-6o12l").css("background-repeat","no-repeat");
	$("#file-6o12l").css("background-position","center");
	$("#file-6o12l").css("background-size","50px 30px");
});
$("#file-pdf7").change(function(){
	$("#file-pdf7l").css("border","none");
	$("#file-pdf7l").css("background-color","#35BD40");
	$("#file-pdf7l").css("background-image","url('check.svg')");
	$("#file-pdf7l").css("background-repeat","no-repeat");
	$("#file-pdf7l").css("background-position","center");
	$("#file-pdf7l").css("background-size","50px 30px");
});
$("#file-7i1").change(function(){
	$("#file-7i1l").css("border","none");
	$("#file-7i1l").css("background-color","#35BD40");
	$("#file-7i1l").css("background-image","url('check.svg')");
	$("#file-7i1l").css("background-repeat","no-repeat");
	$("#file-7i1l").css("background-position","center");
	$("#file-7i1l").css("background-size","50px 30px");
});
$("#file-7i2").change(function(){
	$("#file-7i2l").css("border","none");
	$("#file-7i2l").css("background-color","#35BD40");
	$("#file-7i2l").css("background-image","url('check.svg')");
	$("#file-7i2l").css("background-repeat","no-repeat");
	$("#file-7i2l").css("background-position","center");
	$("#file-7i2l").css("background-size","50px 30px");
});
$("#file-7i3").change(function(){
	$("#file-7i3l").css("border","none");
	$("#file-7i3l").css("background-color","#35BD40");
	$("#file-7i3l").css("background-image","url('check.svg')");
	$("#file-7i3l").css("background-repeat","no-repeat");
	$("#file-7i3l").css("background-position","center");
	$("#file-7i3l").css("background-size","50px 30px");
});
$("#file-7i4").change(function(){
	$("#file-7i4l").css("border","none");
	$("#file-7i4l").css("background-color","#35BD40");
	$("#file-7i4l").css("background-image","url('check.svg')");
	$("#file-7i4l").css("background-repeat","no-repeat");
	$("#file-7i4l").css("background-position","center");
	$("#file-7i4l").css("background-size","50px 30px");
});
$("#file-7i5").change(function(){
	$("#file-7i5l").css("border","none");
	$("#file-7i5l").css("background-color","#35BD40");
	$("#file-7i5l").css("background-image","url('check.svg')");
	$("#file-7i5l").css("background-repeat","no-repeat");
	$("#file-7i5l").css("background-position","center");
	$("#file-7i5l").css("background-size","50px 30px");
});
$("#file-7i6").change(function(){
	$("#file-7i6l").css("border","none");
	$("#file-7i6l").css("background-color","#35BD40");
	$("#file-7i6l").css("background-image","url('check.svg')");
	$("#file-7i6l").css("background-repeat","no-repeat");
	$("#file-7i6l").css("background-position","center");
	$("#file-7i6l").css("background-size","50px 30px");
});
$("#file-7i7").change(function(){
	$("#file-7i7l").css("border","none");
	$("#file-7i7l").css("background-color","#35BD40");
	$("#file-7i7l").css("background-image","url('check.svg')");
	$("#file-7i7l").css("background-repeat","no-repeat");
	$("#file-7i7l").css("background-position","center");
	$("#file-7i7l").css("background-size","50px 30px");
});
$("#file-7i8").change(function(){
	$("#file-7i8l").css("border","none");
	$("#file-7i8l").css("background-color","#35BD40");
	$("#file-7i8l").css("background-image","url('check.svg')");
	$("#file-7i8l").css("background-repeat","no-repeat");
	$("#file-7i8l").css("background-position","center");
	$("#file-7i8l").css("background-size","50px 30px");
});
$("#file-7i9").change(function(){
	$("#file-7i9l").css("border","none");
	$("#file-7i9l").css("background-color","#35BD40");
	$("#file-7i9l").css("background-image","url('check.svg')");
	$("#file-7i9l").css("background-repeat","no-repeat");
	$("#file-7i9l").css("background-position","center");
	$("#file-7i9l").css("background-size","50px 30px");
});
$("#file-7i10").change(function(){
	$("#file-7i10l").css("border","none");
	$("#file-7i10l").css("background-color","#35BD40");
	$("#file-7i10l").css("background-image","url('check.svg')");
	$("#file-7i10l").css("background-repeat","no-repeat");
	$("#file-7i10l").css("background-position","center");
	$("#file-7i10l").css("background-size","50px 30px");
});
$("#file-7i11").change(function(){
	$("#file-7i11l").css("border","none");
	$("#file-7i11l").css("background-color","#35BD40");
	$("#file-7i11l").css("background-image","url('check.svg')");
	$("#file-7i11l").css("background-repeat","no-repeat");
	$("#file-7i11l").css("background-position","center");
	$("#file-7i11l").css("background-size","50px 30px");
});
$("#file-7i12").change(function(){
	$("#file-7i12l").css("border","none");
	$("#file-7i12l").css("background-color","#35BD40");
	$("#file-7i12l").css("background-image","url('check.svg')");
	$("#file-7i12l").css("background-repeat","no-repeat");
	$("#file-7i12l").css("background-position","center");
	$("#file-7i12l").css("background-size","50px 30px");
});
$("#file-7o1").change(function(){
	$("#file-7o1l").css("border","none");
	$("#file-7o1l").css("background-color","#35BD40");
	$("#file-7o1l").css("background-image","url('check.svg')");
	$("#file-7o1l").css("background-repeat","no-repeat");
	$("#file-7o1l").css("background-position","center");
	$("#file-7o1l").css("background-size","50px 30px");
});
$("#file-7o2").change(function(){
	$("#file-7o2l").css("border","none");
	$("#file-7o2l").css("background-color","#35BD40");
	$("#file-7o2l").css("background-image","url('check.svg')");
	$("#file-7o2l").css("background-repeat","no-repeat");
	$("#file-7o2l").css("background-position","center");
	$("#file-7o2l").css("background-size","50px 30px");
});
$("#file-7o3").change(function(){
	$("#file-7o3l").css("border","none");
	$("#file-7o3l").css("background-color","#35BD40");
	$("#file-7o3l").css("background-image","url('check.svg')");
	$("#file-7o3l").css("background-repeat","no-repeat");
	$("#file-7o3l").css("background-position","center");
	$("#file-7o3l").css("background-size","50px 30px");
});
$("#file-7o4").change(function(){
	$("#file-7o4l").css("border","none");
	$("#file-7o4l").css("background-color","#35BD40");
	$("#file-7o4l").css("background-image","url('check.svg')");
	$("#file-7o4l").css("background-repeat","no-repeat");
	$("#file-7o4l").css("background-position","center");
	$("#file-7o4l").css("background-size","50px 30px");
});
$("#file-7o5").change(function(){
	$("#file-7o5l").css("border","none");
	$("#file-7o5l").css("background-color","#35BD40");
	$("#file-7o5l").css("background-image","url('check.svg')");
	$("#file-7o5l").css("background-repeat","no-repeat");
	$("#file-7o5l").css("background-position","center");
	$("#file-7o5l").css("background-size","50px 30px");
});
$("#file-7o6").change(function(){
	$("#file-7o6l").css("border","none");
	$("#file-7o6l").css("background-color","#35BD40");
	$("#file-7o6l").css("background-image","url('check.svg')");
	$("#file-7o6l").css("background-repeat","no-repeat");
	$("#file-7o6l").css("background-position","center");
	$("#file-7o6l").css("background-size","50px 30px");
});
$("#file-7o7").change(function(){
	$("#file-7o7l").css("border","none");
	$("#file-7o7l").css("background-color","#35BD40");
	$("#file-7o7l").css("background-image","url('check.svg')");
	$("#file-7o7l").css("background-repeat","no-repeat");
	$("#file-7o7l").css("background-position","center");
	$("#file-7o7l").css("background-size","50px 30px");
});
$("#file-7o8").change(function(){
	$("#file-7o8l").css("border","none");
	$("#file-7o8l").css("background-color","#35BD40");
	$("#file-7o8l").css("background-image","url('check.svg')");
	$("#file-7o8l").css("background-repeat","no-repeat");
	$("#file-7o8l").css("background-position","center");
	$("#file-7o8l").css("background-size","50px 30px");
});
$("#file-7o9").change(function(){
	$("#file-7o9l").css("border","none");
	$("#file-7o9l").css("background-color","#35BD40");
	$("#file-7o9l").css("background-image","url('check.svg')");
	$("#file-7o9l").css("background-repeat","no-repeat");
	$("#file-7o9l").css("background-position","center");
	$("#file-7o9l").css("background-size","50px 30px");
});
$("#file-7o10").change(function(){
	$("#file-7o10l").css("border","none");
	$("#file-7o10l").css("background-color","#35BD40");
	$("#file-7o10l").css("background-image","url('check.svg')");
	$("#file-7o10l").css("background-repeat","no-repeat");
	$("#file-7o10l").css("background-position","center");
	$("#file-7o10l").css("background-size","50px 30px");
});
$("#file-7o11").change(function(){
	$("#file-7o11l").css("border","none");
	$("#file-7o11l").css("background-color","#35BD40");
	$("#file-7o11l").css("background-image","url('check.svg')");
	$("#file-7o11l").css("background-repeat","no-repeat");
	$("#file-7o11l").css("background-position","center");
	$("#file-7o11l").css("background-size","50px 30px");
});
$("#file-7o12").change(function(){
	$("#file-7o12l").css("border","none");
	$("#file-7o12l").css("background-color","#35BD40");
	$("#file-7o12l").css("background-image","url('check.svg')");
	$("#file-7o12l").css("background-repeat","no-repeat");
	$("#file-7o12l").css("background-position","center");
	$("#file-7o12l").css("background-size","50px 30px");
});
$("#file-pdfpc1").change(function(){
	$("#file-pdfpc1l").css("border","none");
	$("#file-pdfpc1l").css("background-color","#35BD40");
	$("#file-pdfpc1l").css("background-image","url('check.svg')");
	$("#file-pdfpc1l").css("background-repeat","no-repeat");
	$("#file-pdfpc1l").css("background-position","center");
	$("#file-pdfpc1l").css("background-size","50px 30px");
});
$("#file-1ipc1").change(function(){
	$("#file-1ipc1l").css("border","none");
	$("#file-1ipc1l").css("background-color","#35BD40");
	$("#file-1ipc1l").css("background-image","url('check.svg')");
	$("#file-1ipc1l").css("background-repeat","no-repeat");
	$("#file-1ipc1l").css("background-position","center");
	$("#file-1ipc1l").css("background-size","50px 30px");
});
$("#file-1ipc2").change(function(){
	$("#file-1ipc2l").css("border","none");
	$("#file-1ipc2l").css("background-color","#35BD40");
	$("#file-1ipc2l").css("background-image","url('check.svg')");
	$("#file-1ipc2l").css("background-repeat","no-repeat");
	$("#file-1ipc2l").css("background-position","center");
	$("#file-1ipc2l").css("background-size","50px 30px");
});
$("#file-1ipc3").change(function(){
	$("#file-1ipc3l").css("border","none");
	$("#file-1ipc3l").css("background-color","#35BD40");
	$("#file-1ipc3l").css("background-image","url('check.svg')");
	$("#file-1ipc3l").css("background-repeat","no-repeat");
	$("#file-1ipc3l").css("background-position","center");
	$("#file-1ipc3l").css("background-size","50px 30px");
});
$("#file-1ipc4").change(function(){
	$("#file-1ipc4l").css("border","none");
	$("#file-1ipc4l").css("background-color","#35BD40");
	$("#file-1ipc4l").css("background-image","url('check.svg')");
	$("#file-1ipc4l").css("background-repeat","no-repeat");
	$("#file-1ipc4l").css("background-position","center");
	$("#file-1ipc4l").css("background-size","50px 30px");
});
$("#file-1ipc5").change(function(){
	$("#file-1ipc5l").css("border","none");
	$("#file-1ipc5l").css("background-color","#35BD40");
	$("#file-1ipc5l").css("background-image","url('check.svg')");
	$("#file-1ipc5l").css("background-repeat","no-repeat");
	$("#file-1ipc5l").css("background-position","center");
	$("#file-1ipc5l").css("background-size","50px 30px");
});
$("#file-1ipc6").change(function(){
	$("#file-1ipc6l").css("border","none");
	$("#file-1ipc6l").css("background-color","#35BD40");
	$("#file-1ipc6l").css("background-image","url('check.svg')");
	$("#file-1ipc6l").css("background-repeat","no-repeat");
	$("#file-1ipc6l").css("background-position","center");
	$("#file-1ipc6l").css("background-size","50px 30px");
});
$("#file-1ipc7").change(function(){
	$("#file-1ipc7l").css("border","none");
	$("#file-1ipc7l").css("background-color","#35BD40");
	$("#file-1ipc7l").css("background-image","url('check.svg')");
	$("#file-1ipc7l").css("background-repeat","no-repeat");
	$("#file-1ipc7l").css("background-position","center");
	$("#file-1ipc7l").css("background-size","50px 30px");
});
$("#file-1ipc8").change(function(){
	$("#file-1ipc8l").css("border","none");
	$("#file-1ipc8l").css("background-color","#35BD40");
	$("#file-1ipc8l").css("background-image","url('check.svg')");
	$("#file-1ipc8l").css("background-repeat","no-repeat");
	$("#file-1ipc8l").css("background-position","center");
	$("#file-1ipc8l").css("background-size","50px 30px");
});
$("#file-1ipc9").change(function(){
	$("#file-1ipc9l").css("border","none");
	$("#file-1ipc9l").css("background-color","#35BD40");
	$("#file-1ipc9l").css("background-image","url('check.svg')");
	$("#file-1ipc9l").css("background-repeat","no-repeat");
	$("#file-1ipc9l").css("background-position","center");
	$("#file-1ipc9l").css("background-size","50px 30px");
});
$("#file-1ipc10").change(function(){
	$("#file-1ipc10l").css("border","none");
	$("#file-1ipc10l").css("background-color","#35BD40");
	$("#file-1ipc10l").css("background-image","url('check.svg')");
	$("#file-1ipc10l").css("background-repeat","no-repeat");
	$("#file-1ipc10l").css("background-position","center");
	$("#file-1ipc10l").css("background-size","50px 30px");
});
$("#file-1ipc11").change(function(){
	$("#file-1ipc11l").css("border","none");
	$("#file-1ipc11l").css("background-color","#35BD40");
	$("#file-1ipc11l").css("background-image","url('check.svg')");
	$("#file-1ipc11l").css("background-repeat","no-repeat");
	$("#file-1ipc11l").css("background-position","center");
	$("#file-1ipc11l").css("background-size","50px 30px");
});
$("#file-1ipc12").change(function(){
	$("#file-1ipc12l").css("border","none");
	$("#file-1ipc12l").css("background-color","#35BD40");
	$("#file-1ipc12l").css("background-image","url('check.svg')");
	$("#file-1ipc12l").css("background-repeat","no-repeat");
	$("#file-1ipc12l").css("background-position","center");
	$("#file-1ipc12l").css("background-size","50px 30px");
});
$("#file-1opc1").change(function(){
	$("#file-1opc1l").css("border","none");
	$("#file-1opc1l").css("background-color","#35BD40");
	$("#file-1opc1l").css("background-image","url('check.svg')");
	$("#file-1opc1l").css("background-repeat","no-repeat");
	$("#file-1opc1l").css("background-position","center");
	$("#file-1opc1l").css("background-size","50px 30px");
});
$("#file-1opc2").change(function(){
	$("#file-1opc2l").css("border","none");
	$("#file-1opc2l").css("background-color","#35BD40");
	$("#file-1opc2l").css("background-image","url('check.svg')");
	$("#file-1opc2l").css("background-repeat","no-repeat");
	$("#file-1opc2l").css("background-position","center");
	$("#file-1opc2l").css("background-size","50px 30px");
});
$("#file-1opc3").change(function(){
	$("#file-1opc3l").css("border","none");
	$("#file-1opc3l").css("background-color","#35BD40");
	$("#file-1opc3l").css("background-image","url('check.svg')");
	$("#file-1opc3l").css("background-repeat","no-repeat");
	$("#file-1opc3l").css("background-position","center");
	$("#file-1opc3l").css("background-size","50px 30px");
});
$("#file-1opc4").change(function(){
	$("#file-1opc4l").css("border","none");
	$("#file-1opc4l").css("background-color","#35BD40");
	$("#file-1opc4l").css("background-image","url('check.svg')");
	$("#file-1opc4l").css("background-repeat","no-repeat");
	$("#file-1opc4l").css("background-position","center");
	$("#file-1opc4l").css("background-size","50px 30px");
});
$("#file-1opc5").change(function(){
	$("#file-1opc5l").css("border","none");
	$("#file-1opc5l").css("background-color","#35BD40");
	$("#file-1opc5l").css("background-image","url('check.svg')");
	$("#file-1opc5l").css("background-repeat","no-repeat");
	$("#file-1opc5l").css("background-position","center");
	$("#file-1opc5l").css("background-size","50px 30px");
});
$("#file-1opc6").change(function(){
	$("#file-1opc6l").css("border","none");
	$("#file-1opc6l").css("background-color","#35BD40");
	$("#file-1opc6l").css("background-image","url('check.svg')");
	$("#file-1opc6l").css("background-repeat","no-repeat");
	$("#file-1opc6l").css("background-position","center");
	$("#file-1opc6l").css("background-size","50px 30px");
});
$("#file-1opc7").change(function(){
	$("#file-1opc7l").css("border","none");
	$("#file-1opc7l").css("background-color","#35BD40");
	$("#file-1opc7l").css("background-image","url('check.svg')");
	$("#file-1opc7l").css("background-repeat","no-repeat");
	$("#file-1opc7l").css("background-position","center");
	$("#file-1opc7l").css("background-size","50px 30px");
});
$("#file-1opc8").change(function(){
	$("#file-1opc8l").css("border","none");
	$("#file-1opc8l").css("background-color","#35BD40");
	$("#file-1opc8l").css("background-image","url('check.svg')");
	$("#file-1opc8l").css("background-repeat","no-repeat");
	$("#file-1opc8l").css("background-position","center");
	$("#file-1opc8l").css("background-size","50px 30px");
});
$("#file-1opc9").change(function(){
	$("#file-1opc9l").css("border","none");
	$("#file-1opc9l").css("background-color","#35BD40");
	$("#file-1opc9l").css("background-image","url('check.svg')");
	$("#file-1opc9l").css("background-repeat","no-repeat");
	$("#file-1opc9l").css("background-position","center");
	$("#file-1opc9l").css("background-size","50px 30px");
});
$("#file-1opc10").change(function(){
	$("#file-1opc10l").css("border","none");
	$("#file-1opc10l").css("background-color","#35BD40");
	$("#file-1opc10l").css("background-image","url('check.svg')");
	$("#file-1opc10l").css("background-repeat","no-repeat");
	$("#file-1opc10l").css("background-position","center");
	$("#file-1opc10l").css("background-size","50px 30px");
});
$("#file-1opc11").change(function(){
	$("#file-1opc11l").css("border","none");
	$("#file-1opc11l").css("background-color","#35BD40");
	$("#file-1opc11l").css("background-image","url('check.svg')");
	$("#file-1opc11l").css("background-repeat","no-repeat");
	$("#file-1opc11l").css("background-position","center");
	$("#file-1opc11l").css("background-size","50px 30px");
});
$("#file-1opc12").change(function(){
	$("#file-1opc12l").css("border","none");
	$("#file-1opc12l").css("background-color","#35BD40");
	$("#file-1opc12l").css("background-image","url('check.svg')");
	$("#file-1opc12l").css("background-repeat","no-repeat");
	$("#file-1opc12l").css("background-position","center");
	$("#file-1opc12l").css("background-size","50px 30px");
});
</script>
<script>
  $('#message_close').hover(function(){
    $("#message_close").css("cursor","pointer");
  });
  $('#message_close').click(function(){
    $('#message').fadeOut(1000).remove();
  });
</script>
