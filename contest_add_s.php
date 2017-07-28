<?php
	session_start();
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con = mysqli_connect($servername, $username, $password,$database);
  if(isset($_POST['join_contest'])) {
    $email=$_SESSION['email'];
    mysqli_query($con,"INSERT INTO standings values('$email',0,0,0,-1,0,-1,0,-1,0,-1,0,-1,0,-1,0,-1)");
  }
	mysqli_close($con);
  if($_SESSION['email']!='codeit@vidyanikethan.asia')
		header("location: admin_contest");
  else
    header("location: contest");
?>
