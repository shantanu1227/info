<html>
<head>
<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Shopkeeper Interface</title>
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
	    </script>
<div class="shophead"> KAVYA </div>
<div class="producttable">
<table border="1" width="25%">
<tr>
<th> Name </th>
<th> ID </th>
<th> Price </th>
<th> Tick </th>
</tr>

 <?php foreach ($output as $product) {
	

   ?><tr> <td><?php echo $product->productName; ?> </td>
  		<td><?php echo $product->productId; ?> </td>
        <td><?php echo $product->price;?> </td>
   		<td>
		<input type="checkbox" name="" value=""> 
		</td>
		</tr> 
<?php } ?>
</table>
</div>
<div class="addproduct">
Add a product
</div>
<div class="addproductform">
<?php echo form_open_multipart('upload/do_upload');?>

<div class="productinput"><input type="text" name="productname" placeholder="Product name"><br></div>
<div class="productinput"><input type="text" name="productprice" placeholder="Product price"><br></div>
<div class="productinput"><input type="file" name="userfile" placeholder="Product image"><br></div>
<input type="submit" value="Add" />
</form>
</div>

</body>