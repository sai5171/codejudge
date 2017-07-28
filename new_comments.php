<?php
  session_start();
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $post_id = $_POST['post_id'];
  $comment = $_POST['comment'];
  $email=$_SESSION['email'];
  $date = date('Y-m-d H:i:s');
  $comment = mysqli_real_escape_string($con, $comment);
  mysqli_query($con,"INSERT INTO comments VALUES ('','$post_id','$email','$comment','$date')");
  mysqli_close($con);
?>
