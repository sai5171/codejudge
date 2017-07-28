<?php
	session_start();
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $code = $_POST['content_code'];
  $pb_name=$_POST['pc_id'];
  $email=$_SESSION['email'];
  $extract= mysqli_query($con,"select * from practice where pb_id COLLATE latin1_general_cs LIKE '$pb_name'");
  $row = mysqli_fetch_assoc($extract);
  $count=mysqli_num_rows($extract);
  if($count==0)
  {
		echo "Practice Problem Id doesn't exist";
		return 0;
	}
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Compile Error');");
		shell_exec("rm $name.err");
		echo "<h3 style='color:rgb(242,7,7);font-size:20px;'>Compile Error</h3>";
		return 0;
	}
	//test-1
	$time=$row['time'];
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."1.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."1.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 1/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-2
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."2.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."2.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 2/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-3
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."3.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."3.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 3/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-4
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."4.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."4.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 4/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-5
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."5.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."5.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 5/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-6
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."6.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."6.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 6/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-7
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."7.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."7.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 7/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-8
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."8.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."8.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 8/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-9
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."9.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."9.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 9/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-10
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."10.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."10.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 10/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-11
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."11.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."11.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 11/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
	}
	//test-12
	$intput_for_code = fopen("$name.in","w");
	fwrite($intput_for_code, file_get_contents("Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."12.in"));
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
	shell_exec("ulimit -t $time;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
	shell_exec("diff -w ".$name.".ans Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/".$pb_name."12.ans > $name.wr");
	if(strpos(file_get_contents("$name.err"),"Killed")!==false)
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.out");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Time Limit Exceeded');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Time Limit Exceeded' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Time Limit Exceeded</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Run Time Error');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Run Time Error' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Run Time Error</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
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
		shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
		mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Wrong Answer');");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.out");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Wrong Answer' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='cross.svg'>";
		echo "<br><h3 style='color:rgb(242,7,7);font-size:20px;'>Wrong Answer</h3>";
		$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
		$result=mysqli_num_rows($check);
		if($result==0)
			mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '0');");
		return 0;
	}
	else
	{
		shell_exec("chmod 777 -R $name.cpp");
		shell_exec("chmod 777 -R $name.err");
		shell_exec("chmod 777 -R $name.in");
		shell_exec("chmod 777 -R $name.ans");
		shell_exec("chmod 777 -R $name.wr");
		shell_exec("rm $name.err");
		shell_exec("rm $name.in");
		shell_exec("rm $name.ans");
		shell_exec("rm $name.wr");
		echo "<img title='Test case 12/12: Accepted' style='border-color:rgb(201,201,201);border-radius: 5px;border:2px solid #eee;height:20px;width:20px;' src='check.svg'>";
		echo "<br><h3 style='color:rgb(53,189,64);font-size:20px;'>Accepted</h3>";
	}
	shell_exec("mv $name.cpp XZ2uhpidja0ijdcmuufgqc6s8bkrtkh24ynbdxenx5w78zjsjp/");
	mysqli_query($con,"INSERT INTO submissions VALUES ('$name', '$email','$pb_name','Accepted');");
	$check = mysqli_query($con,"select * from score where email='$email' and pb_id='$pb_name'");
	$result=mysqli_num_rows($check);
	if($result==0)
	{
		$check1 = mysqli_query($con,"select * from practice where pb_id='$pb_name'");
		$result1 = mysqli_fetch_assoc($check1);
		$score = $result1['dlevel'];
		mysqli_query($con,"INSERT INTO score VALUES ('$name', '$email', '$pb_name', '$score');");
	}
	else
	{
		$check1 = mysqli_query($con,"select * from practice where pb_id='$pb_name'");
		$result1 = mysqli_fetch_assoc($check1);
		$score = $result1['dlevel'];
		mysqli_query($con,"UPDATE score SET score = $score where email='$email' and pb_id='$pb_name'");
	}
	shell_exec("chmod 777 -R $name.out");
	shell_exec("rm $name.out");
	mysqli_close($con);
?>
