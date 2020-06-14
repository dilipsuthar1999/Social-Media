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
	</style>
</head>
<body>
	<center>
		<img src="image/logo.png" class="logo">			
		<label class="logoname"><b>FRIEND ZONE</b></label>
	</center>	
	<form id="addprofile" enctype="multipart/form-data" autocomplete="off">
		<center><label for="file-upload" class="file"><b>Select Image</b></label></center><br><br>		
		<input id="file-upload" type="file" name="image" required="" class="input" style="display: none;"><br><br>
		<label><b>About You</b></label>
		<textarea type="text" name="user" required="" class="input"></textarea>		
		<button type="submit" name="uploaduserimagedetail" value="uploaduserimagedetail" class="form"><b>Submit</b></button>
	</form>
	<?php
		require('template/footer.php');
	?>	
</body>
</html>