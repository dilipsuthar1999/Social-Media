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
		$(document).ready(function()
		{
			$('#uploadimage').submit(function()
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
						$("#uploadimage").trigger("reset");													
						$("#msg").html(data);	   		    	   							
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
	<center>
		<img src="image/logo.png" class="logo">			
		<label class="logoname"><b>FRIEND ZONE</b></label>
	</center>	
	<form id="uploadimage" action="include/uploadimage.php" method="POST" enctype="multipart/form-data" autocomplete="off">
		<input type="file" name="image" class="file" required=""><br><br>
		<button type="submit" name="uploaduserimagedetail" value="uploaduserimagedetail" class="form" onclick="uploadimage();"><b>Submit</b></button>
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