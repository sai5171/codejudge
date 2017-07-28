<?php
	session_start();
	echo "<html><body style='background-color:white;'>
    <h1 style='color:black;text-align:center;'>Loading please wait...</h1>
    <img style='position: absolute;margin: auto;top: 0;left: 0;right: 0;bottom: 0;' src='loading.gif'></body></html>";
	$servername = "127.0.0.1";
    $username = "root";
    $password = "$@!Sai5171";
    $database = "codejudge";
    $con =  mysqli_connect($servername, $username, $password,$database);
    error_reporting(0);
	if(isset($_POST['uploadall']))
	{
		$p1=$_POST['pbn1'];
		$t1=$_POST['tl1'];
		$pbname1=$_POST['prname1'];
		mysqli_query($con,"INSERT INTO problems VALUES ('$p1','$pbname1','$t1')");
		move_uploaded_file($_FILES['file-pdf1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1".".pdf");
		move_uploaded_file($_FILES['file-1i1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."1.in");
		move_uploaded_file($_FILES['file-1i2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."2.in");
		move_uploaded_file($_FILES['file-1i3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."3.in");
		move_uploaded_file($_FILES['file-1i4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."4.in");
		move_uploaded_file($_FILES['file-1i5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."5.in");
		move_uploaded_file($_FILES['file-1i6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."6.in");
		move_uploaded_file($_FILES['file-1i7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."7.in");
		move_uploaded_file($_FILES['file-1i8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."8.in");
		move_uploaded_file($_FILES['file-1i9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."9.in");
		move_uploaded_file($_FILES['file-1i10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."10.in");
		move_uploaded_file($_FILES['file-1i11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."11.in");
		move_uploaded_file($_FILES['file-1i12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."12.in");
		move_uploaded_file($_FILES['file-1o1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."1.ans");
		move_uploaded_file($_FILES['file-1o2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."2.ans");
		move_uploaded_file($_FILES['file-1o3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."3.ans");
		move_uploaded_file($_FILES['file-1o4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."4.ans");
		move_uploaded_file($_FILES['file-1o5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."5.ans");
		move_uploaded_file($_FILES['file-1o6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."6.ans");
		move_uploaded_file($_FILES['file-1o7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."7.ans");
		move_uploaded_file($_FILES['file-1o8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."8.ans");
		move_uploaded_file($_FILES['file-1o9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."9.ans");
		move_uploaded_file($_FILES['file-1o10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."10.ans");
		move_uploaded_file($_FILES['file-1o11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."11.ans");
		move_uploaded_file($_FILES['file-1o12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p1"."12.ans");
		$p2=$_POST['pbn2'];
		$t2=$_POST['tl2'];
		$pbname2=$_POST['prname2'];
		mysqli_query($con,"INSERT INTO problems VALUES ('$p2','$pbname2','$t2')");
		move_uploaded_file($_FILES['file-pdf2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2".".pdf");
		move_uploaded_file($_FILES['file-2i1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."1.in");
		move_uploaded_file($_FILES['file-2i2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."2.in");
		move_uploaded_file($_FILES['file-2i3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."3.in");
		move_uploaded_file($_FILES['file-2i4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."4.in");
		move_uploaded_file($_FILES['file-2i5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."5.in");
		move_uploaded_file($_FILES['file-2i6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."6.in");
		move_uploaded_file($_FILES['file-2i7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."7.in");
		move_uploaded_file($_FILES['file-2i8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."8.in");
		move_uploaded_file($_FILES['file-2i9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."9.in");
		move_uploaded_file($_FILES['file-2i10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."10.in");
		move_uploaded_file($_FILES['file-2i11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."11.in");
		move_uploaded_file($_FILES['file-2i12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."12.in");
		move_uploaded_file($_FILES['file-2o1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."1.ans");
		move_uploaded_file($_FILES['file-2o2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."2.ans");
		move_uploaded_file($_FILES['file-2o3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."3.ans");
		move_uploaded_file($_FILES['file-2o4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."4.ans");
		move_uploaded_file($_FILES['file-2o5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."5.ans");
		move_uploaded_file($_FILES['file-2o6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."6.ans");
		move_uploaded_file($_FILES['file-2o7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."7.ans");
		move_uploaded_file($_FILES['file-2o8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."8.ans");
		move_uploaded_file($_FILES['file-2o9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."9.ans");
		move_uploaded_file($_FILES['file-2o10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."10.ans");
		move_uploaded_file($_FILES['file-2o11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."11.ans");
		move_uploaded_file($_FILES['file-2o12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p2"."12.ans");
		$p3=$_POST['pbn3'];
		$t3=$_POST['tl3'];
		$pbname3=$_POST['prname3'];
		mysqli_query($con,"INSERT INTO problems VALUES ('$p3','$pbname3','$t3')");
		move_uploaded_file($_FILES['file-pdf3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3".".pdf");
		move_uploaded_file($_FILES['file-3i1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."1.in");
		move_uploaded_file($_FILES['file-3i2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."2.in");
		move_uploaded_file($_FILES['file-3i3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."3.in");
		move_uploaded_file($_FILES['file-3i4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."4.in");
		move_uploaded_file($_FILES['file-3i5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."5.in");
		move_uploaded_file($_FILES['file-3i6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."6.in");
		move_uploaded_file($_FILES['file-3i7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."7.in");
		move_uploaded_file($_FILES['file-3i8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."8.in");
		move_uploaded_file($_FILES['file-3i9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."9.in");
		move_uploaded_file($_FILES['file-3i10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."10.in");
		move_uploaded_file($_FILES['file-3i11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."11.in");
		move_uploaded_file($_FILES['file-3i12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."12.in");
		move_uploaded_file($_FILES['file-3o1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."1.ans");
		move_uploaded_file($_FILES['file-3o2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."2.ans");
		move_uploaded_file($_FILES['file-3o3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."3.ans");
		move_uploaded_file($_FILES['file-3o4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."4.ans");
		move_uploaded_file($_FILES['file-3o5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."5.ans");
		move_uploaded_file($_FILES['file-3o6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."6.ans");
		move_uploaded_file($_FILES['file-3o7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."7.ans");
		move_uploaded_file($_FILES['file-3o8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."8.ans");
		move_uploaded_file($_FILES['file-3o9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."9.ans");
		move_uploaded_file($_FILES['file-3o10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."10.ans");
		move_uploaded_file($_FILES['file-3o11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."11.ans");
		move_uploaded_file($_FILES['file-3o12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p3"."12.ans");
		$p4=$_POST['pbn4'];
		$t4=$_POST['tl4'];
		$pbname4=$_POST['prname4'];
		mysqli_query($con,"INSERT INTO problems VALUES ('$p4','$pbname4','$t4')");
		move_uploaded_file($_FILES['file-pdf4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4".".pdf");
		move_uploaded_file($_FILES['file-4i1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."1.in");
		move_uploaded_file($_FILES['file-4i2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."2.in");
		move_uploaded_file($_FILES['file-4i3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."3.in");
		move_uploaded_file($_FILES['file-4i4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."4.in");
		move_uploaded_file($_FILES['file-4i5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."5.in");
		move_uploaded_file($_FILES['file-4i6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."6.in");
		move_uploaded_file($_FILES['file-4i7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."7.in");
		move_uploaded_file($_FILES['file-4i8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."8.in");
		move_uploaded_file($_FILES['file-4i9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."9.in");
		move_uploaded_file($_FILES['file-4i10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."10.in");
		move_uploaded_file($_FILES['file-4i11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."11.in");
		move_uploaded_file($_FILES['file-4i12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."12.in");
		move_uploaded_file($_FILES['file-4o1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."1.ans");
		move_uploaded_file($_FILES['file-4o2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."2.ans");
		move_uploaded_file($_FILES['file-4o3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."3.ans");
		move_uploaded_file($_FILES['file-4o4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."4.ans");
		move_uploaded_file($_FILES['file-4o5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."5.ans");
		move_uploaded_file($_FILES['file-4o6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."6.ans");
		move_uploaded_file($_FILES['file-4o7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."7.ans");
		move_uploaded_file($_FILES['file-4o8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."8.ans");
		move_uploaded_file($_FILES['file-4o9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."9.ans");
		move_uploaded_file($_FILES['file-4o10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."10.ans");
		move_uploaded_file($_FILES['file-4o11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."11.ans");
		move_uploaded_file($_FILES['file-4o12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p4"."12.ans");
		$p5=$_POST['pbn5'];
		$t5=$_POST['tl5'];
		$pbname5=$_POST['prname5'];
		mysqli_query($con,"INSERT INTO problems VALUES ('$p5','$pbname5','$t5')");
		move_uploaded_file($_FILES['file-pdf5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5".".pdf");
		move_uploaded_file($_FILES['file-5i1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."1.in");
		move_uploaded_file($_FILES['file-5i2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."2.in");
		move_uploaded_file($_FILES['file-5i3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."3.in");
		move_uploaded_file($_FILES['file-5i4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."4.in");
		move_uploaded_file($_FILES['file-5i5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."5.in");
		move_uploaded_file($_FILES['file-5i6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."6.in");
		move_uploaded_file($_FILES['file-5i7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."7.in");
		move_uploaded_file($_FILES['file-5i8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."8.in");
		move_uploaded_file($_FILES['file-5i9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."9.in");
		move_uploaded_file($_FILES['file-5i10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."10.in");
		move_uploaded_file($_FILES['file-5i11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."11.in");
		move_uploaded_file($_FILES['file-5i12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."12.in");
		move_uploaded_file($_FILES['file-5o1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."1.ans");
		move_uploaded_file($_FILES['file-5o2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."2.ans");
		move_uploaded_file($_FILES['file-5o3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."3.ans");
		move_uploaded_file($_FILES['file-5o4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."4.ans");
		move_uploaded_file($_FILES['file-5o5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."5.ans");
		move_uploaded_file($_FILES['file-5o6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."6.ans");
		move_uploaded_file($_FILES['file-5o7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."7.ans");
		move_uploaded_file($_FILES['file-5o8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."8.ans");
		move_uploaded_file($_FILES['file-5o9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."9.ans");
		move_uploaded_file($_FILES['file-5o10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."10.ans");
		move_uploaded_file($_FILES['file-5o11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."11.ans");
		move_uploaded_file($_FILES['file-5o12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p5"."12.ans");
		$p6=$_POST['pbn6'];
		$t6=$_POST['tl6'];
		$pbname6=$_POST['prname6'];
		mysqli_query($con,"INSERT INTO problems VALUES ('$p6','$pbname6','$t6')");
		move_uploaded_file($_FILES['file-pdf6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6".".pdf");
		move_uploaded_file($_FILES['file-6i1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."1.in");
		move_uploaded_file($_FILES['file-6i2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."2.in");
		move_uploaded_file($_FILES['file-6i3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."3.in");
		move_uploaded_file($_FILES['file-6i4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."4.in");
		move_uploaded_file($_FILES['file-6i5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."5.in");
		move_uploaded_file($_FILES['file-6i6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."6.in");
		move_uploaded_file($_FILES['file-6i7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."7.in");
		move_uploaded_file($_FILES['file-6i8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."8.in");
		move_uploaded_file($_FILES['file-6i9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."9.in");
		move_uploaded_file($_FILES['file-6i10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."10.in");
		move_uploaded_file($_FILES['file-6i11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."11.in");
		move_uploaded_file($_FILES['file-6i12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."12.in");
		move_uploaded_file($_FILES['file-6o1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."1.ans");
		move_uploaded_file($_FILES['file-6o2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."2.ans");
		move_uploaded_file($_FILES['file-6o3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."3.ans");
		move_uploaded_file($_FILES['file-6o4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."4.ans");
		move_uploaded_file($_FILES['file-6o5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."5.ans");
		move_uploaded_file($_FILES['file-6o6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."6.ans");
		move_uploaded_file($_FILES['file-6o7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."7.ans");
		move_uploaded_file($_FILES['file-6o8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."8.ans");
		move_uploaded_file($_FILES['file-6o9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."9.ans");
		move_uploaded_file($_FILES['file-6o10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."10.ans");
		move_uploaded_file($_FILES['file-6o11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."11.ans");
		move_uploaded_file($_FILES['file-6o12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p6"."12.ans");
		$p7=$_POST['pbn7'];
		$t7=$_POST['tl7'];
		$pbname7=$_POST['prname7'];
		mysqli_query($con,"INSERT INTO problems VALUES ('$p7','$pbname7','$t7')");
		move_uploaded_file($_FILES['file-pdf7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7".".pdf");
		move_uploaded_file($_FILES['file-7i1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."1.in");
		move_uploaded_file($_FILES['file-7i2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."2.in");
		move_uploaded_file($_FILES['file-7i3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."3.in");
		move_uploaded_file($_FILES['file-7i4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."4.in");
		move_uploaded_file($_FILES['file-7i5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."5.in");
		move_uploaded_file($_FILES['file-7i6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."6.in");
		move_uploaded_file($_FILES['file-7i7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."7.in");
		move_uploaded_file($_FILES['file-7i8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."8.in");
		move_uploaded_file($_FILES['file-7i9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."9.in");
		move_uploaded_file($_FILES['file-7i10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."10.in");
		move_uploaded_file($_FILES['file-7i11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."11.in");
		move_uploaded_file($_FILES['file-7i12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."12.in");
		move_uploaded_file($_FILES['file-7o1']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."1.ans");
		move_uploaded_file($_FILES['file-7o2']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."2.ans");
		move_uploaded_file($_FILES['file-7o3']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."3.ans");
		move_uploaded_file($_FILES['file-7o4']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."4.ans");
		move_uploaded_file($_FILES['file-7o5']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."5.ans");
		move_uploaded_file($_FILES['file-7o6']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."6.ans");
		move_uploaded_file($_FILES['file-7o7']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."7.ans");
		move_uploaded_file($_FILES['file-7o8']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."8.ans");
		move_uploaded_file($_FILES['file-7o9']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."9.ans");
		move_uploaded_file($_FILES['file-7o10']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."10.ans");
		move_uploaded_file($_FILES['file-7o11']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."11.ans");
		move_uploaded_file($_FILES['file-7o12']['tmp_name'],"Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/"."$p7"."12.ans");
		shell_exec("chmod 000 -R Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/*.*");
		$_SESSION['problem_message']="All contest problems, inputs and outputs uploaded successfully";
		header("location: admin");
	}
	if(isset($_POST['deleteall']))
	{
		shell_exec("chmod 777 -R Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/*.*");
		shell_exec("rm Ss13GSrN1Wpip30s3l9cLl1YGnOOQIJz2AsyiLcaxsiMl95el5/*.*");
		mysqli_query($con,"truncate problems");
		mysqli_query($con,"truncate standings");
		$_SESSION['problem_message']="All contest problems, inputs and outputs deleted successfully";
		header("location: admin");
	}
	if(isset($_POST['updatestart']))
	{
		$start = $_POST['start_time'];
		$start_file = fopen("$@!1start.txt","w");
		fwrite($start_file,$start);
		fclose($start_file);
		$_SESSION['problem_message']="Start time updated successfully";
		header("location: admin");
	}
	if(isset($_POST['updatestop']))
	{
		$stop = $_POST['stop_time'];
		$start = file_get_contents("$@!1start.txt");
		$time1 = strtotime($start);
		$time2 = strtotime($stop);
		if($time1>$time2)
		{
			$_SESSION['problem_message']="Stop time should be ahead of start time";
			header("location: admin");
		}
		else
		{
			$stop_file = fopen("$@!1stop.txt","w");
			fwrite($stop_file,$stop);
			fclose($stop_file);
			$_SESSION['problem_message']="Stop time updated successfully";
			header("location: admin");
		}
	}
	if(isset($_POST['pcupload']))
	{
		$pb_id=$_POST['pcid'];
		$extract= mysqli_query($con,"select * from practice where pb_id='$pb_id'");
		$count=mysqli_num_rows($extract);
	  $row = mysqli_fetch_assoc($extract);
		if($count==1)
		{
			$_SESSION['problem_message']="Practice problem ID should be unique";
			header("location: admin");
		}
		else
		{
			$pb_name=$_POST['pcname'];
			$pctl=$_POST['pctl'];
			$pcdl=$_POST['pcdl'];
			mysqli_query($con,"INSERT INTO practice VALUES ('$pb_id','$pb_name','$pctl','$pcdl')");
			move_uploaded_file($_FILES['file-pdfpc1']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id".".pdf");
			move_uploaded_file($_FILES['file-1ipc1']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."1.in");
			move_uploaded_file($_FILES['file-1ipc2']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."2.in");
			move_uploaded_file($_FILES['file-1ipc3']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."3.in");
			move_uploaded_file($_FILES['file-1ipc4']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."4.in");
			move_uploaded_file($_FILES['file-1ipc5']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."5.in");
			move_uploaded_file($_FILES['file-1ipc6']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."6.in");
			move_uploaded_file($_FILES['file-1ipc7']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."7.in");
			move_uploaded_file($_FILES['file-1ipc8']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."8.in");
			move_uploaded_file($_FILES['file-1ipc9']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."9.in");
			move_uploaded_file($_FILES['file-1ipc10']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."10.in");
			move_uploaded_file($_FILES['file-1ipc11']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."11.in");
			move_uploaded_file($_FILES['file-1ipc12']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."12.in");
			move_uploaded_file($_FILES['file-1opc1']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."1.ans");
			move_uploaded_file($_FILES['file-1opc2']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."2.ans");
			move_uploaded_file($_FILES['file-1opc3']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."3.ans");
			move_uploaded_file($_FILES['file-1opc4']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."4.ans");
			move_uploaded_file($_FILES['file-1opc5']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."5.ans");
			move_uploaded_file($_FILES['file-1opc6']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."6.ans");
			move_uploaded_file($_FILES['file-1opc7']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."7.ans");
			move_uploaded_file($_FILES['file-1opc8']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."8.ans");
			move_uploaded_file($_FILES['file-1opc9']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."9.ans");
			move_uploaded_file($_FILES['file-1opc10']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."10.ans");
			move_uploaded_file($_FILES['file-1opc11']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."11.ans");
			move_uploaded_file($_FILES['file-1opc12']['tmp_name'],"Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/"."$pb_id"."12.ans");
			shell_exec("chmod 777 -R Xz2uuALrklKy5Id6Bfk37Bees8JaoZzYtqiORT736Iq2gtZIA9/*.*");
			$_SESSION['problem_message']="Practice problem, time limit, difficulty level, inputs and outputs uploaded successfully";
			header("location: admin");
		}

	}
	mysqli_close($con);
?>
