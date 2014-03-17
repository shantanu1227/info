<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Apex</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'omegastyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
		<div id="header">
			<div id="fixed_head">
				<div class="cname">Vinfocity</div>
				<div class="loginaccount">
					<div class="reglog">Login/Register</div>
					<div class="myaccount">My Account</div>
				</div>
			</div>
			<div class="navigation">
				<div class="navbar">
					<ul>
						<li><a>HOME</a></li>
						<li>FOOD
						<ul>
							<li><a>Subway</a></li>
							<li><a>Shivas</a></li>
							<li><a>Cool Point</a></li>
						</ul>
						</li>
						<li>PROVISION
						<ul>
							<li><a>Kavya </a></li>
						</ul>
						</li>
						<li><a>MEDICAL</a></li>
						<li><a>STATIONARY</a></li>
						<li>LAUNDRY
						<ul>
							<li><a>Laundromart</a></li>
							<li><a>Wash Express</a></li>
						</ul>
						</li>
						<li><a>PERIPHERALS</a></li>
						<li><a>PRINT/COPY</a></li>
						<li><a>ABOUT US</a></li>
						<li><a>FAQS</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="shopheading">Omega</div>
		<div class="offers">
			<div class="imgslide">
				<div id="slider">
					<img src="<?php echo(IMG.'infocity1.jpg');?>"></img>
					<img src="<?php echo(IMG.'infocity2.jpg');?>"></img>
					<img src="<?php echo(IMG.'infocity3.jpg');?>"></img>
				</div>
			</div>
		</div>
	
		<div class="printform">
			<form>
			<div class="colorselection">
			Choose the colour quality of your pages<br>
			<input type="radio" name="colour" value="colour"> COLOUR<br>
			<input type="radio" name="colour" value="black"> BLACK
			</div>

			<div class="pagenumber">
			Pages in your document<br>
			from:<input type="input" name="from" class="numberinput">
			to:<input type="input" name="to" class="numberinput">
			</div>

			<div class="fileselection">
			<input type="file" value="file">
			
			<button class="uploadbutton" type="button">upload</button>
			</div>
		
			</form>
			
		</div>
	</body>
</html>