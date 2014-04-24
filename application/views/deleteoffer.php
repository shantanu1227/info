<! As we click on the Delete offer button on the Shop keeper interface page, we get directed to this page. 
This page is for granting shopkeeper the rights to delete the offers which he would have added before and
he no more wants to. >
<!DOCTYPE html>
<html>
<head>
<script src="<?php echo (JS.'jquery-1.7.1.min.js');?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'Vinfostyle.css');?>">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Delete Offers</title>
<style>
body{
overflow-x: hidden;
}
</style>
<script>
$(document).ready(function(){
				$(".deleteoffer").click(function(){
				var offerid =$(this).parent().children('td').eq(1).text();
				$(".deleteofferconfirmpage").fadeIn(1000);
				$(".deleteyes").click(function(){
				$('#'+offerid).submit();
				});
				$(document).keyup(function(e) {
  if (e.keyCode == 27 ) {
	  $(".deleteofferconfirmpage").fadeOut(10);
					
   }			});
				$(".deleteno").click(function(){
				 $(".deleteofferconfirmpage").fadeOut(10);
				});
				});
				});
</script>				
</head>
<body>

<div class="offertable">
<table border="1" width="25%">
<tr>
<th> Offer Name </th>
<th> Offer ID </th>
<th> Option </th>

</tr>

 <?php foreach ($offers as $offer) {
	$attributes = array('id' => $offer->offerId);
	echo form_open('shop/removeoffer',$attributes);
	echo form_hidden('offerid',$offer->offerId);
	echo form_close();


   ?><tr> <td><?php echo $offer->offerName; ?> </td>
  		<td><?php echo $offer->offerId; ?> </td>
		<td class="deleteoffer">
		  Delete
		</td>
        		
		</tr> 
<?php } ?>
</table>
</div>
<div class="deleteofferconfirmpage">
<div class="confirmofferdeletehead"> Are you sure you want to delete this offer? </div>
<div class="deleteyesno">
<div class="deleteyes"> <b>YES</b> </div>
<div class="deleteno"> <b>NO</b> </div>
</div>
</div>
<div class="backbut">
<?php echo anchor('/welcome/skinterface', 'Go Back'); ?>
</div>
</body>
</html>