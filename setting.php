<?php
	session_start();
	if(isset($_SESSION['receiver']))
	{
		unset($_SESSION['receiver']);			
	}	
	if(isset($_SESSION['email']))
	{
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		require('template/library.php');
	?>
	<link rel="stylesheet" type="text/css" href="css/card.css">
	<style>
		body
		{
			background-image: url('image/bg.jpg');
		}
		.contain
		{
			border-radius: 10px; 
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
	</style>
</head>
<body>
	<?php
		require('template/nav.php');
	?>
	<div class="container">
		<a href="editprofile.php" class="card">
			<div class="contain">
				<div style="padding:10px; font-size: 20px; color: #000000;"><b><i class="fas">&#xf4ff;</i> Change Profile</b></div>
			</div>
		</a><br>
		<a href="changepassword.php" class="card">
			<div class="contain">
				<div style="padding:10px; font-size: 20px; color: #000000;"><b><i class="fas">&#xf502;</i> Change Password</b></div>
			</div>
		</a>		
	</div>
	<?php
		require('template/footer.php');
	?>	
</body>
</html>
<?php
	}
	else
	{
		header('location:index.php');
	}
?>