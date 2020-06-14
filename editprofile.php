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
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style>
		body
		{
			background-image: url('image/bg.jpg');
		}
		.file
		{
			border: 1px solid white;
			background: white;
			color: black;
			border-radius: 10px;
			float: left;
			width: 95%;
			padding: 10px;
		}
		#msg
		{
			padding: 10px; 
			width: 95%; 
			background-color: #ccffdd; 
			border-radius: 10px; 
			margin-top: 20px;	
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		function updateprofiledata()
		{
			$('#editprofile').submit(function()
			{
				$.ajax(
				{
					url: $(this).attr('action'),
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data)
					{ 		
						$("#msg").html(data);	 
						window.location='profile.php';		
					},
					error:function() {
				    }
				});
			   	return false;
			});		
		}		
	</script>	
</head>
<body>
	<center>
		<img src="image/logo.png" class="logo">			
		<label class="logoname"><b>FRIEND ZONE</b></label>
	</center>	
	<form id="editprofile" action="include/updateprofile.php" method="POST" enctype="multipart/form-data" autocomplete="off">
	<?php
		require('include/db.php');
        $query="SELECT * FROM profile where email='$_SESSION[email]'";
        $result=mysqli_query($conn,$query);
        $user=mysqli_num_rows($result);
        if($user!=0)
        {
          	while($data=mysqli_fetch_assoc($result))
          	{		
    ?>
				<input class='file' type='file' name='image' required=''><br><br><br>
				<label><b>Name</b></label><br>
				<input type='text' name='name' value='<?php echo $data['name']; ?>' class='input' required=''><br><br>
				<label><b>About You</b></label><br>
				<textarea class='input' required='' name="about"><?php echo $data['about']; ?></textarea>
    <?php
          	}
        }
	?>			
		<button type="submit" class='form' name="updateprofile" value="updateprofile" onclick="updateprofiledata();"><b>Submit</b></button>
		<b><div id="msg"></div></b>
	</form>
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