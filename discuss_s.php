<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "codejudge";
	$con =  mysqli_connect($servername, $username, $password,$database);
	$new_post = $_POST['post'];
	$email=$_SESSION['email'];
	$date = date('Y-m-d H:i:s');
	$new_post = mysqli_real_escape_string($con, $new_post);
	mysqli_query($con,"INSERT INTO posts VALUES ('','$email','$new_post','$date')");
	//print new post
	echo "<div style='position:relative;background-color: #ffffff;margin-left: auto;margin-right: auto;margin-top: 12px;width: 900px;padding: 5px 10px 10px 10px;border-radius: 3px;box-shadow: 0 1px 2px rgba(0,0,0,0.3);border-top: 1px solid #b92b27;border-bottom: 1px solid #b92b27;border-left: thick solid #CF494C;border-right: 1px solid #b92b27;'>";
		echo "<div style='padding: 10px 0px 0px 10px;'>";
			$result1 = mysqli_query($con,"SELECT * FROM users where email='$email'");
			$row1 = mysqli_fetch_array($result1);
			if($row1['image']=="")
				echo "<div style='float:left;width: 35px;height: 35px;background: url(icon.png);background-position: center;background-size: cover;border-radius: 100%;'></div>";
			else
				echo "<div style='float:left;width: 35px;height: 35px;background: url(data:image/jpeg;base64,".base64_encode( $row1['image'] ).");background-position: center;background-size: cover;border-radius: 100%;'></div>";
			$result2 = mysqli_query($con,"SELECT * FROM users where email='$email'");
			$row2 = mysqli_fetch_array($result2);
			echo "<div style='float:left;padding:7px 0px 0px 30px;'><p style='color: #33333D;font-size:14px;'><b>".$row2['name']."</b></p></div>";
			echo "<div style='float:right;padding:7px 0px 0px 30px;'><p style='color: #546673;font-size:14px;'>just now</p></div>";
			echo "<br><br><hr>";
				echo "<div style='position:relative;padding: 0px 10px 10px 0px;color:#1d2129;line-height: 20px;'>";
				$message = nl2br(htmlspecialchars($_POST['post']));
				echo "<p style='font-size:14px;font-weight: normal;line-height: 1.38;'>".$message."</p>";
				//echo $message;
				echo "</div>";
				echo "<hr>";
				$result3 = mysqli_query($con,"SELECT * FROM posts ORDER BY post_id DESC");
				$row3 = mysqli_fetch_array($result3);
				$id=$row3['post_id'];
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
	mysqli_close($con);
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
