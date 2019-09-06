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

	function edygsfqh(){
		$.ajax({
			url: 'http://localhost:8000/cart/liste',
			data: {},
			success: function(commands){
				console.log('All commands : ', commands);
				/*console.log('Nombre des produits ajoutés: ', commands[0].length);*/
				console.log(commands);
				var keys = Object.keys(commands);
				console.log('keys', keys);
				var totalPrice = 0;

				$('.command_number').text(keys.length);
				keys.forEach(element => {
					
					var commandy = commands[+element];
					console.log(commandy);

					$('.liste-des-commandes').append('<tr class="table-row">'+
								'<td class="column-1">'+
									'<div class="cart-img-product b-rad-4 o-f-hidden">'+
										'<img src="image/Products/'+commandy.attributes[0]+'" alt="IMG-PRODUCT">'+
									'</div>'+
								'</td>'+
								'<td class="column-2"> '+commandy.name+' </td>'+
								'<td class="column-3"> '+commandy.price+'  Ar</td>'+
								'<td class="column-4">'+
									'<div class="flex-w bo5 of-hidden w-size17 ">'+
										'<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 commandmoins">'+
											'<i class="fs-12 fa fa-minus" aria-hidden="true"></i>'+
										'</button>'+

										'<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="'+commandy.quantity+'">'+

										'<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 commandplus">'+
											'<i class="fs-12 fa fa-plus" aria-hidden="true"></i>'+
										'</button>'+
									'</div>'+
								'</td>'+
								'<td class="column-5">'+commandy.price * +commandy.quantity+' Ar</td>'+
							'</tr>');

					var commandHTML = '<li class="header-cart-item">\
										<div class="header-cart-item-img">\
										<img src="/image/Products/'+commandy.attributes[0]+'" alt="IMG">\
									</div>\
									<div class="header-cart-item-txt">\
										<a href="#" class="header-cart-item-name">\
											'+commandy.name+'\
										</a>\
										<span class="header-cart-item-info">\
											'+commandy.price+' Ar\
										</span>\
									</div>\
								</li>';
					$('.command_list').append(commandHTML);
			
					totalPrice = +totalPrice+(+commandy.price); //totalPrice = totalPrice +...

					$(".commandmoins").on("click", function(){
						commandy.quantity = +commandy.quantity - (+1);
					})

					$(".commandplus").on("click", function(){
					commandy.quantity = + commandy.quantity + (+1);
					})	
				})
				console.log('Total: ', totalPrice+' Ar');
				$('.header-cart-total').html(totalPrice+' Ar');

			},
			error: function(responses, status, error){
				console.log("Error for adding command to cart with : ", error);
				console.log(responses);
			}
		})
	}

	edygsfqh();

});

// $(".commandmoins").on("click", function(){
// 	commandy.quantity = +commandy.quantity - (+1);
// },
// $(".commandplus").on("click", function(){
// 	commandy.quantity = + commandy.quantity + (+1);
// },