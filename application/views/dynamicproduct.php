<div class="shopproducts">
		<?php
		foreach ($output as $product) {
		?>

			<div class="shopproductitem">
				<img width="100%" src="<?php echo(IMG . $product->productImage); ?>"></img>
				<div class="itemname">
					<?php echo $product->productName; ?>
				</div>
				<div class="itemprice">
					<?php echo "Rs.".$product->price; ?>
				</div>
				<?php
		echo form_open('cart/addtocart'); ?>
		<div class="quantborder">
		<div class="quantityask"><label> Quantity: </label>
		 <?php
		 echo form_input('quantity', '1', 'maxlength="2"');?> </div>
		  <?php
		  echo form_hidden('product_id', $product->productId);
		  echo form_hidden('product_name', $product->productName);
		  echo form_hidden('product_price', $product->price);
		    ?> <div class="reloadonadd"> <?php echo form_submit('add', 'Add'); ?> </div> <?php
				
		  echo form_close(); ?>
			</div>
				</div>
		<?php
		}
		?>	
			
		</div>
		<script type="text/javascript">  
	$(document).ready(function(){  
		$('.shopproductitem').mouseover(function() {  
			$(this).css("border","2px solid #4A2A1A");  
		});  
		$('.shopproductitem').mouseout(function() {  
			$(this).css("border","2px solid #FFFFFF");  
		});  
	});  
</script>  
	