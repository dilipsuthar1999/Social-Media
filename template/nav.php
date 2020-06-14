<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
	<div class="slidernav" id="nav">
		<a href="javascript:void(0)" name="navclose" id="nav" onclick="closenav();" style="float: right; font-size: 30px;" class="link"><b>&times</b></a><br><br>
	
		<?php
			require('include/db.php');
	        $query="SELECT * FROM profile where email='$_SESSION[email]'";
	        $result=mysqli_query($conn,$query);
	        $user=mysqli_num_rows($result);
	        if($user!=0)
	        {
	          	while($data=mysqli_fetch_assoc($result))
	          	{		
	          		echo "<img src='include/".$data['image']."' class='profileimg'>";
	          	}
	        }
		?>
		
		<a href="home.php" class="link"><i class="fas">&#xf015;</i> Home</a>
		<a href="profile.php" class="link"><i class="fas">&#xf2bd;</i> Profile</a>
		<a href="uploadimage.php" class="link"><i class="fas">&#xf093;</i> Upload Image</a>
		<a href="chat.php" class="link"><i class='far'>&#xf086;</i> Chat With Friends</a>
	<?php
		require('include/db.php');
        $query1="SELECT count(status) FROM request where receiver='$_SESSION[email]' AND status='NO'";
        $result1=mysqli_query($conn,$query1);
        $user1=mysqli_fetch_array($result1);
	?>
		<a href="request.php" class="link"><i class='fas'>&#xf543;</i> Friend Request <?php echo "<label style='border: 1px solid white; border-radius: 50%; background-color: white; color: #ff4d4d;'>".$user1[0]."</label>"; ?></a>
		<a href="searchfriend.php" class="link"><i class='fas'>&#xf002;</i> Find Friend</a>
		<a href="setting.php" class="link"><i class='fas'>&#xf5d2;</i> Setting</a>
		<a href="logout.php" class="link"><i class="fas">&#xf2f5;</i> Logout</a>
	</div>
	<div class="nav">
		<button name="navopen" onclick="opennav();" class="icon" style="float: left;"><b>&#9776;</b></button>
		<img src="image/logo.png" style="width: 35px; height: 35px; float: left; padding-left: 5px;">
		<label class="name" style="font-family: 'Sofia'; font-size: 22px; padding: 10px;"><b>FRIEND ZONE</b></label>
	</div>
</body>
<script type="text/javascript">
	function opennav()
	{
		document.getElementById("nav").style.width="250px";
	}
	function closenav()
	{
		document.getElementById("nav").style.width="0px";
	}
</script>
</html>