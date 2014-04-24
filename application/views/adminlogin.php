<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Admin Login</title>
		
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
			<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'adminstyle.css');?>">

		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'core.js');?>" type="text/javascript"></script>
		<style>
		body {background: url(../assets/img/web_back.jpg) no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;}
		
		</style>
	</head>
	
	<body>
	
	<div id="box">
	<div id="cname">Vinfocity </div>
	<div class="adminloginhead">Admin Login</div>
		<div class="adminlogindiv">
		<?php
		echo form_open('admin/login');
			?>
				<div class="admininput"><input type="text" name="adminUsername" placeholder="Enter Username"><br></div>
				<div class="admininput"><input type="password" name="adminPassword" placeholder="Enter Password"><br></div>
				<div class="admininputsubmit"><input type="submit" value="Login" /> </div>
			<?php echo form_close();?>
			</div>
	
	</div>
	
	</body>
	
</html>	