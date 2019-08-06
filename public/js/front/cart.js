$(document).ready(function(){
	var productIds = [];
	$(document).on("click", ".addtocart", function(){
		var productId = $(this).data('productid');
		if(productIds.indexOf(productId) < 0)
			productIds.push(productId);

		console.log('Product ids commanded : ', productIds);
		$.ajax({
			url: $(this).data('url'),
			data: {product_id: productId, product_ids: productIds},
			success: function(commands){
				console.log('All commands : ', commands);
				$('.command_number').text(commands.length);
				/*commands.forEach(function(command){
					var commandHTML = '<li class="header-cart-item">\
											<div class="header-cart-item-img">\
												<img src="#" alt="IMG">\
											</div>\
											<div class="header-cart-item-txt">\
												<a href="#" class="header-cart-item-name">\
													'+command.name+'\
												</a>\
												<span class="header-cart-item-info">\
													'+command.price+'\
												</span>\
											</div>\
										</li>'
					$('.command_list').append(commandHTML);

				});*/
			},
			error: function(responses, status, error){
				console.log("Error for adding command to cart with : ", error);
				console.log(responses);
			}
		})
	});
<<<<<<< HEAD





=======
>>>>>>> 1db5ebf9d2ce3c4305b353032d83182c1992bd7a
});