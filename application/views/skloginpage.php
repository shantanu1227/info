
<html>
	<head>
		<title>Shopkeeper Login</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
		
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	
	
	
		
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'core.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="shoploginhead">Shopkeeper Login</div>
		<div class="sklogindiv">
		<?php
		echo form_open('shop/login');
			?>
				<div class="skforminput"><input type="text" name="username" placeholder="Enter Username"><br></div>
				<div class="skforminput"><input type="password" name="password" placeholder="Enter Password"><br></div>
				<div class="skforminputsubmit"><input type="submit" value="Login" /> </div>
			<?php echo form_close();?>
			</div>
	</div>

		</body>
		
</html>		