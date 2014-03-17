<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Qwiches</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'qwichesstyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="shopheading">QWICHES</div>
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'qwiches/qwiches_logo.png');?>"></img>
			</div>
			<div class="details">
				<div class="timing">9AM-9PM</div>
				<div class="status">Currently:
					<img src="<?php echo(IMG.'open_button.png');?>"></img>
				</div>
				<div class="days">
					<ul>
						<li>Mo</li>
						<li>Tu</li>
						<li>We</li>
						<li>Th</li>
						<li>Fr</li>	
						<li>Sa</li>
						<li>Su</li>
					</ul>
				</div>
				<div class="contact">
					<div class="owner">Owner</div>
					<div class="ownername">Mr.Sahil.....8460089916</div>
				</div>
			</div>
		</div>
		<div class="offers">
			<div class="imgslide">
				<div id="slider">
					<img src="<?php echo(IMG.'qwiches/qwiches_banner1.jpg');?>"></img>
					<img src="<?php echo(IMG.'qwiches/qwiches_banner4.jpg');?>"></img>
					<img src="<?php echo(IMG.'qwiches/qwiches_banner7.jpg');?>"></img>
				</div>
			</div>
		</div>
	</div>
	<div id="feedback">Feedback</div>
	</body>
</html>