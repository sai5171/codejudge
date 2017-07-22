<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sign in for Cse-Arena</title>
		<script type="text/javascript">
			document.addEventListener('contextmenu', event => event.preventDefault());
		</script>
    <link rel="icon" type="image/png" href="icon.png">
    <link rel='stylesheet prefetch' href='jquery-ui.css'>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" type="text/css" href="logo.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <style>
      #login:focus {
        background-color: #DC6180;
        color: white;
      }
      body {
				background-image: url(background1.jpg);
				background-repeat: repeat;
			}
    </style>
  </head>
  <body>
    </header>
    <?php
			session_start();
			if(isset($_SESSION['message']))
			{
				if($_SESSION['message']=="You have been successfully logged out from Cse Arena")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['message']."</strong>
            </div>";
          echo "</div>";
        }
        else if($_SESSION['message']=="Sorry, Email or password is invalid")
        {
          echo "<div id='message' style='margin-left: auto;margin-right: auto;margin-top: 30px;width: 1140px;height: 50px;'>";
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #a94442;background-color: #f2dede;border-color: #ebccd1; padding-right: 35px;'>
            <a id='message_close' style='float: right;font-size: 21px;font-weight: 700;line-height: 1;text-shadow: 0 1px 0 #fff;opacity: .2;' data-dismiss='alert' aria-label='close'>×</a>
            <strong>".$_SESSION['message']."</strong>
            </div>";
          echo "</div>";
        }
        session_unset();
				session_destroy();
			}
			if(isset($_SESSION['username']) && $_SESSION['email']=='codeit@vidyanikethan.asia')
				header("location: admin");
			else if(isset($_SESSION['username']))
				header("location: resources");
		?>
    <div class='login'>
      <div class='login_title'>
        <span style='font-size:19px;'>Sign in for Cse-Arena</span>
      </div>
      <div class='login_fields'>
        <div class='login_fields__user'>
          <div class='icon'>
            <img src='user_icon_copy.png'>
          </div>
          <input placeholder='Email-id' type='text' id='email' required="true">
            <div class='validation'>
              <img src='tick.png'>
            </div>
          </input>
        </div>
        <div class='login_fields__password'>
          <div class='icon'>
            <img src='lock_icon_copy.png'>
          </div>
          <input placeholder='Password' type='password' id='password'>
          <div class='validation'>
            <img src='tick1.png'>
          </div>
        </div>
        <div class='login_fields__submit'>
          <input type='submit' value='Log In' id='login'>
          <div class='forgot'>
            <br><br><a style='font-size:13px;' href='/forgot'>Forgotten password?</a><br><br>
            <a style='font-size:13px;' href='/register'>Register for Cse-Arena</a>
          </div>
        </div>
      </div>
      <div class='success'>
        <h2>Almost done</h2>
      </div>

    </div>
    <div class='authent'>
      <img src='puff.svg'>
      <p>Authenticating...</p>
    </div>
    <script src='jquery.min.js'></script>
    <script src='jquery-ui.min1.js'></script>
    <script src="home.js"></script>
  </body>
</html>
<script>
  $('#message_close').hover(function(){
    $("#message_close").css("cursor","pointer");
  });
  $('#message_close').click(function(){
    $('#message').fadeOut(1000).remove();
  });
</script>
