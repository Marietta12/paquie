$(document).ready(function(){
	var productIds = [];
	var productPics = [];
	var CMD = {
		product_id: '',
		quantity: '',
		price: '',
		total_price: 0,
		client_name: '',
		client_table: 0,
	};
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
					
						totalPrice = totalPrice+command.price; //totalPrice = totalPrice +...	
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
		var getCommandListUrl = $('.liste-des-commandes').data('command_list');
		console.log('Url pour avoir la liste des commandes' , getCommandListUrl);

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


				//Pour l'objet CMD
				var ids = '', quantity = '', prices = ''; 
				$('.command_number').text(keys.length);
				keys.forEach(element => {
					
					var commandy = commands[element];
					console.log(commandy);
					var montantCommande = commandy.price * commandy.quantity;

					$('.liste-des-commandes').append('<tr class="table-row command">'+
								'<td class="column-1">'+
									'<div class="cart-img-product b-rad-4 o-f-hidden">'+
										'<img src="image/Products/'+commandy.attributes[0]+'" alt="IMG-PRODUCT">'+
									'</div>'+
								'</td>'+
								'<td class="column-2"> '+commandy.name+' </td>'+
								'<td class="column-3 price" data-price="'+commandy.price+'"> '+commandy.price+'  Ar</td>'+
								'<td class="column-4">'+
									'<div class="flex-w bo5 of-hidden w-size17 ">'+
										'<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 commandmoins">'+
											'<i class="fs-12 fa fa-minus" aria-hidden="true"></i>'+
										'</button>'+
										'<input class="id-cmd" type="hidden" value="'+commandy.id+'">'+
										'<input class="size8 m-text18 t-center num-product" type="number" name="num-product[]" value="'+commandy.quantity+'">'+

										'<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 commandplus">'+
											'<i class="fs-12 fa fa-plus" aria-hidden="true"></i>'+
										'</button>'+
									'</div>'+
								'</td>'+
								'<td class="column-5 montant" data-montant="'+montantCommande+'">'+montantCommande+' Ar</td>'+
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
			
					totalPrice += montantCommande; //totalPrice = totalPrice +...
					ids += commandy.id+';';
					quantity += commandy.quantity+';';
					prices += commandy.price+';';
	
				})
				console.log('Total: ', totalPrice+' Ar');
				$('.header-cart-total, .total-jiaby').html(totalPrice+' Ar');
				$('.header-cart-total').attr("data-total", totalPrice);

				CMD.product_id = ids;
				CMD.quantity = quantity;
				CMD.price = prices;
				CMD.total_price = totalPrice;
				

			},
			error: function(responses, status, error){
				console.log("Error for adding command to cart with : ", error);
				console.log(responses);
			}
		})
	}

	edygsfqh();


	$(document).on("click", ".commandplus, .commandmoins", function(){
		var nbr = $(this).siblings('.num-product').val();
		var id = $(this).siblings('.id-cmd').val();
		var price =  $(this).parents().eq(2).find('.price').data('price');
		var element = $(this);

		if($(this).hasClass('commandplus')){
			nbr++;
		}else if ($(this).hasClass('commandmoins')) {
			nbr--;
		}
		if(nbr < 0){
			return;
		}
		var amount = (+nbr) * (+price);

		$.ajax({
			url: 'http://localhost:8000/cart/edit',
			data: {
				l_id: id,
				nbr: nbr
			},
			success: function(commands){
				console.log(commands);

				var keys = Object.keys(commands);
				console.log('keys', keys);
				var totalPrice = 0;

				//Pour l'objet CMD
				var ids = '', quantity = '', prices = ''; 
				keys.forEach(elm => {
					var commandy = commands[elm];
					console.log(commandy);
					var montantCommande = commandy.price * commandy.quantity;
					totalPrice += montantCommande;

					ids += commandy.id+';';
					quantity += commandy.quantity+';';
					prices += commandy.price+';';
	
				});

				
				element.siblings('.num-product').val(nbr);
				element.parents().eq(2).find('.montant').attr('data-montant', amount).html(amount+' Ar');

				$('.header-cart-total, .total-jiaby').html(totalPrice+' Ar');
				$('.header-cart-total').attr("data-total", totalPrice);

				CMD.product_id = ids;
				CMD.quantity = quantity;
				CMD.prices = prices;
				CMD.total_price = totalPrice;

			}, error: function(err){
				console.log(err);
			}
		});
		
		/*var currentQuantity = parseInt($(this).siblings('.num-product').val());
		$(this).siblings('.num-product').val(currentQuantity++);
		var currentMontant = parseInt($(this).closest(".command").find('.montant').data('montant'));
		var price = parseInt($(this).closest(".command").find('.price').data('price'));
		var currentTotal = parseInt($('.header-cart-total').data("total"));
		var newMontant = currentMontant + price;
		var newTotal = currentTotal + price;
		$(this).closest(".command").find('.montant').attr('data-montant', newMontant);
		$(this).closest(".command").find('.montant').text(newMontant + ' Ar');
		$('.header-cart-total').attr('data-total', newTotal);
		$('.header-cart-total').text(newTotal + ' Ar');*/
	});

	function vider_carte(msg){
		$.ajax({
			url: 'http://localhost:8000/cart/clean',
			method: 'get',
			success: function(commands){
				alert(msg);
				document.location = '/';
				
		},  error: function(err){
			console.log(err);
			alert("ERREUR D'ENREGISTREMENT!\n"+err);
		}
	});	

	}

	$(document).on("click", ".alefaa", function(){
		                         
		CMD.client_name = $('.client_name').val(); 
		CMD.client_table = $('.client_table').val(); 

		console.log('CMD: ', CMD);
		//sending to db
		$.ajax({
			url: 'http://localhost:8000/cart/save',
			method: 'get',
			data: CMD,
			success: function(response){
				console.log(response);
				
				if( response.status == 'ok'){
					vider_carte(response.msg);
				}

			}, error: function(err){
				console.log(err);
				alert("ERREUR D'ENREGISTREMENT!\n"+err);
			}
		});	
	})
	/*$(document).on("click", ".commandmoins", function(){
		var currentQuantity = parseInt($(this).siblings('.num-product').val());
		if(currentQuantity > 0){
			$(this).siblings('.num-product').val(currentQuantity--);
			var currentMontant = parseInt($(this).closest(".command").find('.montant').data('montant'));
			var price = parseInt($(this).closest(".command").find('.price').data('price'));
			var currentTotal = parseInt($('.header-cart-total').data("total"));
			var newMontant = currentMontant - price;
			var newTotal = currentTotal - price;
			$(this).closest(".command").find('.montant').attr('data-montant', newMontant);
			$(this).closest(".command").find('.montant').text(newMontant + ' Ar');
			$('.header-cart-total').attr('data-total', newTotal);
			$('.header-cart-total').text(newTotal + ' Ar');

		}
	});

	$(document).on("click", ".commandplus", function(){
		var currentQuantity = parseInt($(this).siblings('.num-product').val());
		$(this).siblings('.num-product').val(currentQuantity++);
		var currentMontant = parseInt($(this).closest(".command").find('.montant').data('montant'));
		var price = parseInt($(this).closest(".command").find('.price').data('price'));
		var currentTotal = parseInt($('.header-cart-total').data("total"));
		var newMontant = currentMontant + price;
		var newTotal = currentTotal + price;
		$(this).closest(".command").find('.montant').attr('data-montant', newMontant);
		$(this).closest(".command").find('.montant').text(newMontant + ' Ar');
		$('.header-cart-total').attr('data-total', newTotal);
		$('.header-cart-total').text(newTotal + ' Ar');
	});*/

});

// $(".commandmoins").on("click", function(){
// 	commandy.quantity = +commandy.quantity - (+1);
// },
// $(".commandplus").on("click", function(){
// 	commandy.quantity = + commandy.quantity + (+1);
// },