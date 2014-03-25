<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>subway</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'subwaystyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	<script>
				$(document).ready(function(){
				$(".shopproductitem").click(function(){
				$subproduct = $(".itemname").text(); 
				<?php foreach ($output as $product) {
				if(($product->productName) == ?>  $subproduct  <?php )
				{ ?> 
				 document.getElementsByClassName('subwayextraform').innerHTML="<?php echo($product->productName); ?>";  <?php
				}
				
				
				} ?>
				$(".subwayextraform").fadeIn(1000);
				$("#box").css("opacity","0.2");
								$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $(".subwayextraform").fadeOut(10);
					$("#box").css('opacity',1);
   }			}); 
				}); 
				});
	    </script>
	<div id="box">
		<?php include 'header1.php'; ?>
		 <div class="shopheading">Subway</div> 
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'subway/subway_logo.jpg');?>"></img>
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
					
					<img src="<?php echo(IMG.'open_button.png');?>"></img>
				</div>
				<div class="contact">
					<div class="owner">Owner</div>
					<div class="ownername">Mr.Sahil</div>
					<div class="ownernum">8460089916</div>
				</div>
			</div>
		</div>
		<div class="offerhead">How to order -></div>
		<div class="offers">
			<div class="imgslide">
				<div id="slider">
					<img src="<?php echo(IMG.'subway/subwayslider1.jpg');?>"></img>
					<img src="<?php echo(IMG.'subway/subwayslider2.jpg');?>"></img>
					<img src="<?php echo(IMG.'subway/subwayslider3.jpg');?>"></img>
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
		}
		?>	
			<div class="subwayextraform">
			
			</div>
		</div>
	</div>
	<div id="feedback">Feedback</div>
	</body>
</html>