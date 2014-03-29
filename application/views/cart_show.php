
<?php if(!$this->cart->contents()){
    echo 'You don\'t have any items yet.';
}else{
?>
<html>
	<head>
		<title>My Cart</title>
		<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
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
<?php echo form_open('cart/updatecart'); ?>
<table class="carttable" border="1px" width="100%" cellpadding="0" cellspacing="0">
    
        <tr >
            <th >Qty</td>
            <th >Item Description</td>
            <th >Item Price</td>
            <th >Sub-Total</td>
        </tr>
    
    
        <?php $i = 1; ?>
        <?php foreach($this->cart->contents() as $items) { ?>
         
        <?php echo form_hidden('rowid[]', $items['rowid']); ?>
        <tr <?php if($i&1){ echo 'class="alt"'; }?>>
            <td>
                <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
            </td>
             
            <td><?php echo $items['name']; ?></td>
             
            <td>Rs <?php echo $this->cart->format_number($items['price']); ?></td>
            <td>Rs <?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>
         
        <?php $i++; ?>
        <?php } ?>
         
        <tr>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td>Rs <?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>
    
</table>
 
<p class="updateempty"> <div class="updatecartbut"><?php echo form_submit('cart/updatecart', 'Update your Cart');?></div> <div class="emptycartbut"> <?php echo anchor('cart/emptycart', 'Empty Cart');?> </div> </p>

<?php } ?>

</div>
</body>