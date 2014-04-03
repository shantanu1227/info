<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo(CSS.'reglogcss.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo(CSS.'footerstyle.css');?>" rel="stylesheet" type="text/css" />
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
		<title>Vinfocity</title>
	</head>
	<body>
		<div id="box">
			<?php include 'header1.php'; ?>
			<div class="offers">
				<div class="imgslide">
					<div id="slider">
						<img src="<?php echo(IMG.'infocity1.jpg');?>"></img>
						<img src="<?php echo(IMG.'infocity2.jpg');?>"></img>
						<img src="<?php echo(IMG.'infocity3.jpg');?>"></img>
					</div>
				</div>
			</div>
			<div class="trending">
					<?php foreach ($outputOffers as $product) {?>	
					<div class="trendobject">		
						<img src="<?php echo (IMG.$product->offerImageUrl); ?>"></img>
						<div class="trendtext">
							<div class="offdes"><?php echo $product->offerName ?></div>
							<div class="trendshop"> 
								<div class="trendshophead">SHOP NAME: </div>
								<div class="trendshopname"> <?php echo $product->name ?></div>
							</div>
						</div>
					</div>
					<?php } ?>
			</div>
			<div class="todaymenu">
				<div class="todaymenuhead">TODAY'S MENU</div>
				<?php foreach ($outputThalis as $tuple) { ?>
					<div class="restdetail">
						<div class="resthead"> <?php echo $tuple->name; ?> </div>
						<div class="restmenu"><?php echo "Dinner: ".$tuple->dinner."<br>"."Lunch: ".$tuple->lunch."<br>"; ?></div>
					</div>
					<?php } ?>
			</div>
			<?php include 'footer.php'; ?>
		</div>
		<?php include 'reglog.php'; ?>
		<div id="feedback">Feedback</div>
		<?php include 'feedback.php'; ?>
	</body>
</html>
