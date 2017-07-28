<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "codejudge";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $num = $_POST['num'];
  $result = mysqli_query($con,"SELECT * FROM posts ORDER BY date DESC LIMIT 5 OFFSET $num");
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
		mysqli_close($con);
	}
?>
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
					$this.parent().children('.comments_gif').hide();
				}
			});
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
