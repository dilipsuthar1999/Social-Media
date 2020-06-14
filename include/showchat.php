<?php
	require('db.php');
	session_start();
	$query="SELECT * FROM chat where (sender='$_SESSION[email]' AND receiver='$_SESSION[receiver]')OR(receiver='$_SESSION[email]' AND sender='$_SESSION[receiver]')";
   	$result=mysqli_query($conn,$query);
   	$user=mysqli_num_rows($result);
   	if($user!=0)
	{
		while($data=mysqli_fetch_assoc($result))
		{
			$r=strcmp($data['sender'],$_SESSION['email']);
			if($r==0)
			{
?>
				<div style="border: 1px solid #f2f2f2; background-color: #f2f2f2; border-radius: 5px; padding:0px 10px 10px 10px; margin-left: 20px;">
				  	<p><?php echo $data['msg']; ?></p>
				  	<span style="font-size: 15px;"><?php echo $data['time']; ?></span>
				</div><br>			
<?php
			}
			else
			{
?>
				<div style="border: 1px solid #bfbfbf; background-color: #bfbfbf; border-radius: 5px; padding:0px 10px 10px 10px; margin-right: 20px;">
				  	<p><?php echo $data['msg']; ?></p>
				  	<span style="font-size: 15px;"><?php echo $data['time']; ?></span>
				</div><br>	
<?php
			}
		}
	}
?>