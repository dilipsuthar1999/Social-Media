<?php
	require('db.php');
	session_start();
	$regenerateNumber=true;

	$regenerateNumber=true;
	do
	{
		$alphabet='1234567890';
    	$pass=array();
        $pass[0]='IMAGE';
    	$alphaLength=strlen($alphabet)-1;
    	for($i=1;$i<5;$i++) 
    	{
        	$n=rand(0,$alphaLength);
        	$pass[]=$alphabet[$n];
    	}
    	$id=implode($pass);
    	$checkRegNum="SELECT * FROM imageupload WHERE status='$id'";
    	$result=mysqli_query($conn,$checkRegNum);
	    if(mysqli_num_rows($result)==0)
	    {
        	$regenerateNumber=false; 
    	}
	}while($regenerateNumber);


	$filename=$_FILES["image"]["name"];
	$tempname=$_FILES["image"]["tmp_name"];
	$folder="uploadedimage/".$filename;
	move_uploaded_file($tempname,$folder);	
   	$sql="INSERT INTO `imageupload`(`email`, `status`, `image`, `count`) VALUES ('$_SESSION[email]','$id','$folder','0')";
	if($conn->query($sql))
	{
		echo "* Image Successfully Uploaded *";
	}
	else
	{
		echo "Error:".$sql."<br>".$conn->error;
	}
?>