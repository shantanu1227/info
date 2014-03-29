
function updatecart(url) { 
    /*place jQuery actions here*/
    var link = "/info/"; // Url to your application (including index.php/)
	$(".shopproductitem form").submit(function() {
		 var id = $(this).find('input[name=product_id]').val();
        var qty = $(this).find('input[name=quantity]').val();
		var name = $(this).find('input[name=product_name]').val();
		var price = $(this).find('input[name=product_price]').val();
		
		
		$.post(link + "cart/addtocart", { product_id: id, quantity: qty, product_name: name , product_price: price, ajax: '1' },
            function(data){ 
                // Interact with returned data
					  window.location.assign(url)
         });
		 
			
        return false; // Stop the browser of loading the page defined in the form "action" parameter.
    });
}