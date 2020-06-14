<?php
	require('include/db.php');
	$sql="DELETE FROM `request` WHERE sender='$_GET[reject]'";	
	if($conn->query($sql))
	{
		header('location:request.php');
	}
?>