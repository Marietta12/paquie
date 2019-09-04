    @extends('front.layout.master')

    @section('main')
    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(images/112.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                            Produit
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            Nouveau menu
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="{{ route('front_product') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Acheter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-image: url(images/asian-close-up-diet-37405.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                            Produit
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            Nouveau menu
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="{{ route('front_product') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Acheter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-image: url(images/avocado-cooked-delicious-262959.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                            Produit
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                            Nouveau menu
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <!-- Button -->
                            <a href="{{ route('front_product') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4 addtocart" >
                                Acheter
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner bgwhite p-t-100 p-b-40">
        <div class="container">
            <h3 class="m-text5 t-center p-b-60">
                    Catégories
                </h3>
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="images/appetizer-bowl-ceramic-764925 - Copie.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Entrer
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="images/720-932.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Resistance
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="images/banana-cherry-chocolate-2425.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Dessert
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="images/vitamins-winter-2.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Boissons et Jus</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="images/cheeseburger-martin-bondscience-photo-library.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Fast Food
                            </a>
                        </div>
                    </div>

                    <!-- block2 -->
                    <div class="block2 wrap-pic-w pos-relative m-b-30">
                        <img src="images/icons/bg-01.jpg" alt="IMG">

                        <div class="block2-content sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8">
                                3 Plats achetés, 1 plat gratuit offert!
                            </h4>

                            <p class="t-center w-size4">
                                Soyez les 10 premiers à commander pour profiter de cette offre!
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Les produits
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    @foreach($products as $product)
                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img container_product wrap-pic-w of-hidden pos-relative">
                                <img src="{{ url('image/Products/'.$product->photo.'') }}" alt="{{$product->name}}">

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
                                    {{ ($product) ? $product->prix : '' }} Ar
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>

        </div>
    </section>

    <!-- Blog -->
    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                     Blog
                </h3>
            </div>

            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="{{ route('front_blog') }}" class="block3-img container_blog dis-block hov-img-zoom">
                            <img src="{{ url('image/Blog/'.$blog->photo.'') }}" alt="{{$blog->title}}">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="{{ route('front_detailblog', ['id'=>$blog->id]) }}" class="m-text11">
                                    {{$blog->title}}
                                </a>
                            </h4>

                            <span class="s-text6">Publié par</span> <span class="s-text5">{{ $blog->user->name }}</span>
                            <span class="s-text6">le</span> <span class="s-text5">{{$blog->created_at}}</span>

                            <p class="s-text8 p-t-16">
                                {{$blog->description}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endsection
