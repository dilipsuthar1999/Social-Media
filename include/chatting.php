<?php
	require('db.php');	
	session_start();
	date_default_timezone_set("Asia/Kolkata");
 	$dt = new DateTime();
  	$date=$dt->format('Y-m-d H:i:s');

	if(mysqli_connect_error())
	{
		die('Connection error ('.mysqli_connect_errno().')'.mysqli_connect_errno());
	}
	else
	{
        $sql="INSERT INTO `chat`(`sender`, `receiver`, `msg`, `time`) VALUES ('$_SESSION[email]','$_POST[receiver]','$_POST[chat]','$date')";
		if($conn->query($sql))
		{
   		}
     	else
     	{
     	}
	}
?>