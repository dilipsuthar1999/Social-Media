<?php
	require('include/db.php');
	session_start();
	$sql="UPDATE `request` SET `status`='YES' WHERE (sender='$_GET[accept]' AND receiver='$_SESSION[email]')OR(receiver='$_GET[accept]' AND sender='$_SESSION[email]')";	
	if($conn->query($sql))
	{
		header('location:request.php');
	}
?>