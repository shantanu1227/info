<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Washexpress</title>
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'washexpressstyle.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
	
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
		<div class="shopheading">Washexpress</div>
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'washexpress/rsz_washexpress_logo.jpg');?>"></img>
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
			<div class="offerhead">What's cool today?</div>
			<div class="offers">
				<div class="imgslide">
					<div id="slider">
						<img src="<?php echo(IMG.'washexpress/washexpress_banner2.jpg');?>"></img>
						<img src="<?php echo(IMG.'washexpress/washexpress_banner1.jpg');?>"></img>
						<img src="<?php echo(IMG.'washexpress/washexpress_banner3.jpg');?>"></img>
						<img src="<?php echo(IMG.'washexpress/washexpress_banner4.jpg');?>"></img>
					</div>
				</div>
			</div>
			<div class="slipinfo">
				<?php if($this->session->userdata('userName')!=''){?>
				<div class="sliphead" style="font-family:calibri;">Bill Details</div>
				<?php $attributes = array('id' => 'billdetailsform');
				echo form_open_multipart('cart/addLaundry', $attributes);
				?>
				<div class="forminput"><input type="text" name="billno" required placeholder="Bill Number'"><br></div>
				<div class="forminput"><input type="text" name="billAmount" required placeholder="Price"><br></div>
				<div class="forminput">Select Slot: <select name="slotId">
					<?php foreach ($slots as $slot) {?>
					<option value="<?php echo $slot->deliverySlot ; ?>"><?php echo $slot->starttimings;?>-<?php echo $slot->endtimings;?></option>  
					<?php
				}?>
			</select><br></div>
			<div id="billimage"> <input type="file" name="userfile" required /></div>
			<div id = "submit"><input type="submit" value="Submit" /></div>
			
			<?php echo form_close();?>
			<?php 
		}
		else {
			echo "Please Login To add Laundry Details!";
		}?>
	</div>
</div>
<div id="feedback">Feedback</div>
<?php include 'reglog.php'; ?>
<?php include 'feedback.php'; ?>
</body>
</html>