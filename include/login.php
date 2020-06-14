<?php
	require('db.php');

	session_start();
	$query="SELECT email,password FROM user where email='$_POST[emaillogin]' && password='$_POST[passwordlogin]'";
   	$result=mysqli_query($conn,$query);
   	$user=mysqli_fetch_all($result,MYSQLI_ASSOC);
   	if($user)
	{
		$_SESSION['email']=$_POST['emaillogin'];
		echo "loading...";
	}
	else
	{
		echo "* Invalid Email or Password *";
	}
?>
