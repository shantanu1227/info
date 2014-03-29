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
	</div>
	<div id="feedback">Feedback</div>
<div id="reglogopen">
	<div class="vinfologin">
		<div class="reglogleft">
			<div class="loginhead">LOGIN</div>
			<?php $attributes = array('id' => 'loginform');
			echo form_open('login/index', $attributes);
			?>
				<div class="forminput"><input type="text" name="username" placeholder="e.g. '201101098'"><br></div>
				<div class="forminput"><input type="password" name="password" placeholder="Password"><br></div>
				<input type="submit" value="Login" />
			<?php echo form_close();?>
		</div>
	</div>
	<div class="reglogline">
	x
	</div>
	<div class="vinforegister">
		<div class="reglogright">
			<div class="registerhead">REGISTER</div>
			<?php $attributes = array('id' => 'registerform');
			echo form_open('register/newuser', $attributes);
			?>
				<div class="forminput"><input type="text" name="username" placeholder="e.g. '201101098'"><br></div>
				<div class="forminput"><input type="text" name="fullname" placeholder="Full Name"><br></div>
				<div class="forminput"><input type="password" name="password" placeholder="Password"><br></div>
				<div class="forminput"><input type="text" name="roomno" placeholder="e.g. 'B-108'"><br></div>
				<div class="forminput"><input type="text" name="mobileno" placeholder="Mobile Number"><br></div>
				<input type="submit" value="Register" />
			<?php echo form_close();?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(".reglog").click(function(){
			$("#reglogopen").fadeIn(1000);
			$("#box").css("opacity","0.2");
			$(document).keyup(function(e) {
				if (e.keyCode == 27 ) {
					$("#reglogopen").fadeOut(10);
					$("#box").css('opacity',1);
				}		
			}); 
		}); 
	});
</script>
		