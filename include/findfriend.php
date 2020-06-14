<?php
	require('db.php');
	session_start();
    $query="SELECT * FROM profile where name LIKE '%".$_POST['searchfriend']."%'";
    $result=mysqli_query($conn,$query);
    $user=mysqli_num_rows($result);
   	if($user!=0)
   	{
      	while($data=mysqli_fetch_assoc($result))
       	{
       		if($_SESSION['email']==$data['email'])
       		{

       		}
       		else
       		{
				echo "<a href='addfriend.php? receiver=".$data['email']."' class='card'>
						<div class='contain'>
						<img src='include/".$data['image']."' style='width:40px; height: 40px; border-radius: 50%; padding: 5px; float:left;'>
						<div style='padding:10px; font-size: 20px; color: #000000;'><b>".$data['name']."</b></div>
						</div>
					</a><br>"; 
			}
       	}
    }
?>