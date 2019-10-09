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