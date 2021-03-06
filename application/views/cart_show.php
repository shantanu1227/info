
<?php if(!$this->cart->contents()){
    echo 'You don\'t have any items yet.';
}else{
?>
<html>
	<head>
		<title>My Cart</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'cartstyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'footerstyle.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'feedback.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'reglogcss.css');?>">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="<?php echo(CSS.'js-image-slider.css');?>" rel="stylesheet" type="text/css" />
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
		<script src="<?php echo(JS.'js-image-slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo (JS.'core.js');?>" type="text/javascript"></script>
	</head>
	
	<body>
		<script>
			$(document).ready(function(){
				$(".updatecartbut").click(function(){
					updatecartajax(location.href);
				});
			});
		</script>	
		<div id="box">
			<?php include 'header1.php'; ?>	
			<?php echo form_open('cart/updatecart'); ?>
			<table class="carttable" border="1px" width="100%" cellpadding="0" cellspacing="0">
				<tr >
					<th >Quantity</th>
					<th >Item Description</th>
					<th >Item Price</th>
					<th >Sub-Total</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach($this->cart->contents() as $items) { ?>
				<?php echo form_hidden('rowid[]', $items['rowid']); ?>
				<tr <?php if($i&1){ echo 'class="alt"'; }?> >
					<td>
						<?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
					</td>
					<td><?php echo $items['name']; ?></td>
					<td>Rs. <?php echo $this->cart->format_number($items['price']); ?></td>
					<td>Rs. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
				</tr>
				<?php $i++; ?>
				<?php } ?>
				<tr>
					<td></td>
					<td></td>
					<td><strong>Sub-Total</strong></td>
					<td>Rs. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td><strong>Service Charge</strong></td>
					<td>Rs. <?php echo $this->cart->format_number((TAX-1)*$this->cart->total());?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><strong>Total</strong></td>
					<td>Rs. <?php echo $this->cart->format_number((TAX)*$this->cart->total());?> </td>
				</tr>
			</table>
			<p class="updateempty">
				<div class="updatecartbut"><?php echo form_submit('', 'Update your Cart');?></div>
				<?php $attr1 = array('style'=>'display:block;');?>
				<div class="emptycartbut"> <?php echo anchor('cart/emptycart', 'Empty Cart', $attr1);?> </div>
			</p>
			<?php echo form_close();?>
			<?php echo form_open('/cart/checkout'); ?>
			<div id="slotselect">
			<?php 
				if(count($slots)>0){?>
			<select class="orderslots" name="slotId" >
			  <?php foreach ($slots as $slot) {?>
			  <option value="<?php echo $slot->deliverySlot ; ?>"><?php echo $slot->starttimings;?>-<?php echo $slot->endtimings;?></option>  
			  <?php
			  }?>
			</select>

			Select Order Slot
			<?php }?>
			</div>
			<?php 
				if(count($slots)>0){
			$submit = array(
					  'name'=> 'checkout',
					  'id'  => 'checkout',
					  'class' => 'checkoutbutton',
					  'value' => 'Checkout',
					  'type'  => 'submit'       
					);
			echo form_input($submit);
			echo form_close();

			}
		}
			?>
			<!--?php include ('footer.php');?-->
			</div>
		</div>
		<?php include ('reglog.php');?>
		<div id="feedback">Feedback</div>
		<?php include ('feedback.php');?>
	</body>
</html>