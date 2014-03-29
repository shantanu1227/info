<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>subway</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'subwaystyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
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
				var subproductid = $(this).attr('id'); 
				var subproductimg = $(this).find('img').first().attr('src');
				var subproductname = $(this).find('div').first().text();
				var subproductprice = $(this).find('div').last().text();
				$('#formproductname').val(subproductname);
				$('#formproductid').val(subproductid);
				$('#formproductprice').val(subproductprice);
				
 				 document.getElementById('subwayextraformfetch').innerHTML = '<div class="subextraname">'+subproductname+'</div>';
				$('#subwayextraformfetch').append('<div class="subextraimg"> <img src="'+subproductimg+'"></div>');
				$('#subwayextraformfetch').append('<div class="subextraprice">'+subproductprice+'</div>');
				$("#subwayextraform").fadeIn(1000);
				$("#box").css("opacity","0.2");
								$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $("#subwayextraform").fadeOut(10);
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
		<?php include 'dynamicproductsubway.php'; ?>
		<?php include 'reglog.php'; ?>
		
	<div id="subwayextraform">
			<div id="subwayextraformfetch">
			
			</div>
			
			<div class="addvegies">
			<?php echo form_open('cart/addsubwaytocart'); ?>
			<input name="productid" type="hidden" id ="formproductid" value=''>
			<input name="productname" type="hidden" id ="formproductname" value=''>
			<input name="qty" type="hidden" value='1' >
			<input name="price" type="hidden" id ="formproductprice" value=''>
			
			<div class="addtosub">
			<div><b>Choose your bread:</b></div>
			
			<input type="radio" name="bread" value="Regular" >Regular</br>
			<input type="radio" name="bread" value="9-grain-wheat" >9-grain-wheat</br>
			<input type="radio" name="bread" value="Italian" >Italian</br>
			<input type="radio" name="bread" value="Monterey Cheddar" >Monterey Cheddar</br>
			<input type="radio" name="bread" value="Flat Bread" >Flat Bread</br>
			
			</div>
			<div class="addtosub">
			<div><b>Choose bread size:</b></div>
			
			<input type="radio" name="size" value="6-inch" >6-inch</br>
			<input type="radio" name="size" value="Footlong" >Footlong</br>
			
			</div>
			<div class="addtosub">
			<div><b>Add veggies to your SUB </b></div>
			
			<input type="checkbox" name="veggie" value="Lettuce" >Lettuce</br>
			<input type="checkbox" name="veggie" value="Tomatoes" >Tomatoes</br>
			<input type="checkbox" name="veggie" value="Cucumbers" >Cucumbers</br>
			<input type="checkbox" name="veggie" value="Pickles" >Pickles</br>
			<input type="checkbox" name="veggie" value="Peppers" >Peppers</br>
			<input type="checkbox" name="veggie" value="Onions" >Onions</br>
			<input type="checkbox" name="veggie" value="Red Olives" >Red Olives</br>
			<input type="checkbox" name="veggie" value="Jalapenos" >Jalapenos</br>
			
			</div>
			<div class="addtosub">
			<div><b>Add saucages to your SUB</b></div>
			
			<input type="checkbox" name="extra" value="Mayo" >Mayo</br>
			<input type="checkbox" name="extra" value="Hot Sauce" >Hot Sauce</br>
			<input type="checkbox" name="extra" value="Yellow Mustard" >Yellow Mustard</br>
			<input type="checkbox" name="extra" value="Honey Mustard" >Honey Mustard</br>
			<input type="checkbox" name="extra" value="Italian Dressing" >Italian Dressing</br>
			<input type="checkbox" name="extra" value="BBQ Sauce" >BBQ Sauce</br>
			<input type="checkbox" name="extra" value="Sweet Onion Sauce" >Sweet Onion Sauce</br>
			
			</div>
			<div class="addtosubcomment">
			<TEXTAREA name="comments" rows="3" cols="40">
			
			
			</TEXTAREA>
			</div>
			<div class="subaddtocart">
			<div > <input class="subaddtocartbut"type="submit" value="add"></div>
			
			</div>
			
			<?php echo form_close();?>
			</div>
			
			</div>
	</body>
</html>