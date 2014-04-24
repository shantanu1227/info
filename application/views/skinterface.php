<! Skinterface.php is the view of the shop keeper interface.
The view loads the details of the shop dynamically and grants the shop owner to 
make changes in what shop provides like adding,changing and deleting products,
changing and deleting offers etc. This page cannot be accessed by anyone accept
 the shopkeeper of the particular shop as it cannot be accessed without logging in
 through the shop ID which only shopkeeper has to know.>
<!DOCTYPE html>
<html>
<head>
<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Shopkeeper Interface</title>
<style>
body{
overflow-x: hidden;
}
</style>
</head>
<body>
<script>
				$(document).ready(function(){
				$(".addproduct").click(function(){
				$(".addproductform").fadeIn(1000);
				
								$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $(".addproductform").fadeOut(10);
					
   }			}); 
				}); 
				});
				$(document).ready(function(){
				$(".addofferbut").click(function(){
				$(".addoffertohome").fadeIn(1000);
				
								$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $(".addoffertohome").fadeOut(10);
					
   }			}); 
				}); 
				});
				$(document).ready(function(){
				$(".changestatusbut").click(function(){
				$(".changestatusform").fadeIn(1000);
				
								$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $(".changestatusform").fadeOut(10);
					
   }			}); 
				}); 
				});
				
				$(document).ready(function(){
				$(".editproduct").click(function(){
				$(".editproductform").fadeIn(1000);
				var productid = $(this).parent().children('td').eq(1).text();
				var productname = $(this).parent().children('td').eq(0).text();
				var productprice = $(this).parent().children('td').eq(2).text();
				var productimage = $(this).parent().children('td').eq(6).text();
				var productinstock = $(this).parent().children('td').eq(3).text().trim();
				document.getElementById("productname").value = productname;
				document.getElementById("productprice").value = productprice;
				document.getElementById("productimage").filename = productimage;
				
				if(productinstock == "TRUE"){
				$( "#productradioyes" ).prop( "checked", true );}
				if(productinstock == "FALSE"){
				$( "#productradiono" ).prop( "checked", true ); }
				$("#productid").val(productid);
				
				
								$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $(".editproductform").fadeOut(10);
					
   }			}); 
				}); 
				});
				
				$(document).ready(function(){
				$("#askimagechange").click(function(){
				$("#yesimagechange").fadeIn(10);
				$("#changeimage").val("true");
				$("#askimagechange").fadeOut(10);
				$("#changeimage").attr( "required",tr);
				}); 
				});
	    </script>
<div class="shophead"> <?php echo $this->session->userdata('name');?> 
<div class="sklogout"><?php echo anchor('/shop/logout', 'Logout');?> </div>
</div>
<div class="producttable">
<table border="1" width="25%">
<tr>
<th> Name </th>
<th> ID </th>
<th> Price </th>
<th> In Stock </th>
<th>  Option </th>
<th class="getimagelink"> ... </th>
</tr>

 <?php foreach ($products as $product) {
	

   ?><tr> <td><?php echo $product->productName; ?> </td>
  		<td><?php echo $product->productId; ?> </td>
        <td><?php echo $product->price;?> </td>
		<td><?php echo $product->inStock;?> </td>
		<td class="editproduct">
		  Edit
		</td>
		<td class="getimagelink"><?php echo $product->productImage;} ?> </td>
		</tr> 

</table>
</div>
<div class="addproduct">
Add a product
</div>
<div class="addofferbut">
Add an Offer
</div>
<div class="deleteofferbut">
<?php echo anchor('/welcome/deleteoffer', 'Delete an Offer'); ?>
</div>
<div class="changestatusbut">
Change Shop Status
</div>
<div class="addproductform">
<?php echo form_open_multipart('shop/addProducts/');?>

<div class="productinput"><input type="text" name="productname" placeholder="Product name"><br></div>
<div class="productinput"><input type="text" name="productprice" placeholder="Product price"><br></div>
<div class="productinput"><input type="file" name="userfile" placeholder="Product image"><br></div>
<div><?php echo form_submit('', 'Add Product');?></div>
</form>
</div>

<div class="editproductform">
<?php echo form_open_multipart('shop/editProducts/');?>
<div class="productinput" id="askimagechange"> Change Image </div>
<div class="productinput" id="yesimagechange"><input type="file" name="userfile" placeholder="Product image" id="productimage"><br></div>
<div class="productinput"><input type="text" name="editedproductname" placeholder="Product name" id="productname"><br></div>
<div class="productinput"><input type="text" name="editedproductprice" placeholder="Product price" id="productprice"><br></div>

<div class="productinput"><input type="radio" name="stock" value="TRUE" id="productradioyes" >In-Stock<br></div>
<div class="productinput"><input type="radio" name="stock" value="FALSE" id="productradiono" >Out-of-Stock<br></div>
<input type="hidden" id="changeimage" name = "changeimage" value="false">
<input type="hidden" name="productid" id="productid" value="">
<div><?php echo form_submit('', 'Update Product');?></div>
</form>
</div>
<div class="addoffertohome">
<?php echo form_open_multipart('shop/addOffers/');?>

<div class="productinput"><input type="text" name="offername" placeholder="Offer name"><br></div>

<div class="productinput"><input type="file" name="userfile" placeholder="Offer image"><br></div>
<div><?php echo form_submit('', 'Update this Offer');?></div>
</form>
</div>

<div class="changestatusform">
<?php echo form_open_multipart('shop/changeStatus/');?>
<div class="productinput"><input type="radio" name="status" value="OPEN" checked="checked">OPEN<br></div>
<div class="productinput"><input type="radio" name="status" value="CLOSE">CLOSE<br></div>

<div><?php echo form_submit('', 'Update Status');?></div>
</form>
</div>

</body>