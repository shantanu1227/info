<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Kavya</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'kavyastyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo(CSS.'reglogcss.css');?>" rel="stylesheet" type="text/css" />
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'core.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	<div id="box">
		<?php include 'header1.php'; ?>

	<div id="wrap">
 
     <?php print_r($content); ?> 
     
    <div class="cart_list">
        <h3>Your shopping cart</h3>
        <div id="cart_content">
            <?php echo $this->view('welcome/cart'); ?>
        </div>
    </div>
	</div>
	
	</div>
	</body>