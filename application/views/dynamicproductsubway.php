<div class="shopproducts">
		<?php
		foreach ($output as $product) {
		?>

			<div class="shopproductitem" id="<?php echo($product->productId); ?>">
				<img width="100%" src="<?php echo(IMG . $product->productImage); ?>"></img>
				<div class="itemname">
					<?php echo $product->productName; ?>
				</div>
				<div class="itemprice">
					<?php echo "Rs.".$product->price; ?>
				</div>
				<?php
		echo form_open('cart/addsubwaytocart'); ?>
		
		  
		  
				</div>
		<?php
		}
		?>	
			
		</div>
		
	