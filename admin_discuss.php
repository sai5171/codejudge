<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("location: home");
	if($_SESSION['email']!='codeit@vidyanikethan.asia')
		header("location: discuss");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Discuss</title>
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
					z-index: 3;
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
			#body_display {
				display:none;
			}
			.comments_view:hover {
				cursor: pointer;
				text-decoration: underline;
			}
			hr {
				clear:both;
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
		<script>
			function fun()
			{
				document.getElementById("body_display").style.display="block";
			}
		</script>
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
		<!--  post starts -->
		<div style="
				position:relative;
				background-color: #ffffff;
				margin-left: auto;
				margin-right: auto;
				margin-top: 30px;
				width: 900px;
				padding: 5px 10px 10px 10px;
				border-radius: 3px;
				box-shadow: 0 1px 2px rgba(0,0,0,0.3);
			">
			<h3 style="position:relative;padding: 0px 0px 0px 10px;"> What do you want to discuss?</h3><br/>
			<div style="position:relative;padding: 0px 0px 0px 10px;">
				<textarea  name="post" id="post"  style="line-height: 20px;width:75%;resize: none;color:black;background-color:#eee;border:1px solid #aaa;" rows="7" cols="12" spellcheck="false"></textarea><br/><br/>
				<button type="button" onclick="new_post()" class="btn btn-default" name="register_btn">POST</button>
			</div>
		</div>
		<div id="post_new">
				<?php
					$servername = "127.0.0.1";
					$username = "root";
					$password = "$@!Sai5171";
					$database = "codejudge";
					$con =  mysqli_connect($servername, $username, $password,$database);
					$result = mysqli_query($con,"SELECT * FROM posts ORDER BY date DESC LIMIT 5 OFFSET 0");
					while($row = mysqli_fetch_array($result))
					{
						echo "<div style='position:relative;background-color: #ffffff;margin-left: auto;margin-right: auto;margin-top: 12px;width: 900px;padding: 5px 10px 10px 10px;border-radius: 3px;box-shadow: 0 1px 2px rgba(0,0,0,0.3);border-top: 1px solid #b92b27;border-bottom: 1px solid #b92b27;border-left: thick solid #CF494C;border-right: 1px solid #b92b27;'>";
								echo "<div style='padding: 10px 0px 0px 10px;'>";
									$email=$row['email'];
									$result1 = mysqli_query($con,"SELECT * FROM users where email='$email'");
									$row1 = mysqli_fetch_array($result1);
									if($row1['image']=="")
										echo "<div style='float:left;width: 35px;height: 35px;background: url(icon.png);background-position: center;background-size: cover;border-radius: 100%;'></div>";
									else
										echo "<div style='float:left;width: 35px;height: 35px;background: url(data:image/jpeg;base64,".base64_encode( $row1['image'] ).");background-position: center;background-size: cover;border-radius: 100%;'></div>";
									$result2 = mysqli_query($con,"SELECT * FROM users where email='$email'");
									$row2 = mysqli_fetch_array($result2);
									echo "<div style='float:left;padding:7px 0px 0px 30px;'><p style='color: #33333D;font-size:14px;'><b>".$row2['name']."</b></p></div>";
									echo "<div style='float:right;padding:7px 0px 0px 30px;'><p style='color: #546673;font-size:14px;'>".timeAgo($row['date'])."</p></div>";
									echo "<br><br><hr>";
										echo "<div style='position:relative;padding: 0px 10px 10px 0px;color:#1d2129;line-height: 20px;'>";
										$message = nl2br(htmlspecialchars($row['text']));
										echo "<p style='font-size:14px;font-weight: normal;line-height: 1.38;'>".$message."</p>";
										//echo $message;
										echo "<hr>";
										$id=$row['post_id'];
										$result2 = mysqli_query($con,"SELECT * FROM comments where post_id='$id'");
										$count=mysqli_num_rows($result2);
										echo "<div class='comments_view' data-post_val='$id' style='position:relative;padding: 0px 10px 10px 0px;color:#546673;line-height: 20px;'>comments - $count</div>";
										echo "<img class='comments_gif' id='loading_post' style='50px;display:none;' src='post.gif'>";
											echo "<div class='comments'>";
												echo "<div class='comment'>";
												echo "</div>";
												echo "<input type='hidden' class='com_id' value='-1'/>";
											  echo "<input type='hidden' class='post_id' value='$id'/><br><br>";
											  echo "<input class='new_comment' post_val='$id' style='margin-left:50px;width:500px;display:none;' type='text' placeholder='comment' />";
											echo "</div>";
				            echo "</div>";
				        echo "</div>";
				    echo "</div>";
						$mysqli_close($con);
					}
				?>
		</div>
		<div id='see_more' style="position:relative;margin-left: auto;margin-right: auto;margin-top: 30px;width: 900px;">
			<input type='hidden' id='post-value' value='0'/>
			<img id='loading_post' style='50px;' src="post.gif">
		</div>
		<!--  post ends -->
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
<script type="text/javascript">
	$( ".comments_view" ).click(function() {
		var post_id = $(this).attr('data-post_val');
		var $this = $(this).parent().children('.comments_gif');
		$this.parent().children('.comments_gif').show();
		$this.parent().children('.comments_view').remove();
		$this.parent().children('.comments').children('.new_comment').css("display", "");
		setInterval(function () {
			var com_id = $this.parent().children('.comments').children('.com_id').val();
			var post_id = $this.parent().children('.comments').children('.post_id').val();
			$.ajax({
				type : 'post',
				async : false,
				url : 'view_comments',
				data: {com_id:com_id,post_id:post_id},
				success: function(output){
					var split = output.split('$@!');
					$this.parent().children('.comments').children('.com_id').val(split[1]);
					$this.parent().children('.comments').children('.comment').append(split[0]);
				},
				complete: function(){
				}
			});
			$this.parent().children('.comments_gif').hide();
		}, 3000);
	});
	$('.new_comment').keyup(function(e){
		if(e.which == 13){
			var post_id = $(this).attr('post_val');
			var comment = $(this).val();
			if(comment!='' && $.trim(comment).length != 0)
			{
				$('.new_comment').val('');
				var $this = $(this);
				$.post('new_comments',{post_id:post_id,comment:comment},function(output){
					$this.parent().children('.comment').append(output);
				});
			}
		}
	});
	$(window).scroll(function() {
		if($(window).scrollTop()==$(document).height()-$(window).height())	{
			var num =parseInt($('#post-value').val());
			num=num+parseInt(5);
			$('#post-value').val(num);
			$.post('new_post',{num:num},function(output){
				$('#post').val("");
				var output1 = output.substring(1, 7);
				//$('#post_new').slideDown('slow').append(output).hide().fadeIn('slow')
				if(output1=="script") {
					$('#see_more').hide();
				}
				$('#post_new').append(output)
			});
		}
	});
	function new_post() {
		var post = $('#post').val();
		if(post=="")
			;
		else if( $.trim(post).length == 0 )
			;
		else
		{
			$.post('discuss_s',{post:post},function(output){
				$('#post').val("");
				$('#post_new').slideDown('slow').prepend(output).hide().fadeIn('slow');
				//$('#post_new').prepend(output)
			});
		}
	};
</script>
<?php
	function timeAgo($time_ago)
	{
		$time_ago = strtotime($time_ago);
		$cur_time   = time();
		$time_elapsed   = $cur_time - $time_ago;
		$seconds    = $time_elapsed ;
		$minutes    = round($time_elapsed / 60 );
		$hours      = round($time_elapsed / 3600);
		$days       = round($time_elapsed / 86400 );
		$weeks      = round($time_elapsed / 604800);
		$months     = round($time_elapsed / 2600640 );
		$years      = round($time_elapsed / 31207680 );

		// Seconds
		if($seconds <= 60)
		{
			return "just now";
		}
		//Minutes
		else if($minutes <=60)
		{
			if($minutes==1)
			{
				return "one minute ago";
			}
			else
			{
				return "$minutes minutes ago";
			}
		}
		//Hours
		else if($hours <=24)
		{
			if($hours==1)
			{
				return "an hour ago";
			}
			else
			{
				return "$hours hrs ago";
			}
		}
		//Days
		else if($days <= 7)
			{
			if($days==1)
			{
				return "yesterday";
			}
			else
			{
				return "$days days ago";
			}
		}
		//Weeks
		else if($weeks <= 4.3)
		{
			if($weeks==1)
			{
				return "a week ago";
			}
			else
			{
				return "$weeks weeks ago";
			}
		}
		//Months
		else if($months <=12)
		{
			if($months==1)
			{
				return "a month ago";
			}
			else
			{
				return "$months months ago";
			}
		}
		//Years
		else
		{
			if($years==1)
			{
				return "one year ago";
			}
			else
			{
				return "$years years ago";
			}
		}
	}
?>
