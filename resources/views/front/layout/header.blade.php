<!-- Header -->
<header class="header1">
	<!-- Header desktop -->
	<div class="container-menu-header">
		<div class="topbar">
			<div class="topbar-social">
				<a href="#" class="topbar-social-item fa fa-facebook"></a>
				<a href="#" class="topbar-social-item fa fa-instagram"></a>
				<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
				<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
				<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
			</div>

			<span class="topbar-child1">
				Bienvenue dans <strong>RESTOMENU</strong>
			</span>

			<div class="topbar-child2">
				<span class="topbar-email">
					marietta@restomenu.mg
				</span>

				<div class="topbar-language rs1-select2">
					<select class="selection-1" name="time">
						<option>Ariary</option>
						<option>Fmg</option>
					</select>
				</div>
			</div>
		</div>

		<div class="wrap_header">
			<!-- Logo -->
			<a href="{{ url('/') }}" class="logo">
				<img src="{{ url('images/logo-restomenu-final-v2.png') }}" alt="IMG-LOGO">
			</a>

			<!-- Menu Desktop-->
			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<li>
							<a href="{{ url('/') }}">Accueil</a>
						</li>

						<li>
							<a href="{{ route('front_product') }}">Produit</a>
						</li>

						<li>
							<a href="{{ route('front_blog') }}">Blog</a>
						</li>

						<li>
							<a href="{{ route('front_about') }}">A propos</a>
						</li>

						<li>
							<a href="{{ route('front_contact') }}">Contact</a>
						</li>
					</ul>
				</nav>
			</div>

			<!-- Header Icon -->
			<div class="header-icons">				
				<div class="header-wrapicon2">
					<img src="{{ url('images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti command_number">0</span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem command_list">
							
							{{-- <li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="#" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										<!-- title  -->
									</a>

									<span class="header-cart-item-info">
									<!-- price -->
									</span>
								</div>

							</li> --}}
								

						</ul>

						<div class="header-cart-total">
							Total: $75.00
						</div>

						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="{{ route('front_cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									<h6>Voir la commande</h6>
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									<h6>Annuler</h6>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="{{ url('/') }}" class="logo-mobile">
				<img src="{{ url('images/logo-restomenu-final-v2.png') }}" alt="IMG-LOGO">
			</a>			

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">				

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="#" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<!--producttitle -->
										</a>

										<span class="header-cart-item-info">
											<!-- productprix Ar -->
										</span>
									</div>
								</li>					
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('front_cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										<h6>Voir la commande</h6>
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										<h6>Annuler</h6>		
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Bienvenue dans <strong>RESTOMENU</strong>
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								marietta@restomenu.mg
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>Ariary</option>
									<option>Fmg</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ url('/') }}">Accueil</a>						
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('front_product') }}">Produit</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('front_blog') }}">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('front_about') }}">A propos</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('front_contact') }}">Contact</a>
					</li>					
				</ul>
			</nav>
		</div>
</header>