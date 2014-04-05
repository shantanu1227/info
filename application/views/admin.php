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
	<div id="mainbox1">
		<div id="wrapper">
			<div id="box1">

				<div class="container">
					<div class="heading">BAN USER ACCOUNT</div>
					<?php $attributes = array('id' => 'deleteuserform');
					echo form_open('admin/banAccount',$attributes);
					?>
					<div class="forminput"><input type="text" name="username" placeholder="Username e.g. '201101098'"><br></div>
					<input type="submit" value="BAN User"/>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<div id="wrapper">
			<div id="box2">

				<div class="container">
					<div class="heading">RECHARGE USER ACCOUNT</div>
					<?php $attributes = array('id' => 'rechargeform');
					echo form_open('admin/rechargeAccount', $attributes);
					?>
					<div class="forminput"><input type="text" name="username" placeholder="Username e.g. '201101098'"><br></div>
					<div class="forminput"><input type="text" name="recamount" placeholder="Recharge Amount"><br></div>
					<input type="submit" value="Recharge" />
					<?php echo form_close();?>
				</div>
			</div>
		</div>
		<div id="wrapper">
			<div id="box3">

				<div class="container">
					<div class="heading">DEDUCT FROM USER ACCOUNT</div>
					<?php $attributes = array('id' => 'deductform');
					echo form_open('', $attributes);
					?>
					<div class="forminput"><input type="text" name="username" placeholder="Username e.g. '201101098'"><br></div>
					<div class="forminput"><input type="text" name="deductamount" placeholder="Amount to deduct"><br></div>
					<input type="submit" value="Deduct Amount" />
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>

	<div id="mainbox3">
		<div id="wrapper">
			<div id="box4">

				<div class="container">
					<div class="heading">UPDATE THALI</div>
					<?php $attributes = array('id' => 'thaliform');
					echo form_open('admin/updateThali', $attributes);
					?>
					<div class="forminput"><input type="text" name="lunch" placeholder="Lunch Menu"><br></div>
					<div class="forminput"><input type="text" name="dinner" placeholder="Dinner Menu"><br></div>
					<div>Select Shop
						<select name="shopId">
							<?php foreach ($thalis as $thali) {?>
							<option value="<?php echo $thali->shopId ; ?>"><?php echo $thali->name;?></option>  
							<?php
						}?>
					</select></div>
					<div class="thalisubmit">
					<input type="submit" value="Submit Menu" />
					</div>
					<?php echo form_close();?>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>