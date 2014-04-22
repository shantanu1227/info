<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>My account</title>
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'myaccountstyle.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'commonstyle.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php
	echo(CSS.'footerstyle.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php
	echo(CSS.'feedback.css');?>">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
	<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
	<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
	<script>
		$(document).ready(function()
		{
			$("#transbutton").click(function()
			{
				$("#pasttrans").fadeIn(1000);
				$("#box").css("visibility","hidden");
				$("#feedback").css("visibility","hidden");
				$(document).keyup(function(e) 
				{
					if (e.keyCode == 27 ) 
					{
						$("#pasttrans").fadeOut(500);
						$("#box").css("visibility","visible");
						$("#feedback").css("visibility","visible");
					}			
				}); 
			}); 

		});
	</script>		
</head>
<body>
	<div id="box">
		<?php include 'header1.php'; ?>
		<div class="wrapper">
			<div class="deta">
				<div class="fullname"><?php echo 'Welcome '.$output->fullName.'!';?></div>
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
						Rs.  <?php echo $output->creditAmount;?>
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
				<?php if(count($transactions)>0){?>
				<button id="transbutton" type="">My Past Transactions</button>
				<?php }?>
			</div>
		</div>
		<?php include 'footer.php';?>
	</div>
	<div id="feedback">Feedback</div>
	<?php include 'feedback.php';?>
</div>
<div id="pasttrans">
	<div id="trans_table">
		<table>
			<tr>
				<th id="left">TransactionID</th>
				<th>ProductID</th>		
				<th>Quantity</th>
				<th>Price</th>
				<th>Cancel</th>
			</tr>
			<?php foreach ($transactions as $transaction) {?>	
			<tr>
				<td id="left"><?php echo $transaction->transactionId;?></td>
				<td><?php echo $transaction->productName;?></td>		
				<td><?php echo $transaction->quantity;?></td>
				<td><?php echo $transaction->price;?></td>
				<td><?php
					if($transaction->cancelled  == 'false'){
						if(!($transaction->purchased == 'true' || $transaction->delivered == 'true')){
						$hidden = array('transactionId' =>$transaction->transactionId);
						echo form_open('cart/deletetransaction','',$hidden);
						echo form_submit('deletetransaction', 'Cancel Transaction');
						echo form_close();
						}else{
							if($transaction->delivered == 'false')
								echo "Pending";
							else
								echo "Delivered";
						}
					}else{
						echo "Cancelled";
					}
					?></td>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>
</body>
</html>