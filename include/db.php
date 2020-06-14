<?php
	$conn=new mysqli("localhost","root","","friendzone");
	if(mysqli_connect_error())
	{
		die('Connection error ('.mysqli_connect_errno().')'.mysqli_connect_errno());
	}
?>