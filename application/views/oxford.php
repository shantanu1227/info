<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Oxford Stationery</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'oxfordstyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo(CSS.'reglogcss.css');?>" rel="stylesheet" type="text/css" />
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="shopheading">OXFORD STATIONERY</div>
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'oxford/oxford.jpg');?>" width="100%"></img>
			</div>
			<div class="details">
				<div class="timing">9AM-9PM</div>
				<div class="dayswrap">
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
				</div></div>
				<div class="status">
					<div class="statustext">Status:</div>
					<img src="<?php echo(IMG.'open_button.png');?>"></img>
				</div>
				<div class="contact">
					<div class="owner">Owner</div>
					<div class="ownername">Mr.Sahil</div>
					<div class="ownernum">8460089916</div>
				</div>
			</div>
		</div>
		<div class="offerhead">What's cool today?</div>
		<div class="offers">
			<div class="imgslide">
				<div id="slider">
				
					<img  height="200%" , src="<?php echo(IMG.'oxford/sliderimage3.jpeg');?>"></img>
					<img src="<?php echo(IMG.'oxford/sliderimage4.jpg');?>"></img>
					<img src="<?php echo(IMG.'oxford/sliderimage7.jpeg');?>"></img>
					<img src="<?php echo(IMG.'oxford/sliderimage6.gif');?>"></img>
				</div>
			</div>
		</div>
		<?php include 'reglog.php'; ?>
	</body>
</html>

