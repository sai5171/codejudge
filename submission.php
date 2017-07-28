<?php
	session_start();
	$servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $code = $_POST['content_code'];
	$pb_name=$_POST['pb_id'];
	$email=$_SESSION['email'];
  /*$extract= mysqli_query($con,"select * from problems where pb_id='$pb_name'");*/
  $extract= mysqli_query($con,"select * from problems where pb_id COLLATE latin1_general_cs LIKE '$pb_name'");
  $row = mysqli_fetch_assoc($extract);
  $count=mysqli_num_rows($extract);
  if($count==0)
  {
		echo "Contest Problem Id doesn't exist";
		return 0;
	}
	//time bound checking
	$start_file = fopen("$@!1start.txt","r");
	$start_time = strtotime(fread($start_file,filesize("$@!1start.txt")));
	fclose($start_file);
	$stop_file = fopen("$@!1stop.txt","r");
	$stop_time = strtotime(fread($stop_file,filesize("$@!1stop.txt")));
	fclose($stop_file);
	$present_time = strtotime(date("Y-m-d\TH:i:s"));
	if(!($start_time <= $present_time && $present_time<= $stop_time)){
		echo "Contest completed";
		return 0;
	}
	//time caluclation
	$start_file = fopen("$@!1start.txt","r");
	$start_time = strtotime(fread($start_file,filesize("$@!1start.txt")));
	fclose($start_file);
	$present_time = strtotime(date("Y-m-d\TH:i:s"));
	$interval = $present_time - $start_time;
	$min = round($interval/60);

	$data=file_get_contents("$@!.txt");
	$data=$data+1;
	$count_program = fopen("$@!.txt","w");
	fwrite($count_program,$data);
	fclose($count_program);
	$name="$data";
	$program = fopen("$name.cpp", "w");
	fwrite($program, $code);
	fclose($program);
	shell_exec("g++ -std=c++14 $name.cpp -o $name.out 2> $name.err");
	shell_exec("chmod 777 -R $name.err");
	if(filesize("$name.err")!=0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		echo "<h3 style='color:rgb(242,7,7);font-size:20px;'>Compile Error</h3>";
		return 0;
	}
	//test-1
	$time=$row['time'];
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."1.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."1.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','0','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','0','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','0','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-2
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."2.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."2.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','1','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','1','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','1','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-3
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."3.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."3.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','2','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','2','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','2','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-4
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."4.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."4.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','3','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','3','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','3','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-5
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."5.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."5.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','4','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','4','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','4','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-6
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."6.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."6.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','5','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','5','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','5','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-7
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."7.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."7.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','6','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','6','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','6','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-8
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."8.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."8.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','7','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','7','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','7','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-9
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."9.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."9.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','8','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','8','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','8','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-10
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."10.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."10.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','9','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','9','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','9','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-11
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."11.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."11.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','10','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','10','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','10','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-12
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."12.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/".$pb_name."12.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','11','Time Limit Exceeded')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.err"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','11','Run Time Error')");
		}
		return 0;
	}
	else if(strlen(file_get_contents("$name.wr"))>0)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		if($row[$pb_name."_co"]==-1)
		{
			$val=$row[$pb_name."_wr"];
			$val++;
			mysqli_query($con,"UPDATE standings set ".$pb_name."_wr=$val WHERE email='$email'");
			mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','11','Wrong Answer')");
		}
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.cpp");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
		echo "<br><h3 style='color:rgb(53,189,64);font-size:20px;'>Accepted</h3>";
	}
	$extract= mysqli_query($con,"select * from standings where email='$email'");
	$row = mysqli_fetch_assoc($extract);
	if($row[$pb_name."_co"]==-1)
	{
		mysqli_query($con,"UPDATE standings set ".$pb_name."_co=$min WHERE email='$email'");
		$extract= mysqli_query($con,"select * from standings where email='$email'");
		$row = mysqli_fetch_assoc($extract);
		$score = $row['score']+1;
		mysqli_query($con,"UPDATE standings set score='$score' WHERE email='$email'");
		$penalty=+$row['penalty']+($row[$pb_name."_wr"]*20)+$min;
		mysqli_query($con,"UPDATE standings set penalty=$penalty WHERE email='$email'");
		mysqli_query($con,"INSERT INTO contest_submissions VALUES('$email','$pb_name','11','Accepted')");
	}
	shell_exec("chmod 777 -R $name.out");
	shell_exec("rm $name.out");
	mysqli_close($con);
?>
