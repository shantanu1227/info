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
                <div class="ques">What is Virtual Infocity ?</div>
                <div class="ans"> * Virtual Infocity will help the DA-IICT's students to buy the things from the Infocity's shops.
                 They will just have to select the things and place the order.</div>
            </div>
            <div id ="quesans2">
                <div class="ques">Who will use Virtual Infocity ?</div>
                <div class="ans"> * Currently, only DA-IICT's students can use Virtual Infocity. 
                    But, we are planning to scale the project up in near future.</div>
            </div>
                
            <div id="quesans3">
                <div class="ques">Where will my orders be delivered?</div>
                <div class="ans"> *The customer needs to collect his orders from the main gate of DA-IICT by the delivery person.</div>
            </div>
            <div id="quesans4">
                <div class="ques" >What is the mode of payment?</div>
                <div class="ans"> *It is a credit based payment system in which the credit is deducted when 
                    the product has been purchased and sent for delivery. If the product is sold out or
                    in case the customer cancels the order within the allowed time, then the credit will not be deducted.</div>
            </div>
            <div id="quesans5">
                <div class="ques" >Till when can I cancel my order?</div>
                <div class="ans"> *According to our current policy, the order can be canceled before the time of the half of the duration of that perticular slot in which it has 
                    been ordered. For example, if the customer has ordered for delivery in the slot of 2 PM to 4 PM, he can 
                    cancel the order before 3 PM. If canceled after 3 PM, there will be no refund.</div>
            </div>
            <div id="quesans6">    
                <div class="ques" >What are the benefits when I create an account?</div>
                <div class="ans"> *As per our analysis, the students of DA-IICT will end up paying less 
                    if they choose Virtual Infocity to buy the things as it will not include the extra overhead of travelling etc. 
                    We are also planning to have some exciting offers for our loyal cutomers!</div>
           </div>
            <div id="quesans7">
                <div class="ques" >What is the extra amount that I will endup paying if I place any order? </div>
                <div class="ans">*You will have to pay  15% extra amount of the total amount. For example, if you buy a burger of 30 Rs. ,you </div>
            </div>
           <div id="quesans8">
                <div class="ques" >What should I do when I have any errorneous transaction? </div>
                <div class="ans">*You are supposed to contact admin as soon as possible. 
                    You can reach to him on virtualinfocity@gmail.com</div>
            </div>
            </div>
        </div>
		<div id="feedback">Feedback</div>
		<?php include 'feedback.php'; ?>
                <?php include 'reglog.php'; ?>
    </body>
</html>