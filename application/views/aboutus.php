<!--
        Document: aboutus
        Purpose: Page containing information related to Virtual Infocity 
    -->
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
        <title>About Us</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel='stylesheet' type="text/css" href="<?php echo(CSS . 'aboutusstyle.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
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
    <div id="box">
        <?php include 'header1.php'; ?>
        <div class="shopheading">
            About Us
        </div>
        <div class="about">

            <p>Vinfocity.com is the first of its kind e-commerce portal for students at DA-IICT to order things from Infocity. It provides the students at DA-IICT a hassle free and enjoyable shopping experience also saving a lot of their time. Shopping at VirtualInfocity.com is an economical alternative because it saves transportation cost, and it also saves time.</p>
            <p>Vinfocity.com provides all products which are needed in the day-to-day life of every student. The student can order from a wide variety of products ranging from a pen to a shampoo to a Sub sandwhich. By providing time slots we are providing students the flexibility to decide the time when they want to get their product delivered. You can even place your order in the evening and get it delivered next day morning.</p> 
            <p>We understand the students' needs and cater to them by providing them information about stationery, medicines, provision stores, food and much more. The shops included are Big Bite, Chatkazz, Kavya, Koffee++, Laundromart, Omega, Oxford, Qwiches and Subway among some others.</p>
        </div>
    </div>
    <div id="feedback">Feedback</div>
    <?php include 'feedback.php'; ?>
    <?php include 'reglog.php'; ?>
</body>
</html>
