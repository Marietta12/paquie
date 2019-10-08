    @extends('front.layout.master')

    @section('main')

    	
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Catégories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="#" class="s-text13 active1" data-id="18">
									Entrer
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13" data-id="19">
									Plat de résistance
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13" data-id="20">
									Dessert
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13" data-id="22">
									Boissons et Jus
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13" data-id="21">
									Fast Food
								</a>
							</li>
						</ul>

						<!--  -->
							<div class="search-product pos-relative bo4 of-hidden">
							<input class="size6 p-l-23 p-r-50 search-value" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4 btn-search-product">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50 all-product">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2 selection_lara price_status" name="sorting">
									<option value="default">Triage par défaut</option>
									<option value="price-down-up">Prix: bas de haut</option>
									<option value="price-up-down">Prix: haut de bas</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2 selection_lara price_value" name="price">
									<option value="default">Triage par défault</option>
									<option value="0-5000">0Ar - 5.000Ar</option>
									<option value="5000-10000">5.000Ar - 10.000Ar</option>
									<option value="10000-20000">1.000Ar - 20.000Ar</option>
									<option value="20000+">20.000Ar +</option>
								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">							
							Voir les resultats 1-12 parmi les 16
						</span>
					</div>

					<!-- Product -->
					<div id="show-all-product">
						@include('front.product.show-all-product')
					</div>
						
					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>

    @endsection

    @section('additional-js')
    	<script type="text/javascript">
    		$(document).ready(function (){
    			$('.s-text13').on('click', function(e){
    				e.preventDefault();
    				$('.s-text13').removeClass('active1');
    				$(this).addClass('active1');
    				postData();
    			});

    			$('.btn-search-product').on('click', function(){
    				postData();
    			});

    			$('.selection_lara').on('change', function(){
    				postData();
    			});
    		});

    		function getParams(){
    			var category = $('.s-text13.active1').data('id');
    			var search_value = $('.search-value').val();
    			var price_status = $('.price_status').val();    			
    			var price_value = $('.price_value').val();
    			var data = new Object();
    			data.category = category;
    			if (search_value != "") {
    				data.search_value = search_value;
    			}
    			data.price_status = price_status;
    			data.price_value = price_value;
    			return data;
    		}

    		function postData() {
    			var all_data = getParams();
				$.ajax({
		           type:'POST',
		           url:'/get_filter_product',
		           data:{all_data:all_data},
		           success:function(data){
		              $('#show-all-product').html(data);
		              $('.search-value').val('');
		           }
		        });
    		}
    	</script>
    @endsection