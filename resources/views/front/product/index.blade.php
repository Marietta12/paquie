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
								<a href="#" class="s-text13 active1">
									Entrer
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Plat de résistance
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Dessert
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Boissons et Jus
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Fast Food
								</a>
							</li>
						</ul>

						<!--  -->
							<div class="search-product pos-relative bo4 of-hidden">
							<input class="size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
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
								<select class="selection-2 selection_lara" name="sorting">
									<option value="default">Triage par défaut</option>
									<option value="price-down-up">Prix: bas de haut</option>
									<option value="price-up-down">Prix: haut de bas</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2 selection_lara" name="price">
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
					<div class="row">
						@foreach($products as $product)
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img container_product wrap-pic-w of-hidden pos-relative">
									
									<img src="{{ url('image/Products/'.$product->photo.'') }}">
									
									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addtocart" data-productid="{{ ($product) ? $product->id : '' }}" data-url="{{route('add_to_cart', ['id'=>$product->id]) }}">
												Ajouter au panier
											</button>
										</div>
									</div>
								</div>
								

								<div class="block2-txt p-t-20">
									<a href="{{ route('front_detailproduct', ['id'=>$product->id]) }}" class="block2-name dis-block s-text3 p-b-5">
										{{ ($product) ? $product->title : '' }}
									</a>

									<span class="block2-price m-text6 p-r-5">
										{{ ($product) ? $product->prix : '' }} AR
									</span>
								</div>
							</div>
						</div>
						@endforeach

						
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