<?php
  session_start();
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con = mysqli_connect($servername, $username, $password,$database);
  echo "<tr>";
  echo "<th style='border-top:0.1px solid #eee;' width='20%'>Submission Id</th>";
  echo "<th style='border-top:0.1px solid #eee;' width='55%'>Problem Id</th>";
  echo "<th style='border-top:0.1px solid #eee;' width='35%'>Status</th>";
  echo "</tr>";
  $email = $_SESSION['email'];
  $result = mysqli_query($con,"SELECT * FROM submissions where email='$email'");
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr style='height:50px;'>";
    $sid= $row['submissions_id'];
    echo "<td style='text-align:left;color:#4E92D0;cursor:pointer;'><a href='view?submissionid=$sid' target='_blank'>".$row['submissions_id']."</a></td>";
    echo "<td style='text-align:left'>".$row['pb_id']."</td>";
    if($row['result']=="Accepted")
      echo "<td style='text-align:center;color:rgb(53,189,64);'>Accepted</td>";
    else if($row['result']=="Wrong Answer")
      echo "<td style='text-align:center;color:rgb(242,7,7);'>Wrong Answer</td>";
    else if($row['result']=="Run Time Error")
      echo "<td style='text-align:center;color:rgb(242,7,7);'>Run Time Error</td>";
    else if($row['result']=="Time Limit Exceeded")
      echo "<td style='text-align:center;color:rgb(242,7,7);'>Time Limit Exceeded</td>";
    //echo "<td style='text-align:left'>".$row['result']."</td>";
    echo "</tr>";
    $i++;
  }
  mysqli_close($con);
?>
