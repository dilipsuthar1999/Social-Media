<?php
	require('db.php');
	session_start();

	$filename=$_FILES["image"]["name"];
	$tempname=$_FILES["image"]["tmp_name"];
	$folder="uploadedimage/".$filename;
	move_uploaded_file($tempname,$folder);
   	$sql="UPDATE `profile` SET `image`='$folder',`name`='$_POST[name]',`about`='$_POST[about]' WHERE email='$_SESSION[email]'";
	if($conn->query($sql))
	{
		echo "* Successfully Updated *";
	}
?>