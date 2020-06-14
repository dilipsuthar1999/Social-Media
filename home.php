<?php
	session_start();
	error_reporting(0);
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
			background-size: cover;
		}
	</style>
	<script type="text/javascript">
		function likedis()
		{
			$('#login').submit(function()
			{
				$.ajax(
				{
					type: "POST",
					url: 'include/login.php',
					data: $(this).serialize(),
					success: function(data)
					{ 		
						if(data=='* Invalid Email or Password *')
						{
							$("#loginmsg").html(data);	   		    	   							
						}
						if(data=='loading...')
						{
							$("#loginmsg").html(data);	 
							$("#login").trigger("reset");							
							window.location='home.php';							  		    	   							
						}
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
	<?php
		require('template/nav.php');
	?>
	
	<div class="container" id="showuploadedimage">
	<?php
		require('include/showuploadedimage.php');
	?>
	</div>
	<?php
		require('template/footer.php');
	?>	
</body>
<script type="text/javascript">
	$(document).ready(function()
	{
	   var refreshId = setInterval(function()
	   {
	   		$('#showuploadedimage').load('include/showuploadedimage.php');	   		
	   }, 10000);
	});
</script>
</html>
<?php
	}
	else
	{
		header('location:index.php');
	}
?>
