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
