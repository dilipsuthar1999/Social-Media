<?php
	session_start();
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
		label
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
        $query="SELECT * FROM profile where email='$_GET[receiver]'";
        $result=mysqli_query($conn,$query);
        $user=mysqli_num_rows($result);
        if($user!=0)
        {
          	while($data=mysqli_fetch_assoc($result))
          	{		
          		echo "<center>
	          			<img src='include/".$data['image']."' class='img'>
	          		</center><br>
          			<label><b>Name :</b> ".$data['name']."</label><br>
					<label><b>About Me :</b> ".$data['about']."</label><br><br>";

			    $query1="SELECT * FROM request where (sender='$_SESSION[email]' AND receiver='$data[email]')OR(receiver='$_SESSION[email]' AND sender='$data[email]')";
			    $result1=mysqli_query($conn,$query1);
			    $user1=mysqli_num_rows($result1);
			   	if($user1!=0)
			   	{
			   		while($data1=mysqli_fetch_assoc($result1))
			   		{
			   			if($data1['status']=='YES')
			   			{
					    	echo "<center><a href='#' class='friends' style='text-decoration: none;'><b>Already Your friend</b></a></center>";
			   			}
			   			else
			   			{
					    	echo "<center><a href='#' class='friends' style='text-decoration: none;'><b>Request Sended</b></a></center>";
			   			}
			   		}
			    }
			    else
			    {
			    	echo "<center><a href='request(1).php? sender=".$_SESSION['email']." & receiver=".$data['email']."' class='friends' style='text-decoration: none;'><b>Send Request</b></a></center>";
			    }
          	}
        }
	?>
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