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
		}
		textarea
		{
			border: none;
			outline: none;
			width: 80%;
			padding: 10px;			
			font-size: 15px;
		}
		.action
		{
			border: none;
			background-color: #0055ff;
			color:white;
			outline: none;
			padding: 2px 5px 2px 5px;
			border-radius: 5px;
			float: right;
			margin: 0px 5px 5px 5px;
			font-size: 15px;
		}		
	</style>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#addcomment').click(function()
			{
	    		$.ajax(
	    		{
					type: "POST",
			       	url: 'include/addcomment.php',
			       	data: $('#msg').serialize(),
			       	success: function(data)
			       	{ 		
						$('#msg').get(0).reset()
	           		},
		       		error:function() {
		        	}
		    	});
	   			return false;
		   	});
		});			
	</script>
</head>
<body>
	<?php
		require('template/nav.php');
	?>	
	<div class="container">
		<div class="card">
			<div class="contain">
				<form id="msg" autocomplete="off">
					<input type="text" name="id" value="<?php echo $_GET['id']; ?>" style="display: none;">
					<textarea type="text" name="comment" id="comment" placeholder="Add Your Comment" style="width: 90%;"></textarea><br><br>	
					<center>
						<button style="font-size: 18px; padding: 5px; background-color: #0055ff; color: white; border: none; outline: none; border-radius: 5px;" type="submit" name="addcomment" value="addcomment" id="addcomment"><b>Comment</b></button>
					</center>
				</form>
			</div>
		</div><br><br>
		<div id="showcomment">
			<?php
				require('include/db.php');
				$query2="SELECT * FROM comment where id='$_GET[id]'";
				$result2=mysqli_query($conn,$query2);
				$user2=mysqli_num_rows($result2);
				if($user2!=0)
				{
					while($data2=mysqli_fetch_assoc($result2))
			       	{		
			       	    $query1="SELECT * FROM profile where email='$data2[email]'";
				        $result1=mysqli_query($conn,$query1);
				        $user1=mysqli_num_rows($result1);
				        if($user1!=0)
				        {
				          	while($data1=mysqli_fetch_assoc($result1))
				          	{
								echo "<div class='card'>
										<div class='header'>
											<img src='include/".$data1['image']."' style='width:40px; height: 40px; border-radius: 50%; padding: 5px; float:left;'>
											<div style='padding:10px; font-size: 20px; color: #000000;'><b>".$data1['name']."</b></div>
										</div>
										<div class='footer'>
											<div style='padding: 5px;'>".$data2['comment']."</div>
										</div>
									</div><br>";		          		
				          	}
				        }
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