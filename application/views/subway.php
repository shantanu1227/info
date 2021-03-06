<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Subway</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'subwaystyle.css');?>">
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
	<script>
				$(document).ready(function(){
				$(".shopproductitem").click(function(){
				var subproductid = $(this).attr('id'); 
				var subproductimg = $(this).find('img').first().attr('src');
				var subproductname = $(this).find('div').first().text();
				var subproductprice = $(this).find('div').last().text();
				var trimprice =  parseInt(subproductprice.match(/[0-9]+/)[0], 10);
				$('#formproductname').val(subproductname.trim());
				$('#formproductid').val(subproductid);
				$('#formproductprice').val(trimprice);
				
 				 document.getElementById('subwayextraformfetch').innerHTML = '<div class="subextraname">'+subproductname+'</div>';
				$('#subwayextraformfetch').append('<div class="subextraimg"> <img src="'+subproductimg+'"></div>');
				$('#subwayextraformfetch').append('<div class="subextraprice">'+subproductprice+'</div>');
				$("#subwayextraform").fadeIn(1000);
				$("#box").css("visibility","hidden");
				$("#feedback").css("visibility","hidden");
				$("body").css("background","url(<?php echo(IMG.'web_back.jpg' );?>) no-repeat center center fixed");
				$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $("#subwayextraform").fadeOut(10);
					$("#box").css("visibility","visible");
					$("#feedback").css("visibility","visible");
					$("body").css("background","none");
   }			}); 
				}); 
				$(document).on('click','#closebuttonrl',function(){
		$("#subwayextraform").fadeOut(500);
		$("#box").css('opacity',1);
		$("#box").css("visibility","visible");
		$("#feedback").css("visibility","visible");
		$("body").css("background","none");
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
					<div class="owner">Contact Number</div>
					<?php foreach ($outputNumber as $val) { ?>
					<div class="ownernum"> <?php echo $val->contactNo ?> </div>
					<?php } ?>
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
		<?php include 'footer.php'; ?>
		</div>
		<?php include 'reglog.php'; ?>
	<div id="subwayextraform">
	<div id="closebuttonrl"><img src="<?php echo(IMG.'closebutton.png');?>" style="max-width:30px;
    max-height:30px;"></img></div>
			<div id="subwayextraformfetch">
			
			</div>
			<div id="closebuttonrl">
		
	</div>
			<div class="addvegies">
			<?php echo form_open('cart/addsubwaytocart'); ?>
			<input name="productid" type="hidden" id ="formproductid" value=''>
			<input name="productname" type="hidden" id ="formproductname" value=''>
			<input name="qty" type="hidden" value='1' >
			<input name="price" type="hidden" id ="formproductprice" value=''>
			
			<div class="addtosub">
			<div><b>Choose your bread:</b></div>
			
			<label><input type="radio" name="bread" value="Regular" checked="checked" autocomplete="on">Regular</label></br>
			<label><input type="radio" name="bread" value="9-grain-wheat" >9-grain-wheat</label></br>
			<label><input type="radio" name="bread" value="Italian" >Italian</label></br>
			<label><input type="radio" name="bread" value="Monterey Cheddar" >Monterey Cheddar</label></br>
			<label><input type="radio" name="bread" value="Flat Bread" >Flat Bread</label></br>
			
			</div>
			<div class="addtosub">
			<div><b>Choose bread size:</b></div>
			
			<label><input type="radio" name="size" value="1" checked="checked" autocomplete="off">6-inch</label></br>
			<label><input type="radio" name="size" value="2" >Footlong</label></br>
			
			</div>
			<div class="addtosub">
			<div><b>Add veggies to your SUB </b></div>
			
			<label><input type="checkbox" name="veggie[]" value="Lettuce" >Lettuce</label></br>
			<label><input type="checkbox" name="veggie[]" value="Tomatoes" >Tomatoes</label></br>
			<label><input type="checkbox" name="veggie[]" value="Cucumbers" >Cucumbers</label></br>
			<label><input type="checkbox" name="veggie[]" value="Pickles" >Pickles</label></br>
			<label><input type="checkbox" name="veggie[]" value="Peppers" >Peppers</label></br>
			<label><input type="checkbox" name="veggie[]" value="Onions" >Onions</label></br>
			<label><input type="checkbox" name="veggie[]" value="Red Olives" >Red Olives</label></br>
			<label><input type="checkbox" name="veggie[]" value="Jalapenos" >Jalapenos</label></br>
			
			</div>
			<div class="addtosub">
			<div><b>Add saucages to your SUB</b></div>
			
			<label><input type="checkbox" name="extra[]" value="Mayo" >Mayo</label></br>
			<label><input type="checkbox" name="extra[]" value="Hot Sauce" >Hot Sauce</label></br>
			<label><input type="checkbox" name="extra[]" value="Yellow Mustard" >Yellow Mustard</label></br>
			<label><input type="checkbox" name="extra[]" value="Honey Mustard" >Honey Mustard</label></br>
			<label><input type="checkbox" name="extra[]" value="Italian Dressing" >Italian Dressing</label></br>
			<label><input type="checkbox" name="extra[]" value="BBQ Sauce" >BBQ Sauce</label></br>
			<label><input type="checkbox" name="extra[]" value="Sweet Onion Sauce" >Sweet Onion Sauce</label></br>
			
			</div>
			<div class="addtosubcomment" style="font-size:13px;">
			<TEXTAREA name="comments" rows="3" cols="40"></TEXTAREA>
			*Extra cheese or the likes will incur additional charges!
			</div>
			<div class="subaddtocart">
			<div > <input class="subaddtocartbut"type="submit" value="Add to Cart"></div>
			
			</div>
			
			<?php echo form_close();?>
			</div>
			
			</div>
			</div>
			<div id="feedback">Feedback</div>
		<?php include 'feedback.php'; ?>
	</body>
</html>