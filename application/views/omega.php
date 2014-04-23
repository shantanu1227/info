<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Omega</title>
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'omegastyle.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'footerstyle.css');?>">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
	<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
	<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo (JS.'core.js');?>" type="text/javascript"></script>
</head>

<body>
	<script src="<?php echo (JS.'jquery-validation-1.11.1/dist/jquery.validate.min.js');?>" type="text/javascript"></script>
	<!-- jQuery Form Validation code -->
	<script>
		
  // When the browser is ready...
  $(function() {
  	
	// Setup form validation on the #register-form element
	$.validator.addMethod(
		"regex",
		function(value, element, regexp) {
			var re = new RegExp(regexp);
			return re.test(value);
		},
		"Please check your input."
		);

	$("#registerform").validate({
		errorElement: "div",
		// Specify the validation rules
		rules: {
			fullname: "required",
			username: {
				required: true,
				number: true,
				range: [201001001, 201499999]
			},
			password: {
				required: true,
				minlength: 5
			},
			roomno: {
				required: true,
				regex: '^[A-H]{1}-[1-3]{1}[0-2]{1}[0-9]{1}$'
			},
			mobileno: {
				required: true,
				minlength: 10
			},
		},
		
		// Specify the validation error messages
		messages: {
			fullname: "",
			username: {
				required:'',
				maxlength: "Please enter a your DA-IICT ID.",
				minlength: "Please enter a your DA-IICT ID.",
				range: "Please enter a your DA-IICT ID."
			},
			password: {
				required:'',
				minlength: "Password must be at least 5 characters long."
			},
			roomno: {
				required:'',
				regex: "Please enter a valid roomno."
			},
			mobileno: {
				required:'',
				minlength: "Please enter a valid mobile number."
			},
		},
		
		submitHandler: function(form) {
			form.submit();
		}
	});	
</script>
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
						<div class="owner">Contact Number</div>
						<?php foreach ($outputNumber as $val) { ?>
						<div class="ownernum"> <?php echo $val->contactNo ?> </div>
						<?php } ?>
					</div>
					
				</div>
			</div>
			
			<!--div class="offerhead">What's cool today?</div>
			<div class="offers">
				<div class="imgslide">
					<div id="slider">
						<img src="<?php echo(IMG.'omega/omegaslider1.jpg');?>"></img>
						<img src="<?php echo(IMG.'omega/omegaslider2.jpg');?>"></img>
						<img src="<?php echo(IMG.'oemga/omegaslider3.jpg');?>"></img>
					</div>
				</div>
			</div-->
			
			<div class="printform">
				<div class =" information">
					Please choose a file that you want to get printed!
					The current rates are:<br>
					-> Black Re.1/page<br>
					-> Colour Rs.2/page
				</div>
				<?php 
				if($this->session->userdata('userName')!= ''){?>
				<button class="uploadbutton" type="button">Upload a file</button>
				<?php 
			}else{?>
			<div class="login_error"> Please Login to add file for Photocopying. </div>
			<?php }
			?> 
			
			
		</div>
		<?php include 'footer.php'; ?>
	</div>
	<div class="uploadform">
		<div class="popupboxes">
			<?php 
			if($this->session->userdata('userName')!= ''){
				if(count($slots)>0){
					$attributes = array("id"=>"uploadform");
					echo form_open_multipart('cart/addXeroxFile',$attributes);?>
					<div class="colorselection">
						Choose the colour quality of your pages.
						<input type="radio" name="colour" checked="checked" autocomplete="off" value ="1"> COLOUR
						<input type="radio" name="colour" value ="2" > BLACK
					</div>

					<div class="pagenumber">
						Select pages to be printed.
						from:<input type="input" name="from" required class="numberinput">
						to:<input type="input" name="to" required class="numberinput" >
					</div>


					<div class="fileselection">
						<input type="file" name="userfile" required value="file">
						
					</div>
					<div class="copies">
						Select the number of copies:
						<select name="qty">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							
						</select>
					</div>
					<div class="slots">
						Select the time slot:
						<select name="slotId">
							<?php 
							foreach ($slots as $slot) {?>
							<option value="<?php echo $slot->deliverySlot ; ?>"><?php echo $slot->starttimings;?>-<?php echo $slot->endtimings;?></option>  
							<?php
						}?>
					</select>
				</div>
				

				<div class="sumbit">
					<button class="uploadbutton1" type="button">Submit</button>
				</div>
			</form>
			<?php }
			else{
				echo "No slots available now Please come back later";
			}
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