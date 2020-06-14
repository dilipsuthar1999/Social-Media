<?php
	require('db.php');
	session_start();

   	$sql="INSERT INTO `comment`(`id`, `email`, `comment`) VALUES ('$_POST[id]','$_SESSION[email]','$_POST[comment]')";
	if($conn->query($sql))
	{
		$query2="SELECT * FROM imageupload where status='$_POST[id]'";
		$result2=mysqli_query($conn,$query2);
		$user2=mysqli_num_rows($result2);
		if($user2!=0)
		{
			while($data2=mysqli_fetch_assoc($result2))
	       	{				
	       		$c=$data2['count']+1;
				$sql1="UPDATE `imageupload` SET `count`='$c' WHERE status='$_POST[id]'";
				if($conn->query($sql1))
				{
				}
			}
		}
	}
	else
	{
		echo "Error:".$sql."<br>".$conn->error;
	}
?>