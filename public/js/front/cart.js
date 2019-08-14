$(document).ready(function(){
	var productIds = [];
	var productPics = [];
	$(document).on("click", ".addtocart", function(){
		var productId = $(this).data('productid');
		var productPic = $(this).parents().eq(2).find('img').attr('src');
		if(productIds.indexOf(productId) < 0){
			productIds.push(productId);
			productPics.push(productPic);
		}

		console.log('Product ids commanded : ', productIds);
		var totalPrice = 0;
		$.ajax({
			url: $(this).data('url'),
			data: {product_id: productId, product_ids: productIds, product_pics: productPics},
			success: function(commands){
				console.log('All commands : ', commands);
				/*console.log('Nombre des produits ajoutés: ', commands[0].length);*/
				$('.command_number').text(commands[0].length);
				$('.command_list').html('');
				for (var i = 0; i < commands[0].length; i++) {
					 var command = commands[0][i];

					 if(command != null){
							var commandHTML = '<li class="header-cart-item">\
												<div class="header-cart-item-img">\
												<img src="/image/Products/'+command.attributes[0]+'" alt="IMG">\
											</div>\
											<div class="header-cart-item-txt">\
												<a href="#" class="header-cart-item-name">\
													'+command.name+'\
												</a>\
												<span class="header-cart-item-info">\
													'+command.price+' Ar\
												</span>\
											</div>\
										</li>';
						$('.command_list').append(commandHTML);
					
						totalPrice = +totalPrice+(+command.price); //totalPrice = totalPrice +...	
					}
				}
				/*commands[0].forEach(function(command){
					
					
				});*/

				$('.header-cart-total').html(totalPrice+' Ar');
			},
			error: function(responses, status, error){
				console.log("Error for adding command to cart with : ", error);
				console.log(responses);
			}
		})
	});

});