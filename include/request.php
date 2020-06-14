<?php
	require('include/db.php');
	session_start();
	$query="SELECT * from request where sender='$_GET[sender]' AND receiver='$_GET[receiver]'";
	$result=mysqli_query($conn,$query);
	$user=mysqli_fetch_all($result,MYSQLI_ASSOC);
	if($user)
	{
		header('location:findfriend.php');
	}
	else
	{
		$s=$_GET['sender'];
		$r=$_GET['receiver'];
	   	$sql="INSERT INTO `request`(`sender`, `receiver`, `status`) VALUES ('$s','$r','NO')";
		if($conn->query($sql))
		{
			header('location:findfriend.php');			
		}
		else
		{
			echo "Error:".$sql."<br>".$conn->error;
		}
	}
?>