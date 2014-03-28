<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>My account</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'myaccountstyle.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
	<script>
				$(document).ready(function()
				{
					$("#uploadbutton").click(function()
					{
						$("#trans_table").fadeIn(1000);
						$("#box").css("opacity","0.2");
						$(document).keyup(function(e) 
						{
  						if (e.keyCode == 27 ) 
  							{
	  						$("#trans_table").fadeOut(10);
							$("#box").css('opacity',1);
   							}			
   						}); 
					}); 
				});
	    </script>
	<div id="box">
	<?php include 'header1.php'; ?>
	
	<div class="wrapper">
		<div class="deta">
			<div class="fullname"><?php echo $output->fullName;?></div>
			<div class="userinfo">
				<div class="data_name">
				Username
				</div>
				<div class="data">
					<?php echo $output->userName;?>
				</div>
			</div>		
			<div class="userinfo">
				<div class="data_name">
				Credits
				</div>
				<div class="data">
					#  <?php echo $output->creditAmount;?>
				</div>
			</div>
			<div class="userinfo">
				<div class="data_name">
				Mobile
				</div>
				<div class="data">
					<?php echo $output->mobileNo;?>
				</div>
			</div>
			
			<div class="userinfo">
				<div class="data_name">
				Email
				</div>
				<div class="data">
					<?php echo $output->email;?>
				</div>
			</div>
			<div class="userinfo">
				<div class="data_name">
				Address
				</div>
				<div class="data">
					<?php echo $output->address;?>	
				</div>
			</div>
		</div>
		<div >
		 <button id="uploadbutton" type="button">My Past Transactions</button>
		<div id="trans_table">
		<table><tr>
			  <th id="left">TransactionID</th>
			  <th>ProdcutID</th>		
			  <th>Quantity</th>
			  <th>price</th>
			  <th>Delivery Date</th>
			  </tr>
			
			<tr>
			  <td id="left">255421</td>
			  <td>12</td>		
			  <td>5</td>
			  <td>rs 10</td>
			  <td>2/2/2014</td>
			  </tr>
			  <tr>
			  <td id="left">255421</td>
			  <td>12</td>		
			  <td>5</td>
			  <td>rs 10</td>
			  <td>2/2/2014</td>
			  </tr>
			  <tr>
			  <td id="left">255421</td>
			  <td>12</td>		
			  <td>5</td>
			  <td>rs 10</td>
			  <td>2/2/2014</td>
			  </tr>
			  </table>
			</div>
		</div>
	</div>
	</div>
		
<!--<form action="/info/welcome/myaccountact" method="POST" >
username<input type="text" name="username" placeholder="enter username">

<input type="submit" value="submit">
</form>*/-->

	


</body>
</html>