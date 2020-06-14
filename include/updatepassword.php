<?php
	require('db.php');
	session_start();

	$query="SELECT password FROM user where email='$_SESSION[email]' && password='$_POST[oldpassword]'";
   	$result=mysqli_query($conn,$query);
   	$user=mysqli_fetch_all($result,MYSQLI_ASSOC);
   	if($user)
	{
	   	$sql="UPDATE `user` SET `password`='$_POST[newpassword]' WHERE email='$_SESSION[email]'";
		if($conn->query($sql))
		{
			echo "* Successfully Updated Your Password *";
		}
	}
	else
	{
		echo "* Invalid Old Password *";
	}
?>