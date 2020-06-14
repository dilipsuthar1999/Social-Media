<?php
	require('db.php');

	session_start();
	$query="SELECT * from user where email='$_POST[email]'";
	$result=mysqli_query($conn,$query);
	$user=mysqli_fetch_all($result,MYSQLI_ASSOC);
	if($user)
	{
		echo "* User Already Exist *";
	}
	else
	{
		if($_POST['password']==$_POST['cpassword'])
		{
		   	$sql="INSERT INTO `user`(`email`, `name`, `password`) VALUES ('$_POST[email]','$_POST[name]','$_POST[password]')";
			if($conn->query($sql))
			{
				$folder="uploadedimage/logo.png";
				$sql1="INSERT INTO `profile`(`email`, `image`, `name`, `about`) VALUES ('$_POST[email]','$folder','$_POST[name]','Add About You')";
				if($conn->query($sql1))
				{
				}
				echo "* Successfully Created *";
			}
			else
			{
				echo "Error:".$sql."<br>".$conn->error;
			}
		}
		else
		{
			echo "* Password Does Not Match *";
		}
	}

?>