@extends('front.layout.master')

@section('main')

<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						<!-- item blog -->
						<div class="item-blog p-b-80">
							@foreach($blogs as $blog)
							<a href="{{ route('front_detailblog', ['id'=>$blog->id]) }}" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="{{ url('image/Blogs/'.$blog->photo.'') }}" alt="IMG-BLOG">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									{{ ($blog) ? $blog->created_at : '' }}
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="{{ route('front_detailblog', ['id'=>$blog->id]) }}" class="m-text24">
										{{ ($blog) ? $blog->title : '' }}
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										Cooking, Food
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>

								<p class="p-b-12">
									{{ ($blog) ? $blog->description : '' }}
								</p>

								<a href="{{ route('front_detailblog' ,['id'=>$blog->id]) }}" class="s-text20">
									Lire
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
							@endforeach
						</div>

						
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-r-50">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
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
							<li class="flex-w p-b-20">
								<a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="images/item-16.jpg" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.html" class="s-text20">
										White Shirt With Pleat Detail Back
									</a>

									<span class="dis-block s-text17 p-t-6">
										$19.00
									</span>
								</div>
							</li>

							<li class="flex-w p-b-20">
								<a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="images/item-17.jpg" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.html" class="s-text20">
										Converse All Star Hi Black Canvas
									</a>

									<span class="dis-block s-text17 p-t-6">
										$39.00
									</span>
								</div>
							</li>

							<li class="flex-w p-b-20">
								<a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="images/item-08.jpg" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.html" class="s-text20">
										Nixon Porter Leather Watch In Tan
									</a>

									<span class="dis-block s-text17 p-t-6">
										$17.00
									</span>
								</div>
							</li>

							<li class="flex-w p-b-20">
								<a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="images/item-03.jpg" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.html" class="s-text20">
										Denim jacket blue
									</a>

									<span class="dis-block s-text17 p-t-6">
										$39.00
									</span>
								</div>
							</li>

							<li class="flex-w p-b-20">
								<a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="images/item-05.jpg" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.html" class="s-text20">
										Nixon Porter Leather Watch In Tan
									</a>

									<span class="dis-block s-text17 p-t-6">
										$17.00
									</span>
								</div>
							</li>
						</ul>												
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection