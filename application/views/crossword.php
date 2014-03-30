<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Crossword</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'crosswordstyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
		
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="shopheading">CROSSWORD</div>
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'crossword/index.jpeg');?>"></img>
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
					<img src="<?php echo(IMG.'crossword/sliderimage1.jpeg');?>"></img>
					<img src="<?php echo(IMG.'crosswosd/sliderimage3.jpeg');?>"></img>
					<img src="<?php echo(IMG.'crossword/sliderimage2.png');?>"></img>
					<img src="<?php echo(IMG.'crossword/sliderimage5.jpeg');?>"></img>
				</div>
			</div>
		</div>
		<div id="feedback">Feedback</div>
	</body>
</html>
