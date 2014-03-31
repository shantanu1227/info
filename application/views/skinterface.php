<html>
<head>
<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Kavya - Shopkeeper Interface</title>
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
				$(".editproduct").click(function(){
				$(".editproductform").fadeIn(1000);
				var productid = $(this).parent().children('td').eq(1).text();
				var productname = $(this).parent().children('td').eq(0).text();
				var productprice = $(this).parent().children('td').eq(2).text();
				document.getElementById("productname").value = productname;
				document.getElementById("productprice").value = productprice;
				$("#productid").val(productid);
				
				
								$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $(".editproductform").fadeOut(10);
					
   }			}); 
				}); 
				});
	    </script>
<div class="shophead"> KAVYA </div>
<div class="producttable">
<table border="1" width="25%">
<tr>
<th> Name </th>
<th> ID </th>
<th> Price </th>
<th> Tick </th>
<th>  ..  </th>
</tr>

 <?php foreach ($output as $product) {
	

   ?><tr> <td><?php echo $product->productName; ?> </td>
  		<td><?php echo $product->productId; ?> </td>
        <td><?php echo $product->price;?> </td>
   		<td>
		<input type="checkbox" name="" value=""> 
		</td>
		<td class="editproduct">
		  Edit
		</td>
		</tr> 
<?php } ?>
</table>
</div>
<div class="addproduct">
Add a product
</div>
<div class="addproductform">
<?php echo form_open_multipart('shop/addProducts/');?>

<div class="productinput"><input type="text" name="productname" placeholder="Product name"><br></div>
<div class="productinput"><input type="text" name="productprice" placeholder="Product price"><br></div>
<div class="productinput"><input type="file" name="userfile" placeholder="Product image"><br></div>
<div><?php echo form_submit('', 'Update your Cart');?></div>
</form>
</div>

<div class="editproductform">
<?php echo form_open_multipart('shop/editProducts/');?>

<div class="productinput"><input type="text" name="editedproductname" placeholder="Product name" id="productname"><br></div>
<div class="productinput"><input type="text" name="editedproductprice" placeholder="Product price" id="productprice"><br></div>
<div class="productinput"><input type="file" name="userfile" placeholder="Product image" id="productimage"><br></div>
<input type="hidden" name="productid" id="productid" value="">
<div><?php echo form_submit('', 'Update Product');?></div>
</form>
</div>

</body>