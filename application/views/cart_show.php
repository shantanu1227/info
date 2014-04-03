
<?php
if (!$this->cart->contents()) {
    echo 'You don\'t have any items yet.';
} else {
    ?>
    <html>
        <head>
            <title>My Cart</title>
            <link rel="stylesheet" type="text/css" href="<?php echo(CSS . 'Vinfostyle.css'); ?>">
            <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
            <link href="<?php echo(CSS . 'js-image-slider.css'); ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo(CSS . 'reglogcss.css'); ?>" rel="stylesheet" type="text/css" />
            <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
            <script src="<?php echo(JS . 'js-image-slider.js'); ?>" type="text/javascript"></script>
            <script src="<?php echo (JS . 'jquery-1.7.1.min.js'); ?>" type="text/javascript"></script>
            <script src="<?php echo (JS . 'core.js'); ?>" type="text/javascript"></script>
            <script type="text/javascript">

		function tab(tab) {
			document.getElementById('tab1').style.display = 'none';
			document.getElementById('tab2').style.display = 'none';
			document.getElementById('li_tab1').setAttribute('class', "");
			document.getElementById('li_tab2').setAttribute('class', "");
			document.getElementById(tab).style.display = 'block';
			//document.getElementById('li_'+tab).setAttribute("class", "active");
			document.getElementById('li_'+tab).setAttribute("font-color", "blue");
		}
		</script>
        </head>

        <body>
            <script>
                $(document).ready(function() {
                    $(".updatecartbut").click(function() {
                        updatecartajax(location.href);
                    });
                });
            </script>	
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
                    <?php foreach ($this->cart->contents() as $items) { ?>

        <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                        <tr <?php if ($i & 1) {
            echo 'class="alt"';
        } ?>>
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
                
                
                <div class="updateempty"> 
                <div class="updatecartbut"><?php echo form_submit('', 'Update your Cart'); ?></div> 
                <div class="emptycartbut"> <?php echo anchor('cart/emptycart', 'Empty Cart'); ?> </div> 
           
           <div class="chck">

           <?php echo anchor('cart/checkout', 'Checkout', array('class' => 'checkoutbutton')); ?>
                       
           </div>
                </div>

<div id="tabs">
			<ul>
				<li id="li_tab1" onclick="tab('tab1')"><a tabindex="1">Today</a></li>
				<li id="li_tab2" onclick="tab('tab2')"><a tabindex="1">Tomorrow</a></li>
			</ul>
			<div id="content_area">
				<div id="tab1" >
					<div class = "radio">
						
						<input id = "slot1_today" type="radio" name="slot" value="slot1_today">
						<label for = "slot1_today">8:00-10:00</label>						
						<input id = "slot2_today" type="radio" name="slot" value="slot2_today">
						<label for = "slot2_today">10:00-12:00</label>
						<input id = "slot3_today" type="radio" name="slot" value="slot3_today">
						<label for = "slot3_today">12:00-14:00</label>
						<input id = "slot4_today" type="radio" name="slot" value="slot4_today">
						<label for = "slot4_today">14:00-16:00</label>
						<input id = "slot5_today" type="radio" name="slot" value="slot5_today">
						<label for = "slot5_today">16:00-18:00</label>
						<input id = "slot6_today" type="radio" name="slot" value="slot6_today">
						<label for = "slot6_today">18:00-20:00</label>
					</div>
				</div>

				<div id="tab2" style="display:none"> 
					<div class = "radio">
						<input id = "slot1_tmr" type="radio" name="slot" value="slot1_tmr">
						<label for = "slot1_tmr">8:00-10:00</label>
						<input id = "slot2_tmr" type="radio" name="slot" value="slot2_tmr">
						<label for = "slot2_tmr">10:00-12:00</label>
						<input id = "slot3_tmr" type="radio" name="slot" value="slot3_tmr">
						<label for = "slot3_tmr">12:00-14:00</label>
						<input id = "slot4_tmr" type="radio" name="slot" value="slot4_tmr">
						<label for = "slot4_tmr">14:00-16:00</label>
						<input id = "slot5_tmr" type="radio" name="slot" value="slot5_tmr">
						<label for = "slot5_tmr">16:00-18:00</label>
						<input id = "slot6_tmr" type="radio" name="slot" value="slot6_tmr">
						<label for = "slot6_tmr">18:00-20:00</label>
					</div>
				</div>
			</div> 
		</div>
                
           <!-- <select class="orderslots" name="slotid" >
                <option value="1">8:00-10:00</option>
                <option value="2">10:00-12:00</option>
                <option value="3">12:00-14:00</option>
                <option value="4">14:00-16:00</option>
                <option value="5">16:00-18:00</option>
                <option value="5">18:00-20:00</option>
                <option value="5">20:00-22:00</option>

            </select>-->
                
           <?php  } ?>
            </div>
</body>