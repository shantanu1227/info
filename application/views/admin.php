<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'adminstyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	</head>
	<body>
		<div id="cname">Vinfocity</div>
		<div id="box">
			<div id="recwrapper">
				<div class="container">
					<div class="rechargehead">RECHARGE USER ACCOUNT</div>
					<?php $attributes = array('id' => 'rechargeform');
					echo form_open('recharge/user', $attributes);
					?>
						<div class="forminput"><input type="text" name="adminID" placeholder="Admin ID"><br></div>
						<div class="forminput"><input type="password" name="password" placeholder="Password"><br></div>
						<div class="forminput"><input type="text" name="username" placeholder="Username e.g. '201101098'"><br></div>
						<div class="forminput"><input type="text" name="recamount" placeholder="Recharge Amount"><br></div>
						<input type="submit" value="Recharge!" />
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</body>
</html>