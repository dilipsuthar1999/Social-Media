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
	<link rel="stylesheet" type="text/css" href="css/index.css">	
	<style>
		body
		{
			background-image: url('image/bg.jpg');
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
</head>
<body>
	<center>
		<img src="image/logo.png" class="logo">			
		<label class="logoname"><b>FRIEND ZONE</b></label>
	</center>	
	<form id="changepassword" enctype="multipart/form-data" autocomplete="off">
		<label><b>Enter Old Password</b></label>
		<input type="password" name="oldpassword" id="oldpassword" required="" class="input"><br><br>
		<label><b>Enter New Password</b></label>
		<input type="password" name="newpassword" required="" class="input" id="show">
		<input type="checkbox" name="show" style="margin-top: 10px;" onclick="showpassword();"><label><b>Show Password</b></label><br><br>
		<button type="submit" name="changepassworduserdetail" value="changepassworduserdetail" class="form" onclick="updatepassword();"><b>Submit</b></button>
		<b><div id="msg"></div></b>
	</form>
	<?php
		require('template/footer.php');
	?>	
</body>
<script type="text/javascript">
	function showpassword()
	{
		var x=document.getElementById("show");
		if(x.type==="password")
		{
			x.type="text";
		}
		else
		{
			x.type="password";			
		}
	}

	function updatepassword()
	{
		$('#changepassword').submit(function()
		{
			$.ajax(
			{
				type: "POST",
				url: 'include/updatepassword.php',
				data: $(this).serialize(),
				success: function(data)
				{ 		
					if(data=='* Invalid Old Password *')
					{
						$('#oldpassword').css('border','2px solid #4d4dff');						
						$("#msg").html(data);	   		    	   							
					}
					if(data=='* Successfully Updated Your Password *')
					{
						$("#msg").html(data);	 
						$("#changepassword").trigger("reset");
					}
										$("#msg").html(data);	 	
		        },
				error:function() {
			    }
			});
		   	return false;
		});		
	}				
</script>
</html>
<?php
	}
	else
	{
		header('location:index.php');
	}
?>