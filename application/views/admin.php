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
                            <div class="heading">DELETE USER ACCOUNT</div>
                            <?php $attributes = array('id' => 'deleteuserform');
                            echo form_open('',$attributes);
                            ?>
                            
                                           
                                                <input type="submit" value="Delete User"/>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
				<div id="wrapper">
                <div id="box2">
			
				<div class="container">
					<div class="heading">RECHARGE USER ACCOUNT</div>
					<?php $attributes = array('id' => 'rechargeform');
					echo form_open('', $attributes);
					?>
						
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
					<div class="heading">DELIVERY-MAN PASSWORD</div>
					<?php $attributes = array('id' => 'passwordform');
					echo form_open('', $attributes);
					?>
						
						<div class="forminput"><input type="text" name="newpwd" placeholder="New Password"><br></div>
						<input type="submit" value="Change Password" />
					<?php echo form_close();?>
				</div>
			</div>
		</div>
		<div id="wrapper">
		 <div id="box5">
			
				<div class="container">
					<div class="heading">UPDATE THALI</div>
					<?php $attributes = array('id' => 'passwordform');
					echo form_open('', $attributes);
					?>
						<div class="forminput1"><input type="radio" name="lunchordinner">LUNCH<br></div>
						<div class="forminput1"><input type="radio" name="lunchordinner">DINNER<br></div>
						<div class="forminput"><input type="text" name="menu" placeholder="Enter Menu"><br></div>
						<input type="submit" value="Submit Menu" />
					<?php echo form_close();?>
				</div>
			</div>
		</div>
            </div>
	</body>
</html>