<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Kavya</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'kavyastyle.css');?>">
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
		<div class="shopheading">KAVYA</div>
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'kavya/kavya_logo.png');?>"></img>
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
					
					<img src="<?php echo(IMG.'close_button.png');?>"></img>
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
					<img src="<?php echo(IMG.'kavya/kavya_banner1.jpg');?>"></img>
					<img src="<?php echo(IMG.'kavya/kavya_banner2.jpg');?>"></img>
					<img src="<?php echo(IMG.'kavya/kavya_banner3.jpg');?>"></img>
				</div>
			</div>
		</div>
		<div class="menuhead"><i>Products</i></div>
		<div class="shopproducts">
		<?php
		foreach ($output as $product) {
		?>

			<div class="shopproductitem">
				<img width="100%" src="<?php echo(IMG . $product->productImage); ?>"></img>
				<div class="itemname">
					<?php echo $product->productName; ?>
				</div>
				<div class="itemprice">
					<?php echo "Rs.".$product->price; ?>
				</div>
			</div>
		<?php
		echo form_open('cart/add_cart_item');
		<label>Quantity</label>
		echo form_input('quantity', '1', 'maxlength="2"');
		 echo form_hidden('product_id', $product->productID);
		 echo form_submit('add', 'Add'); 
		 echo form_close();
		}
		?>	
			
		</div>
	</div>
	<div id="feedback">Feedback</div>
	</body>
</html>