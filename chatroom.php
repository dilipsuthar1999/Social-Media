<?php
	session_start();
	error_reporting(0);
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
		.contain::-webkit-scrollbar 
		{
		    display: none;
		}
	</style>
</head>
<body>
	<?php
		require('template/nav.php');
	?>
	<div class="container">
		<div class="card">
<?php
        $query="SELECT * FROM profile where email='$_GET[nowchat]'";
        $result=mysqli_query($conn,$query);
	    $user=mysqli_num_rows($result);
		if($user!=0)
		{
		   	while($data=mysqli_fetch_assoc($result))
		   	{		
				echo "<div class='header'>
						<img src='include/".$data['image']."' style='width:40px; height: 40px; border-radius: 50%; padding: 5px; float:left;'>
						<div style='padding:10px; font-size: 20px; color: #000000;'><b>".$data['name']."</b></div>
					</div>";
			}
		}
?>
			<div style='padding: 5px;'>
				<div class='contain' id='showchat' style='height:500px; background-color: transparent; overflow-y: scroll; width: 100%; padding: 0px;'>
<?php
					$_SESSION['receiver']=$_GET['nowchat'];
					require('include/showchat.php');
?>		
				</div>
			</div>

			<div class="footer">
				<form id="msg" autocomplete="off">
					<input type="text" name="receiver" value="<?php echo $_GET['nowchat'] ?>" style="display: none;">
					<input type="text" name="chat" style="width:80%; padding-top: 5px; padding-bottom: 5px; border: none; border-bottom: 2px solid black; outline: none; font-size: 15px;" required="">
					<button style="font-size: 35px; padding-top: 5px; padding-bottom: 5px; padding-left: 2px; width: 13%; background-color: transparent; border: none; outline: none;" type="submit" name="sendchat" value="sendchat" id="sendchat" onclick="sendmsg();"><b><i class="fas">&#xf138;</i></b></button>
				</form>
			</div>
		</div>
	</div>	
	<?php
		require('template/footer.php');
	?>	
</body>
</html>
<script type="text/javascript">
	$(document).ready(function()
	{
	   var refreshId = setInterval(function()
	   {
	   		$('#showchat').load('include/showchat.php');	   		
		   	document.getElementById('showchat').scrollTop = document.getElementById('showchat').scrollHeight;			   		
	   }, 1000);

	});

	$(document).ready(function()
	{
		$('#sendchat').click(function()
		{
    		$.ajax(
    		{
				type: "POST",
		       	url: 'include/chatting.php',
		       	data: $('#msg').serialize(),
		       	success: function(data)
		       	{ 		
	       			$("#msg").trigger("reset");				
           		},
	       		error:function() {
	        	}
	    	});
   			return false;
	   	});
	});		
</script>
<?php
	}
	else
	{
		header('location:index.php');
	}
?>