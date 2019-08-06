$(document).ready(function(){
	var productIds = [];
	$(document).on("click", ".addtocart", function(){
		var productId = $(this).data('productid');
		if(productIds.indexOf(productId) < 0)
			productIds.push(productId);
		$.ajax({
			url: $(this).data('url'),
			data: {product_id: productId},
			success: function(responses){
				console.log('Ajax responses : ', responses);
				$('.listecart').text(responses['command_number']);
				console.log(responses['commands']);
				/*productIds.forEach(function(id){
					console.log(responses['commands'].28);
				});*/
			},
			error: function(responses, status, error){
				console.log("Error for adding command to cart with : ", error);
				console.log(responses);
			}
		})
	});





});