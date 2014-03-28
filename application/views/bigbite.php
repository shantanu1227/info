<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Big Bite</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel='stylesheet' type="text/css" href="<?php echo(CSS . 'bigbitestyle.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS . 'js-image-slider.css'); ?>">
        <script type='text/javascript' src="<?php echo(JS . 'js-image-slider.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo(JS . 'jquery-1.7.1.min.js'); ?>"></script>
	  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
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
		$("#loginform").validate({
			errorElement: "div",
			// Specify the validation rules
			rules: {
				username: {
					required: true,
					number: true,
					range: [201001001, 201499999]
				},
				password: {
					required: true,
					minlength: 5
				}
			},
			
			// Specify the validation error messages
			messages: {
				username: {
					required:'',
					maxlength: "Please enter a your DA-IICT ID.",
					minlength: "Please enter a your DA-IICT ID.",
					range: "Please enter a your DA-IICT ID."
				},
				password: {
					required:'',
					minlength: "Password must be at least 5 characters long."
				}
			},
			
			submitHandler: function(form) {
				form.submit();
			}
		});

	  });
	  
	  </script>
    </head>
    <body>
        <div id="box">
		<?php include 'header1.php'; ?>
            <div class="shopheading">
                BIG BITE
            </div>
			<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'bigbite/bigbite_logo.jpg');?>"></img>
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
		<div class="offerhead">What's cool today?</div>
            <div class="offers">
                <div class="imgslide">
                    <div id="slider">
                        <img src="<?php echo(IMG . 'bigbite/img1.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'bigbite/img2.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'bigbite/img3.jpg'); ?>"></img>
                    </div>
                </div>
            </div>
			<div class="menuhead"><i>Carte de menu..</i></div>
            <div class="shopproducts">
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/margherita.jpg'); ?>"></img>
                    <div class="itemname">
                        Margherita pizza
                    </div>
                    <div class="itemprice">
                        Rs.60(Small) Rs.90(Medium)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/simply_veg.jpg'); ?>"></img>
                    <div class="itemname">
                        Simply veg pizza
                    </div>
                    <div class="itemprice">
                        Rs.70(Small) Rs.100(Medium)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_tomato.jpg'); ?>"></img>
                    <div class="itemname">
                        Cheese tomato pizza
                    </div>
                    <div class="itemprice">
                        Rs.70(Small) Rs.100(Medium)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/american.jpg'); ?>"></img>
                    <div class="itemname">
                        American pizza
                    </div>
                    <div class="itemprice">
                        Rs.70(Small) Rs.100(Medium)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/italian.jpg'); ?>"></img>
                    <div class="itemname">
                        Italian pizza
                    </div>
                    <div class="itemprice">
                        Rs.70(Small) Rs.100(Medium)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/jain.jpg'); ?>"></img>
                    <div class="itemname">
                        Jain pizza
                    </div>
                    <div class="itemprice">
                        Rs.70(Small) Rs.100(Medium)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/special.jpg'); ?>"></img>
                    <div class="itemname">
                        Big Bite special pizza
                    </div>
                    <div class="itemprice">
                        Rs.80(Small) Rs.110(Medium)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/bread_pizza.jpg'); ?>"></img>
                    <div class="itemname">
                        Bread pizza
                    </div>
                    <div class="itemprice">
                        Rs.40
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/garlic_bread.jpg'); ?>"></img>
                    <div class="itemname">
                        Garlic bread
                    </div>
                    <div class="itemprice">
                        Rs.40(2 pcs)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/chilly_garlic_bread.jpg'); ?>"></img>
                    <div class="itemname">
                        Supreme chilly garlic bread
                    </div>
                    <div class="itemprice">
                        Rs.50(2 pcs)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veggie_long.jpg'); ?>"></img>
                    <div class="itemname">
                        Veggie long sandwich
                    </div>
                    <div class="itemprice">
                        Rs.60
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_long.jpg'); ?>"></img>
                    <div class="itemname">
                        Cheese long sandwich
                    </div>
                    <div class="itemprice">
                        Rs.70
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/paneer_long.jpg'); ?>"></img>
                    <div class="itemname">
                        Paneer chilli long sandwich
                    </div>
                    <div class="itemprice">
                        Rs.70
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/alu_tikki.jpg'); ?>"></img>
                    <div class="itemname">
                        Alu tikki burger
                    </div>
                    <div class="itemprice">
                        Rs.30
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veg_alu_tikki.jpeg'); ?>"></img>
                    <div class="itemname">
                        Veg alu tikki burger
                    </div>
                    <div class="itemprice">
                        Rs.35
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_burger.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg cheese burger
                    </div>
                    <div class="itemprice">
                        Rs.50
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/spicy_alu_tikki.jpg'); ?>"></img>
                    <div class="itemname">
                        Spicy alu tikki burger
                    </div>
                    <div class="itemprice">
                        Rs.35
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/spicy_cheese_burger.jpg'); ?>"></img>
                    <div class="itemname">
                        Spicy cheese burger
                    </div>
                    <div class="itemprice">
                        Rs.50
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/spicy_paneer_burger.jpg'); ?>"></img>
                    <div class="itemname">
                        Spicy paneer burger
                    </div>
                    <div class="itemprice">
                        Rs.50
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/french_fries.jpg'); ?>"></img>
                    <div class="itemname">
                        French fries
                    </div>
                    <div class="itemprice">
                        Rs.40
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veg_frankie.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg frankie
                    </div>
                    <div class="itemprice">
                        Rs.40
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_frankie.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg cheese frankie
                    </div>
                    <div class="itemprice">
                        Rs.50
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/paneer_frankie.jpg'); ?>"></img>
                    <div class="itemname">
                        Paneer frankie
                    </div>
                    <div class="itemprice">
                        Rs.50
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/sezwan_frankie.jpg'); ?>"></img>
                    <div class="itemname">
                        Sezwan frankie
                    </div>
                    <div class="itemprice">
                        Rs.50
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/sezwan_paneer_frankie.jpg'); ?>"></img>
                    <div class="itemname">
                        Sezwan paneer frankie
                    </div>
                    <div class="itemprice">
                        Rs.60
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/sezwan_cheese_frankie.jpg'); ?>"></img>
                    <div class="itemname">
                        Sezwan cheese frankie
                    </div>
                    <div class="itemprice">
                        Rs.60
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheesey_balls.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg cheesey ball
                    </div>
                    <div class="itemprice">
                        Rs.60
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/bread_butter.jpg'); ?>"></img>
                    <div class="itemname">
                        Bread butter
                    </div>
                    <div class="itemprice">
                        Rs.20(Reg) Rs.30(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_sandwich.jpg'); ?>"></img>
                    <div class="itemname">
                        Cheese sandwich
                    </div>
                    <div class="itemprice">
                        Rs.40(Reg) Rs.50(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veg_sandwich.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg sandwich
                    </div>
                    <div class="itemprice">
                        Rs.30(Reg) Rs.40(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veg_cheese_sandwich.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg cheese sandwich
                    </div>
                    <div class="itemprice">
                        Rs.50(Reg) Rs.60(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/alu_mutter.jpg'); ?>"></img>
                    <div class="itemname">
                        Alu mutter sandwich
                    </div>
                    <div class="itemprice">
                        Rs.30(Reg) Rs.40(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_alu_mutter.jpg'); ?>"></img>
                    <div class="itemname">
                        Alu mutter cheese
                    </div>
                    <div class="itemprice">
                        Rs.50(Reg) Rs.60(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veg_alu_mix.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg alu mix sandwich
                    </div>
                    <div class="itemprice">
                        Rs.40(Reg) Rs.50(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/jam.jpg'); ?>"></img>
                    <div class="itemname">
                        Jam sandwich
                    </div>
                    <div class="itemprice">
                        Rs.30(Reg) Rs.40(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_jam.jpg'); ?>"></img>
                    <div class="itemname">
                        Cheese jam sandwich
                    </div>
                    <div class="itemprice">
                        Rs.50(Reg) Rs.60(Grill)
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veg_club.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg club sandwich
                    </div>
                    <div class="itemprice">
                        Rs.70
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/mayonnaise_club.jpg'); ?>"></img>
                    <div class="itemname">
                        Mayonnaise club sandwich
                    </div>
                    <div class="itemprice">
                        Rs.70
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/paneer_club.jpg'); ?>"></img>
                    <div class="itemname">
                        Paneer roasty club sandwich
                    </div>
                    <div class="itemprice">
                        Rs.80
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_choco_NUTS.jpg'); ?>"></img>
                    <div class="itemname">
                        Cheese choco nuts club sandwich
                    </div>
                    <div class="itemprice">
                        Rs.80
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/maxican_club.jpg'); ?>"></img>
                    <div class="itemname">
                        Maxican club sandwich
                    </div>
                    <div class="itemprice">
                        Rs.80
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/veg_maggie.jpg'); ?>"></img>
                    <div class="itemname">
                        Veg Masala maggie
                    </div>
                    <div class="itemprice">
                        Rs.40
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/masala_pasta.jpg'); ?>"></img>
                    <div class="itemname">
                        Masala Pasta
                    </div>
                    <div class="itemprice">
                        Rs.50
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/sezwan_pasta.jpg'); ?>"></img>
                    <div class="itemname">
                        Sezwan Pasta
                    </div>
                    <div class="itemprice">
                        Rs.60
                    </div>
                </div>
                <div class="shopproductitem">
                    <img width="100%" src="<?php echo(IMG . 'bigbite/cheese_pasta.jpg'); ?>"></img>
                    <div class="itemname">
                        Cheese Pasta
                    </div>
                    <div class="itemprice">
                        Rs.70
                    </div>
                </div>
            </div>

        </div>
        
		<div id="feedback">Feedback</div>
                <?php include 'reglog.php'; ?>
    </body>
</html>
