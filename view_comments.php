<?php
  session_start();
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $post_id = $_POST['post_id'];
  $com_id = $_POST['com_id'];
  $newcom_id= $com_id;
  $email_owner = $_SESSION['email'];
  $result = mysqli_query($con,"SELECT * FROM comments where post_id='$post_id' and com_id>'$com_id' ORDER BY date ASC");
  while($row = mysqli_fetch_array($result))
  {
    $newcom_id = $row['com_id'];
    echo "<div style='position:relative;margin-left: 50px;margin-right: 0px;margin-top: 0px;'>";
    $email=$row['email'];
    $result1 = mysqli_query($con,"SELECT * FROM users where email='$email'");
    $row1 = mysqli_fetch_array($result1);
    if($row1['image']=="")
      echo "<div style='float:left;width: 30px;height: 30px;background: url(icon.png);background-position: center;background-size: cover;border-radius: 100%;'></div>";
    else
      echo "<div style='float:left;width: 30px;height: 30px;background: url(data:image/jpeg;base64,".base64_encode( $row1['image'] ).");background-position: center;background-size: cover;border-radius: 100%;'></div>";
    $result2 = mysqli_query($con,"SELECT * FROM users where email='$email'");
    $row2 = mysqli_fetch_array($result2);
    echo "<div style='float:left;padding:0px 0px 0px 10px;'><p style='color: #33333D;font-size:13px;'><b>".$row2['name']."</b></p></div>";
    echo "<div style='float:right;padding:0px 0px 0px 10px;'><p style='color: #546673;font-size:14px;'>".timeAgo($row['date'])."</p></div>";
    echo "<hr>";
      echo "<div style='position:relative;color:#1d2129;line-height: 20px;'>";
      $message = nl2br(htmlspecialchars($row['text']));
      echo "<p style='font-size:14px;line-height: 1.34;'>".$message."</p><br>";
      echo "</div>";
    echo "</div>";
  }
  echo "$@!";
  echo $newcom_id;
  mysqli_close($con);
?>
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
