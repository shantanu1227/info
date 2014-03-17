<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Laundromart</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'laundromartstyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
		<!--script>
		var lastWidth = $(window).width();
		$(window).resize(function(){
			if($(window).width()!=lastWidth){
				var elem = document.getElementById("feedback");
				elem.style.width = "500px";
			lastWidth = $(window).width();
			}
		}
		</script-->	
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="shopheading">LAUNDROMART</div>
		<div class="offers">
			<div class="imgslide">
				<div id="slider">
					<img src="<?php echo(IMG.'infocity1.jpg');?>"></img>
					<img src="<?php echo(IMG.'infocity2.jpg');?>"></img>
					<img src="<?php echo(IMG.'infocity3.jpg');?>"></img>
				</div>
			</div>
		</div>
	</div>
	<div id="feedback">Feedback</div>
	</body>
</html>