<!--
        Document: bigbite
        Purpose: Page containing product list of Shop: Big Bite for the project: Virtual Infocity 
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Big Bite</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel='stylesheet' type="text/css" href="<?php echo(CSS . 'bigbitestyle.css'); ?>">
<<<<<<< HEAD
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS . 'reglogcss.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS . 'commonstyle.css'); ?>">
=======
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
>>>>>>> feb341b5e49b7cca941d85824a036864275639ef
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS . 'js-image-slider.css'); ?>">
        <script type='text/javascript' src="<?php echo(JS . 'js-image-slider.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo(JS . 'jquery-1.7.1.min.js'); ?>"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script src="<?php echo (JS . 'core.js'); ?>" type="text/javascript"></script>
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
                            required: '',
                            maxlength: "Please enter a your DA-IICT ID.",
                            minlength: "Please enter a your DA-IICT ID.",
                            range: "Please enter a your DA-IICT ID."
                        },
                        password: {
                            required: '',
                            minlength: "Password must be at least 5 characters long."
                        },
                        roomno: {
                            required: '',
                            regex: "Please enter a valid roomno."
                        },
                        mobileno: {
                            required: '',
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
                            required: '',
                            maxlength: "Please enter a your DA-IICT ID.",
                            minlength: "Please enter a your DA-IICT ID.",
                            range: "Please enter a your DA-IICT ID."
                        },
                        password: {
                            required: '',
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
        <script>
            $(document).ready(function() {
                $(".reloadonadd").click(function() {
                    updatecart(location.href);
                });
            });
        </script>	
        <div id="box">
            <?php include 'header1.php'; ?>
            <div class="shopheading">
                BIG BITE
            </div>
            <div class="shopdetail">
                <div class="shoppic">
                    <img src="<?php echo(IMG . 'bigbite/bigbite_logo.jpg'); ?>"></img>
                </div>
                <?php foreach ($outputTimings as $tuple) { ?>

                    <div class="details">
                        <div class="timing"> <?php echo $tuple->openingTime . " - " . $tuple->closingTime; ?> </div>
                        <div class="dayswrap">
                            <div class="days">
                                <ul>
                                    <?php if ($tuple->holidays == "OPEN") { ?>
                                        <li>Su</li>
                                    <?php } ?>

<<<<<<< HEAD
                                    <li>Mo</li>
                                    <li>Tu</li>
                                    <li>We</li>
                                    <li>Th</li>
                                    <li>Fr</li>	
                                    <li>Sa</li>
                                </ul>
                            </div>
                        </div>
                        <div class="status">
                            <?php if ($tuple->currentStatus == "OPEN") { ?>
                                <img src="<?php echo(IMG . 'open_button.png'); ?>"></img>
                            <?php } else {
                                ?>
                                <img src="<?php echo(IMG . 'close_button.png'); ?>"></img>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="contact">
                        <div class="owner">Owner</div>
                        <div class="ownername">Mr.Sahil</div>
                        <div class="ownernum">8460089916</div>
                    </div>
                </div>
            </div>
            <div class="offerhead">What's cool today?</div>
=======
				<div class="contact">
					<div class="owner">Contact Number</div>
					<?php foreach ($outputNumber as $val) { ?>
					<div class="ownernum"> <?php echo $val->contactNo ?> </div>
					<?php } ?>
				</div>
				
			</div>
		</div>
		<div class="offerhead">What's cool today?</div>
>>>>>>> ae2b8880b1c611976c97dfed01d7509224f3f152
            <div class="offers">
                <div class="imgslide">
                    <div id="slider">
                        <img src="<?php echo(IMG . 'bigbite/img1.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'bigbite/img2.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'bigbite/img3.jpg'); ?>"></img>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
            <div class="menuhead"><i>Carte de menu..</i></div>
            <?php include 'dynamicproduct.php'; ?>	
            <?php include 'reglog.php'; ?>

=======
			<div class="menuhead"><i>Carte de menu..</i></div>
				<?php include 'dynamicproduct.php'; ?>	
                <?php include 'reglog.php'; ?>
				</div>
				<div id="feedback">Feedback</div>
		<?php include 'feedback.php'; ?>
				
>>>>>>> feb341b5e49b7cca941d85824a036864275639ef
    </body>
</html>
