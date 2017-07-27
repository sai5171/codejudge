<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']!='codeit@vidyanikethan.asia')
		header("location: compile_arena");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Compile Arena</title>
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
		<style type="text/css" media="screen">
		#editor {
			margin: 0;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
		}
		textarea:focus {
		  border: 1px solid rgba(81, 203, 238, 1);
		}
		#body_display {
			display:none;
		}
		</style>
	</head>
	<body id="body_display" onload="fun()">
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
		<div id="section" style="height: 1800px;">
			<h3>Compile Arena</h3>
			<p style='padding:0px 0px 0px 20px;'>Note :- you can code either in c or in c++</p><br>
			<p style="text-align: left;line-height: 26px;font-size: 16px;font-family:'My Custom Font';padding: 0px 0px 0px 20px;">Editor<br><br><br></p>
			<div id="editor" style="width: 1140px;margin-left: auto;margin-right: auto;margin-top:235px;height: 700px;border:1px solid #CF494C;">#include&lt;bits/stdc++.h&gt;

using namespace std;

int main() {
	// enter your code
	return 0;
}</div>
		<form id="form_basic">

			<p id='running_message'style='position:relative;top:675px;padding:0px 0px 0px 20px;'>Running ...</p>
			<img id='loading_image' style='position:relative;top:675px;width:100px;padding:0px 0px 0px 20px;' src="loading.gif">
			<span id='status' name='status' style="position:relative;top:675px;resize:none;width:500px;" id="output"></span>
			<input id='btn_submit' class="btn btn-default" name='register_btn' type="button" style='position:relative;top:675px;float:right;' value="Run">

			<?php
				$start_file = fopen("$@!1start.txt","r");
				$start_time = strtotime(fread($start_file,filesize("$@!1start.txt")));
				fclose($start_file);
				$stop_file = fopen("$@!1stop.txt","r");
				$stop_time = strtotime(fread($stop_file,filesize("$@!1stop.txt")));
				fclose($stop_file);
				$present_time = strtotime(date("Y-m-d\TH:i:s"));
				if($start_time <= $present_time && $present_time<= $stop_time)
				{
					if(isset($_GET['contestid']))
						$contestpid = $_GET['contestid'];
					echo "
					<input id='pb_submit' name='pb_submit' class='btn btn-default' type='button' style='position:relative;top:700px;float:right;clear:both;' value='Submit'>
					<input id='pb_id' name='pb_id' class='form-control' style='position:relative;top:702px;float:right;width: 50px;right:10px;height:36px;' type='text' maxlength='1' placeholder='' value='$contestpid'>
					<p style='position:relative;top:707px;float:right;width: 50px;right:150px;height:36px;'>CONTEST&nbsp;PROBLEM&nbsp;ID</p>";
				}
			?>
			<!---->
			<?php
				if(isset($_GET['practiceid']))
					$practicepid = $_GET['practiceid'];
				echo "
				<input id='pc_submit' name='pc_submit' class='btn btn-default' type='button' style='position:relative;top:700px;float:right;clear:both;' value='Submit'>
				<input id='pc_id' name='pc_id' class='form-control' style='position:relative;top:702px;float:right;width: 100px;right:10px;height:36px;' type='text' maxlength='10' placeholder='' value='$practicepid'>
				<p style='position:relative;top:707px;float:right;width: 50px;right:150px;height:36px;'>PRACTICE&nbsp;PROBLEM&nbsp;ID</p>";
			?>
			<!---->
			<textarea id="content_code" name="content_code" rows="13" cols="100" wrap="off" style=""></textarea>




			<p style="position:relative;top:525px;text-align: left;line-height: 26px;font-size: 16px;font-family:'My Custom Font';padding: 0px 0px 0px 20px;">Input</p>
			<textarea id="input_code" name="input_code" rows="12" cols="100" wrap="off" style="position:relative;top:525px;resize: none;color:black;background-color:#eee;border:1px solid #aaa;" spellcheck="false"></textarea>

			<p style="position:relative;top:525px;text-align: left;line-height: 26px;font-size: 16px;font-family:'My Custom Font';padding: 0px 0px 0px 20px;"><br>Output</p>
			<textarea id="output" name="output" rows="12" cols="100" wrap="off" style="position:relative;top:525px;resize: none;color:black;background-color:#eee;border:1px solid #aaa;" spellcheck="false" disabled></textarea>

		</form>
		</div>
		<footer>
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
		</footer>
	</body>
</html>
<script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	var editor = ace.edit("editor");
	/*editor.setTheme("ace/theme/clouds_midnight");*/
	editor.setTheme("ace/theme/xcode");
	editor.getSession().setMode("ace/mode/c_cpp");
	editor.setShowPrintMargin(false);
	editor.getSession().setTabSize(4);

	document.getElementById('editor').style.fontSize='14px';
</script>
<script type="text/javascript">
	var textarea = $('#content_code');
	editor.getSession().on('change', function () {
       textarea.val(editor.getSession().getValue());
   });
	textarea.val(editor.getSession().getValue());
</script>
<script>
	function fun()
	{
		document.getElementById("body_display").style.display="block";
	}
</script>



<!--Ajax-->
<script type="text/javascript">

$(document).ready(function()
{
	$('#loading_image').hide();
	$('#running_message').hide();
	$('#status').hide();
  $('#btn_submit').click(function()
	{
		$('#loading_image').show();
		$('#running_message').show();
		$('#status').hide();
    $.ajax(
		{
      type:"POST",
      url:"compile_arena_s_output",
      data: $("#form_basic").serialize(),
      success: function(response)
			{
				var divs = response.split('$@!');
				$("#status").html(divs[0]);
				$("#output").html(divs[1]);
			},
			complete: function()
			{
				$('#loading_image').hide();
				$('#running_message').hide();
				$('#status').show();
			}
    });
  });
	$('#pb_submit').click(function()
	{
		$('#loading_image').show();
		$('#running_message').show();
		$('#status').hide();
		$.ajax(
		{
			type:"POST",
			url:"submission",
			data: $("#form_basic").serialize(),
			success: function(response)
			{
				var divs = response.split('$@!');
				$("#status").html(divs[0]);
				$("#output").html(divs[1]);
			},
			complete: function()
			{
				$('#loading_image').hide();
				$('#running_message').hide();
				$('#status').show();
	  	}
		});
	});
	$('#pc_submit').click(function()
	{
		$('#loading_image').show();
		$('#running_message').show();
		$('#status').hide();
		$.ajax(
		{
			type:"POST",
			url:"practice_submission",
			data: $("#form_basic").serialize(),
			success: function(response)
			{
				var divs = response.split('$@!');
				$("#status").html(divs[0]);
				$("#output").html(divs[1]);
			},
			complete: function()
			{
				$('#loading_image').hide();
				$('#running_message').hide();
				$('#status').show();
	  	}
		});
	});
});


</script>
