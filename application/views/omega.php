<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Omega</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'omegastyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
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

		/*var colo=document.choice.from;
		document.write(colo);*/

				$(document).ready(function()
				{
					$(".uploadbutton").click(function()
					{
						$(".uploadform").fadeIn(1000);

						$("#box").css("opacity","0.2");
						$(document).keyup(function(e) 
						{
  						if (e.keyCode == 27 ) 
  							{
	  						$(".uploadform").fadeOut(10);
							$("#box").css('opacity',1);
   							}			
   						}); 
					}); 
				
						
					$(".uploadbutton1").click(function() 
					{
						$(".popupboxes").fadeOut(10);
						/*$(".uploadform").fadeOut(10);*/
						$(".confirm").fadeIn(1000);
						$("#box").css("opacity","0.2");
						$(document).keyup(function(e) 
						{
  						if (e.keyCode == 27 ) 
  							{
	  						$(".uploadform").fadeOut(10);
							$("#box").css('opacity',1);
   							}			
   						});
					});
					$(".conf_butt").click(function()
					{
						$("#uploadform").submit();
					});
				});
	    </script>
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="shopheading">Omega</div>
		
		<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'omega/omega_logo.jpg');?>"></img>
			</div>
			<div class="details">
				<div class="timing">
				9AM-9PM
				</div>

				<div class="status">
				Currently:
				<img src="<?php echo(IMG.'open_button.png');?>"></img>
				</div>

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
					<img src="<?php echo(IMG.'omega/omegaslider1.jpg');?>"></img>
					<img src="<?php echo(IMG.'omega/omegaslider2.jpg');?>"></img>
					<img src="<?php echo(IMG.'oemga/omegaslider3.jpg');?>"></img>
				</div>
			</div>
		</div>
		
		<div class="printform">
		<div class =" information">
		Please choose a file that you want to get printed!
		The current rates are:<br>
		->Black Re1/pg<br>
		->colour Re2/pg
		</div>
		<?php 
		if($this->session->userdata('userName')!= ''){?>
		<button class="uploadbutton" type="button">Upload a file</button>
			<?php 
		}else{
				echo "Please Login to add file for Photocopying";
				}
			?> 
		
			
		</div>
		</div>
		<div class="uploadform">
			<div class="popupboxes">
				<?php 
				if($this->session->userdata('userName')!= ''){
				$attributes = array("id"=>"uploadform");
				echo form_open_multipart('cart/addXeroxFile',$attributes);?>
				<div class="colorselection">
				Choose the colour quality of your pages<br>
				<input type="radio" name="colour" value ="1"> COLOUR<br>
				<input type="radio" name="colour" value ="2" > BLACK
				</div>

				<div class="pagenumber">
				Pages in your document<br>
				from:<input type="input" name="from" required class="numberinput">
				to:<input type="input" name="to" required class="numberinput">
				</div>


				<div class="fileselection">
				<input type="file" name="userfile" required value="file">
				
				</div>

				<div class="sumbit">
					<button class="uploadbutton1" type="button">Submit</button>
				</div>
			</form>
			<?php 
			}else{
				echo "Login to add file to xerox";
			}
			?>
			</div>
				<div class="confirm">
				<div class="confirm_msg">
					The cost would be directly deducted from your Credit balance. Press Confirm to continue or escape to abort!
				</div>
				<div class="conf_butt">
					<button type="button"> Confirm!</button>		
				</div>
				</div>
		
		</div>
		<div id="feedback">Feedback</div>
		<?php include 'reglog.php'; ?>
		<?php include 'feedback.php'; ?>

		
	</body>
</html>