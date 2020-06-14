<?php
	require('db.php');
	session_start();
	$query2="SELECT * FROM request where sender='$_SESSION[email]' OR receiver='$_SESSION[email]'";
	$result2=mysqli_query($conn,$query2);
	$user2=mysqli_num_rows($result2);
	if($user2!=0)
	{
		while($data2=mysqli_fetch_assoc($result2))
       	{		
      		if($data2['status']=='YES')
       		{
		        $query="SELECT * FROM imageupload where email='$data2[sender]' OR email='$data2[receiver]'";
		        $result=mysqli_query($conn,$query);
		        $user=mysqli_num_rows($result);
		        if($user!=0)
		        {
		          	while($data=mysqli_fetch_assoc($result))
		          	{
		          	    $query1="SELECT * FROM profile where email='$data[email]'";
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
										</div>";		          		
				          	}
				        }
						echo "<div class='contain'>
									<img src='include/".$data['image']."' style='width: 100%; height: 100%;'>
								</div>
								<div class='footer'>
									<a href='addcomment.php? id=".$data['status']."' style='font-size: 30px; padding: 10px; color: #000000; border:none; background-color:transparent; outline: none; transition: 1.0s ease;	text-decoration: none;'>
										<i class='far'>&#xf075;</i> ".$data['count']."
									</a>
								</div>
							</div><br>";
					}
				}
			}
		}
	}
?>