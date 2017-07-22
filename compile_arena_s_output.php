<?php
	$code = $_POST['content_code'];
	$input = $_POST['input_code'];
	$data=file_get_contents("$@!.txt");
	$data=$data+1;
	$count_program = fopen("$@!.txt","w");
	fwrite($count_program,$data);
	fclose($count_program);
	$name="$data";
	/*shell_exec("chmod 777 -R $name.cpp");
	shell_exec("chmod 777 -R $name.in");
	shell_exec("chmod 777 -R $name.ans");
	shell_exec("chmod 777 -R $name.err");*/
 	$program = fopen("$name.cpp", "w");
 	$intput_for_code = fopen("$name.in","w");
 	fwrite($program, $code);
 	fwrite($intput_for_code, $input);
	fclose($intput_for_code);
	shell_exec("sed 's/\r$//' $name.in > $name.sin");
	shell_exec("chmod 777 -R $name.in");
  shell_exec("rm $name.in");
  shell_exec("mv $name.sin $name.in");
 	shell_exec("g++ -std=c++14 $name.cpp -o $name.out 2> $name.err");
 	echo date("d-m-Y h:i:s A");
	if(filesize("$name.err")==0)
	{
		$time_start = microtime(true);
		shell_exec("chmod 777 -R $name.out");
    shell_exec("ulimit -t 5;{ ./$name.out <$name.in> $name.ans; } 2> $name.err");
    $compile_error = fopen("$name.err", "r");
    if(strpos(file_get_contents("$name.err"),"Killed")!==false)
    {
			echo "<br><br>Oops! Time_Limit_Exceeded<br><br>";
			echo 'Program Terminated in seconds: ' . round((microtime(true) - $time_start),5)."<br>$@!";
			fclose($program);
			fclose($compile_error);
		}
		//else if(strpos(file_get_contents("$name.err"),"Segmentation fault")!==false || strpos(file_get_contents("$name.err"),"Floating point exception")!==false)
		//else if(filesize("$name.err")>0)
		else if(strlen(file_get_contents("$name.err"))>0)
		{
			echo "<br><br>Alas! Runtime_Error<br><br>$@!";
			$outpt_for_code = fopen("$name.ans", "r");
			if(filesize("$name.ans")!=0)
				echo fread($outpt_for_code,filesize("$name.ans"));
			echo "";
			fclose($program);
			fclose($compile_error);
			fclose($outpt_for_code);
		}
		else
		{
			echo "<br><br>Kudos! Succesfully_Compiled<br><br>";
			echo 'Total execution time in seconds: ' . round((microtime(true) - $time_start),5)."<br>$@!";
			$outpt_for_code = fopen("$name.ans", "r");
			if(filesize("$name.ans")!=0)
				echo fread($outpt_for_code,filesize("$name.ans"));
			fclose($program);
			fclose($compile_error);
			fclose($outpt_for_code);
		}
	}
	else
	{
		echo "<br><br>Sorry! Compile_Error<br><br>$@!";
		$compile_error = fopen("$name.err", "r");
		echo fread($compile_error,filesize("$name.err"));
		fclose($program);
		fclose($compile_error);
	}
	shell_exec("chmod 777 -R $name.cpp");
	shell_exec("chmod 777 -R $name.in");
	shell_exec("chmod 777 -R $name.ans");
	shell_exec("chmod 777 -R $name.err");
	shell_exec("rm $name.cpp");
	shell_exec("rm $name.in");
	shell_exec("rm $name.ans");
	shell_exec("rm $name.err");
	shell_exec("rm $name.out");
?>
