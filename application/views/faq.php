<!--
        Document: faq 
        Purpose: Page containing frequently asked questions related to Virtual Infocity 
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>FAQ</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel='stylesheet' type="text/css" href="<?php echo(CSS . 'faqstyle.css'); ?>">
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
    <script >
    $(document).ready(function(){
                
                

    $('.ques').click(function() { 
        $('.ans').css("display","none")
        var varid=$(this).parent().attr("id");

        
    $('#'+varid).children('.ans').css("display","block");
                                });
    });
                
    </script>
        <div id="box">
<?php include 'header1.php'; ?>
            <div class="shopheading">
                Frequently Asked Questions
            </div>
            <div class="faq">
            <div id ="quesans1">
                <div class="ques">What can I do if a product is not available?</div>
                <div class="ans"> * Incase if the product is not available, then we suggest certain shops in 
                    the near by area that might have that product. Besides, the customer can ask to be notified when that 
                    product becomes available.</div>
            </div>
            <div id="quesans2">
                <div class="ques">Where will my orders be delivered?</div>
                <div class="ans"> *The customer needs to collect his orders from the main gate of DA-IICT by the delivery person.</div>
            </div>
            <div id="quesans3">
                <div class="ques" >What is the mode of payment?</div>
                <div class="ans"> *It is a credit based payment system in which the credit is deducted when 
                    the product has been purchased and sent for delivery. If the product is sold out or
                    in case the customer cancels the order within the allowed time, then the credit will not be deducted.</div>
            </div>
            <div id="quesans4">
                <div class="ques" >Till when can I cancel my order?</div>
                <div class="ans"> *The order can be canceled one hour prior to the slot in which it has 
                    been ordered. For example, if the customer has ordered for delivery at 3 pm, he can 
                    cancel the order before 2 pm. If canceled after 2 pm there will be no refund.</div>
            </div>
            <div id="quesans5">    
                <div class="ques" >What are the benefits when I create an account?</div>
                <div class="ans"> *When you create an account with VirtualInfocity, you get three free deliveries. For 
                    the first three times that you order, you do not have to pay for any delivery charges.
                    Holding an account will make shopping from Infocity economical and time saving. Also, loyal customers 
                    are entitled to certain privileges.</div>
           </div>
           <div id="quesans6">
                <div class="ques" >What are my privileges?</div>
                <div class="ans">*We provide our loyal customers with extra credit for a purchase of above 
                    Rs. 1000 in that month.</div>
            </div>
            </div>
        </div>
		<div id="feedback">Feedback</div>
		<?php include 'feedback.php'; ?>
                <?php include 'reglog.php'; ?>
    </body>
</html>