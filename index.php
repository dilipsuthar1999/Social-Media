<?php
	session_start();
	if(!isset($_SESSION['email']))
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
		#logupmsg,#loginmsg
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
			$('#loginuserdetail').click(function()
			{
				$.ajax(
				{
					type: "POST",
					url: 'include/login.php',
					data: $('#login').serialize(),
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

			$('#logupuserdetail').click(function()
			{
				$.ajax(
				{
					type: "POST",
					url: 'include/logup.php',
					data: $('#logup').serialize(),
					success: function(data)
					{ 		
						if(data=='* User Already Exist *')
						{
							$('#logupemail').css('border','2px solid #4d4dff');
							$("#logupmsg").html(data);	  
						}
						if(data=='* Successfully Created *')
						{
							$("#logup").trigger("reset");							
							$("#logupmsg").html(data);	  
						}
						if(data=='* Password Does Not Match *')
						{
							$('#loguppassword').css('border','2px solid #4d4dff');							
							$("#logupmsg").html(data);	  							
						}
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
		<button onclick="login();" id="in"><b>LOGIN</b></button>
		<button onclick="loginup();" id="up"><b>REGISTER</b></button>
	</center>
	<form id="login" enctype="multipart/form-data" autocomplete="off">
		<label><b>Email</b></label>
		<input type="text" name="emaillogin" required="" class="input" id="loginemail"><br><br>
		<label><b>Password</b></label>
		<input type="password" name="passwordlogin" required="" class="input" id="show" id="loginpassword">
		<input type="checkbox" name="show" style="margin-top: 10px;" onclick="showpassword();"><label><b>Show Password</b></label><br><br>
		<button type="submit" name="loginuserdetail" value="loginuserdetail" id="loginuserdetail" class="form" onclick="userlogin();"><b>LOGIN</b></button>
		<b><div id="loginmsg"></div></b>
	</form>
	<form id="logup" enctype="multipart/form-data" autocomplete="off">
		<label><b>Name</b></label>
		<input type="text" name="name" required="" class="input"><br><br>
		<label><b>Email</b></label>
		<input type="text" name="email" required="" class="input" id="logupemail"><br><br>
		<label><b>Password</b></label>
		<input type="password" name="password" id="show1" required="" class="input">
		<input type="checkbox" name="show" style="margin-top: 10px;" onclick="showpassword1();"><label><b>Show Password</b></label><br><br>
		<label><b>Confirm Password</b></label>
		<input type="password" name="cpassword" required="" class="input" id="loguppassword"><br><br>
		<button type="submit" name="logupuserdetail" value="logupuserdetail" id="logupuserdetail" class="form" onclick="userlogup();"><b>LOGUP</b></button>
		<b><div id="logupmsg"></div></b>
	</form>
	<?php
		require('template/footer.php');
	?>	
</body>
<script type="text/javascript">
	document.getElementById("logup").style.display = "none";
	document.getElementById("up").style.backgroundColor="#ffcccc";		
	function login() 
	{
		document.getElementById("login").style.display = "block";
		document.getElementById("logup").style.display = "none";
		document.getElementById("up").style.backgroundColor="#ffcccc";
		document.getElementById("in").style.backgroundColor="#ff4d4d";
	}
	function loginup()
	{
		document.getElementById("login").style.display = "none";
		document.getElementById("logup").style.display = "block";
		document.getElementById("in").style.backgroundColor="#ffcccc";			
		document.getElementById("up").style.backgroundColor="#ff4d4d";
	}
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
	function showpassword1()
	{
		var y=document.getElementById("show1");
		if(y.type==="password")
		{
			y.type="text";
		}
		else
		{
			y.type="password";			
		}		
	}
</script>
</html>
<?php
	}
	else
	{
		header('location:home.php');
	}
?>