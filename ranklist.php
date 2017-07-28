<?php
  session_start();
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con = mysqli_connect($servername, $username, $password,$database);
  echo "<tr>";
  echo "<th style='border-top:0.1px solid #eee;' width='10%'>Rank</th>";
  echo "<th style='border-top:0.1px solid #eee;' width='65%'>Email</th>";
  echo "<th style='border-top:0.1px solid #eee;' width='25%'>Score</th>";
  echo "</tr>";
  $result = mysqli_query($con,"SELECT s.email, u.nick, ROUND(SUM(s.score), 2) as score from users u, score s where s.email=u.email group by s.email ORDER BY s.score DESC");
  mysqli_close($con);
  $i = 1;
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr style='height:50px;'>";
    echo "<td>".$i."</td>";
    echo "<td style='text-align:left'><span style='color:#4E92D0;cursor:pointer;'>".$row['email']."</span><span style='float:right'> - ".$row['nick']."</span></td>";
    echo "<td>".$row['score']."</td>";
    echo "</tr>";
    $i++;
  }
?>
