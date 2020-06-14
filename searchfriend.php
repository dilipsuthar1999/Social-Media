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
		input
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
  			$("#search").keyup(function()
			{
				$.ajax(
				{
					type: "POST",
					url: 'include/findfriend.php',
					data: $(this).serialize(),
					success: function(data)
					{
						$("#friend").html(data);
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
				<i class='fas' style="padding: 10px;">&#xf002;</i>
				<input type="text" name="searchfriend" placeholder="find your friends" style="width: 75%;" id="search">
			</div>
		</div><br><br>
		<div id="friend"></div>
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