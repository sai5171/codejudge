<?php
	session_start();
    if(!isset($_SESSION['username']))
        header("location: home");
    if($_SESSION['email']=='codeit@vidyanikethan.asia')
		header("location: admin_profile");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Account Updatation</title>
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
			<style>
					label {
						cursor:pointer;
					}
					#image_dp {
						width: 0.1px;
						height: 0.1px;
						 opacity: 0;
						 position: absolute;
						 z-index: -1;
						 overflow: hidden;
					position: absolute;

					}
        </style>
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
				</li>
			</ul>
		</nav>
        </div>
        <div style="padding: 75px 0px 0px 0px;"></div>
        <?php
            if(isset($_SESSION['profile_message']))
            {
                //echo "<div  id='section' style='height: 50px;background-color: #f2dede;border-color: #ebccd1;padding: 10px 10px 10px 20px;'>"."<strong style='text-align: center;color: #a94442;line-height: 26px;font-size: 16px;font-family:'My Custom Font';'>".$_SESSION['profile_message']."</strong>"."</div>";
								if($_SESSION['profile_message']=="Profile Successfully Updated")
				        {
				          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
				            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
				            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
				            <strong>".$_SESSION['profile_message']."</strong>
				            </div>";
				          echo "</div>";
				        }
								else if($_SESSION['profile_message']=="Password Successfully Updated")
				        {
				          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
				            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
				            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
				            <strong>".$_SESSION['profile_message']."</strong>
				            </div>";
				          echo "</div>";
				        }
								else if($_SESSION['profile_message']=="It's seems your new password matches with the current password!")
				        {
				          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
				            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
				            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
				            <strong>".$_SESSION['profile_message']."</strong>
				            </div>";
				          echo "</div>";
				        }
				        else if($_SESSION['profile_message']=="Invalid current password")
				        {
				          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
				            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
				            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
				            <strong>".$_SESSION['profile_message']."</strong>
				            </div>";
				          echo "</div>";
				        }
								else if($_SESSION['profile_message']=="File too large. File must be less than 100 kilobytes.")
				        {
				          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
				            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
				            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
				            <strong>".$_SESSION['profile_message']."</strong>
				            </div>";
				          echo "</div>";
				        }
								else if($_SESSION['profile_message']=="Please select an image.")
				        {
				          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
				            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
				            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
				            <strong>".$_SESSION['profile_message']."</strong>
				            </div>";
				          echo "</div>";
				        }
								else if($_SESSION['profile_message']=="Email id already exist")
				        {
				          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
				            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
				            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
				            <strong>".$_SESSION['profile_message']."</strong>
				            </div>";
				          echo "</div>";
				        }
								unset($_SESSION['profile_message']);
            }
        ?>
        <div id="section" style="height: 1000px;">
            <h3>Account Updatation</h3><br>
            <p style="text-align: left;line-height: 26px;font-size: 16px;font-family:'My Custom Font';padding: 0px 0px 0px 20px;">Hello <span style="color:#CF494C;font-size: 20px;">
            <?php echo $_SESSION['username'];?></span>, Would you like to update your info?<br><br><br></p>
            <form style="text-align:left;padding: 0px 0px 0px 20px;" method="post" enctype="multipart/form-data" action="profile_s1">
                <table style="width:50%">
                    <caption style="text-align: center;font-size: 16px;">Update your basic info<br><br><br></caption>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">Full Name&nbsp;</label>
                        </td>
                        <td width="20%">
                            <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
                            <input style="width: 250px;" minlength="3" maxlength="50" type="text" class="form-control" id="name" name="name" value='<?php
                            $servername = '127.0.0.1';
                            $username = 'root';
                            $password = '$@!Sai5171';
                            $database = 'codejudge';
                            $con =  mysqli_connect($servername, $username, $password,$database);
                            $email = $_SESSION['email'];
                            $extract= mysqli_query($con,"select * from users where email='$email'");
                            $row = mysqli_fetch_assoc($extract);
                            echo $row['name'];
                            mysqli_close($con);
                            ?>' required>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">Nick Name</label>
                        </td>
                        <td>
                            <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
                            <input style="width: 250px;" minlength="3" maxlength="25" type="text" class="form-control" id="nick" name="nick" value='<?php echo $_SESSION['username']; ?>' required>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">Email-id</label>
                        </td>
                        <td>
                            <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
                            <input style="width: 250px;" minlength="3" maxlength="50" type="email" class="form-control" id="email" name="email" value='<?php echo $_SESSION['email']; ?>' required>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">Current Password</label>
                        </td>
                        <td>
                            <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
                            <input style="width: 250px;" minlength="8" maxlength="50" type="Password" class="form-control" id="opassword" name="opassword" required>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">Profile picture</label>
                        </td>
                        <td>
                            <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
													<input type="file" name="image_dp" id="image_dp" data-multiple-caption="{count} files selected" multiple />
													<label class="btn btn-default" id="image_dpl" for="image_dp"><span style="overflow: hidden;">Upload Image</span></label>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default" name="register_btn">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
            <br><br><br><br><br>
            <form style="text-align:left;padding: 0px 0px 0px 20px;" method="post" action="profile_s2">
                <table style="width:50%">
                    <caption style="text-align: center;font-size: 16px;">Update your password<br><br><br></caption>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">Current Password</label>
                        </td>
                        <td width="20%">
                            <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
                            <input style="width: 250px;" minlength="8" maxlength="50" type="Password" class="form-control" id="opassword" name="opassword" required>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">New Password</label>
                        </td>
                        <td>
                            <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
                            <input style="width: 250px;" minlength="8" maxlength="50" type="Password" class="form-control" id="password" name="password" required>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                            <label for="email" style="font-size: 17px;">Re-enter Password</label>
                        </td>
                        <td>
                        <label for="email" style="font-size: 17px;">:</label>
                        </td>
                        <td>
                            <input style="width: 250px;" minlength="8" maxlength="50" type="Password" class="form-control" id="passwordr" name="passwordr" required>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default" name="register_btn">Update</button>
                        </td>
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
$("#image_dp").change(function(){
	$("#image_dpl").css("border","none");
	$("#image_dpl").css("background-color","#35BD40");
	$("#image_dpl").css("background-image","url('check.svg')");
	$("#image_dpl").css("background-repeat","no-repeat");
	$("#image_dpl").css("background-position","center");
	$("#image_dpl").css("background-size","50px 30px");
});
</script>
<script type="text/javascript">
    var password = document.getElementById("password"), passwordr = document.getElementById("passwordr");
    function validatePassword(){
      if(password.value != passwordr.value) {
        passwordr.setCustomValidity("Passwords Don't Match");
      } else {
        passwordr.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    passwordr.onkeyup = validatePassword;
		$('#message_close').hover(function(){
				$("#message_close").css("cursor","pointer");
			});
		$('#message_close').click(function(){
				$('#message').fadeOut(1000).remove();
			});
</script>
