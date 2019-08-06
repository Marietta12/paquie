@extends('front.layout.master')

@section('main')

	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="{{ url('image/Blog/'.$blog->photo.'') }}" alt="IMG-BLOG">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									{{ ($blog) ? $blog->title : '' }}
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										{{ ($blog) ? $blog->created_at : '' }}
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<!-- <span>
										
										<span class="m-l-3 m-r-6">|</span>
									</span>	 -->								
								</div>

								<p class="p-b-25">
									{{ ($blog) ? $blog->description : '' }}
								</p>

								<p class="p-b-25">
									Aliquam faucibus scelerisque placerat. Vestibulum vel libero eu nulla varius pretium eget eu magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean dictum faucibus felis, ac vestibulum risus mollis in. Phasellus neque dolor, euismod vitae auctor eget, dignissim a felis. Etiam malesuada elit a nibh aliquam, placerat ultricies nibh dictum. Nam ut egestas velit. Pellentesque viverra tincidunt tellus. Etiam cursus, ligula id vehicula cursus, turpis mauris facilisis massa, eget tincidunt est purus et odio. Nam quis luctus libero, non posuere velit. Ut eu varius diam, eu euismod elit. Donec efficitur, neque eu consectetur consectetur, dui sem consectetur felis, vitae rutrum risus urna vel arcu. Aliquam semper ullamcorper laoreet. Sed arcu lectus, fermentum imperdiet purus eu, ornare ornare libero.
								</p>
							</div>							
						</div>						
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Nouveau Produit
						</h4>

						<ul class="bgwhite">
							@foreach($products as $product)
							<li class="flex-w p-b-20">
								<a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="{{ url('image/Products/'.$product->photo.'') }}" alt="{{$product->name}}">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.html" class="s-text20">
										{{($product) ? $product->title : ''}}
									</a>

									<span class="dis-block s-text17 p-t-6">
										{{($product) ? $product->prix : ''}}
									</span>
								</div>
							</li>
							@endforeach							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('additional-js')

@endsection