<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Club Laptop</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'clublaptopstyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'footerstyle.css');?>">
		
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'core.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	<script>
	$(document).ready(function(){
				$(".reloadonadd").click(function(){
				updatecart(location.href);
				});
				});
	</script>		
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="shopheading">Club Laptop</div>
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'clublaptop/club_logo.jpg');?>"></img>
			</div>
			<?php foreach ($outputTimings as $tuple) { ?>
			
			<div class="details">
				<div class="timing"> <?php echo $tuple->openingTime." - ".$tuple->closingTime; ?> </div>
				<div class="dayswrap">
				<div class="days">
					<ul>
						<?php if($tuple->holidays=="OPEN") {?>
						<li>Su</li>
						<?php } ?>

						<li>Mo</li>
						<li>Tu</li>
						<li>We</li>
						<li>Th</li>
						<li>Fr</li>	
						<li>Sa</li>
					</ul>
				</div></div>
				<div class="status">
					<?php if($tuple->currentStatus=="OPEN") { ?>
					<img src="<?php echo(IMG.'open_button.png');?>"></img>
					<?php }
					else { ?>
					<img src="<?php echo(IMG.'close_button.png');?>"></img>
					<?php }} ?>
				</div>

				<div class="contact">
					<div class="owner">Contact Number</div>
					<?php foreach ($outputNumber as $val) { ?>
					<div class="ownernum"> <?php echo $val->contactNo ?> </div>
					<?php } ?>
				</div>
				
			</div>
		</div>
		<div class="menuhead"><i>Products</i></div>
		<?php include 'dynamicproduct.php'; ?>
		<?php include 'footer.php'; ?>
		
		</div>
		<div id="feedback">Feedback</div>
		<?php include 'feedback.php'; ?>
		<?php include 'reglog.php'; ?>
	</body>
</html>