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
<?php
		require('include/db.php');
		$query1="SELECT * FROM request where receiver='$_SESSION[email]' OR sender='$_SESSION[email]'";
		$result1=mysqli_query($conn,$query1);
		$user1=mysqli_num_rows($result1);
		if($user1!=0)
		{
			while($data1=mysqli_fetch_assoc($result1))
          	{		
          		if($data1['status']=='YES')
          		{
			        $query="SELECT * FROM profile where email='$data1[sender]' OR email='$data1[receiver]'";
			        $result=mysqli_query($conn,$query);
			        $user=mysqli_num_rows($result);
			        if($user!=0)
			        {
			          	while($data=mysqli_fetch_assoc($result))
			          	{		
			          		if($data['email']==$_SESSION['email'])
			          		{

			          		}
			          		else
			          		{
		          				echo "<div class='card'>
		          						<a href='chatroom.php? nowchat=".$data['email']."' style='text-decoration: none;'>
											<div class='contain'>
												<img src='include/".$data['image']."' style='width:40px; height: 40px; border-radius: 50%; padding: 5px; float:left;'>
												<div style='padding:10px; font-size: 20px; color: #000000;'>
													<b>".$data['name']."</b>
												</div>
											</div>
										</a>
									</div><br>";
							}
						}
					}
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