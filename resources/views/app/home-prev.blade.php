@extends('layouts.app-prev')
@section('title')
    <title>Chekout | Food Delivery Hub</title>
@endsection

@section('content')
    <section class="banner-1 banner-2 p-relative ">
        <img src="img/jpg/res.jpg" class="img-fluid full-width" alt="Banner">
        <div class="transform-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7-slide align-self-center">
                        <div class="right-side-content">
                            <h1 class="text-custom-white fw-600 fs-28">Crave it? Get it.</h1>
                            <h3 class="text-custom-white fw-100 fs-18">Search for a favorite restaurant, cuisine or
                                dish.</h3>
                        </div>
                    </div>
                    {{-- <div class="col-lg-5-slide">
                        <img src="img/jpg/res.jpg" class="img-fluid full-width" alt="Banner">
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="overlay overlay-bg"></div>
    </section>
    <section class="browse-cat u-line section-padding-small">
        <div class="container">
            <div class="row">
                {{-- <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Browse by cuisine <span class="fs-14"><a href="restaurant.html">See all restaurant</a></span></h3>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="category-slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($categories as $category)
                                <div class="swiper-slide">
                                    <a href="#" class="categories">
                                        <div class="icon text-custom-white bg-light-green ">
                                            <img src="{{ $category['photo'] }}" class="rounded-circle" alt="categories">
                                        </div>
                                        <span class="text-light-black cat-name">{{ $category['title'] }}</span>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ex-collection section-padding">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Restaurants NearBy <span class="fs-14"><a
                                    href="restaurant.html">Sort By</a></span></h3>
                    </div>
                </div>
                <div class="col-lg-9-restaraunt col-md-8">
                    <div class="row">

                        @foreach($restaurants as $restaraunt)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product-box mb-xl-20">
                                    <div class="product-img">
                                        <a href="/checkout/restaurant_detail">
                                            <img src="{{ $restaraunt['photo'] }}" class="img-fluid-restaraunt full-width"
                                                 alt="product-img" width="255" height="150">
                                        </a>
                                        <div class="overlay">
                                            <div class="product-tags padding-10">
                                                <span class="circle-tag">
                                                    <img src="img/svg/013-heart-1.svg" alt="tag">
                                                </span>
                                                <div class="custom-tag"><span
                                                        class="text-custom-white rectangle-tag bg-gradient-red">10%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title"><a href="/checkout/restaurant_detail"
                                                                         class="text-light-black ">{{ $restaraunt['title'] }}</a>
                                            </h6>
                                            <div class="tags"><span
                                                    class="text-custom-white rectangle-tag bg-yellow">3.1</span>
                                            </div>
                                        </div>
                                        <p class="text-light-white">{{ $restaraunt['description'] }}</p>
                                        <div class="product-details">
                                            <div class="price-time"><span class="text-light-black time">30-40 min</span>
                                                <span class="text-light-white price">${{ $restaraunt['price'] }}</span>
                                            </div>
                                            <div class="rating">
                                                <span>
                                                    <i class="fas fa-star text-yellow"></i>
                                                    <i class="fas fa-star text-yellow"></i>
                                                    <i class="fas fa-star text-yellow"></i>
                                                    <i class="fas fa-star text-yellow"></i>
                                                    <i class="fas fa-star text-yellow"></i>
                                                </span>
                                                <span class="text-light-white text-right"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
