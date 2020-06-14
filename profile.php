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
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<style>
		body
		{
			background-image: url('image/bg.jpg');
		}
		.label
		{
			padding: 10px;
			font-size: 20px;
		}
		a
		{
			color: black;
		}
	</style>
</head>
<body>
	<?php
		require('template/nav.php');
	?>
	<div class="container">
	<?php
		require('include/db.php');
        $query="SELECT * FROM profile where email='$_SESSION[email]'";
        $result=mysqli_query($conn,$query);
        $user=mysqli_num_rows($result);
        if($user!=0)
        {
          	while($data=mysqli_fetch_assoc($result))
          	{		
          		echo "<center>
	          			<img src='include/".$data['image']."' class='img'>
	          			<a href='editprofile.php'><i class='fas'>&#xf303;</i></a>
	          		</center><br>
          			<label class='label'><b>Name :</b> ".$data['name']."</label><br>
					<label class='label'><b>About Me :</b> ".$data['about']."</label>";

		        $query1="SELECT count(status) FROM request where (sender='$_SESSION[email]' OR receiver='$_SESSION[email]') AND status='YES'";
		        $result1=mysqli_query($conn,$query1);
		        $user1=mysqli_fetch_array($result1);
				echo "<button class='friends'><b>Friends: ".$user1[0]."</b></button>";
          	}
        }
	?>
	<div class="gridcontain">
	<?php
        $query="SELECT * FROM imageupload where email='$_SESSION[email]'";
        $result=mysqli_query($conn,$query);
        $user=mysqli_num_rows($result);
        if($user!=0)
        {
          	while($data=mysqli_fetch_assoc($result))
          	{
				echo "<img src='include/".$data['image']."' class='grid'>";
			}
		}
	?>
		</div>
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