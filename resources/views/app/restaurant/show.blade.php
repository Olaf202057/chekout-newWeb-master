@extends('layouts.app')

@section('title')
    <title>Chekout</title>
@endsection
@section('content')
    <div class="page-banner p-relative smoothscroll" id="menu">
        <img src="{{str_replace('/logo/', '/banner/', $restaurant->photo) ?? asset('img/slider.jpeg')}}" class="img-fluid full-width"
             alt="banner">
        <div class="overlay-2">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="back-btn">
                            <button type="button" class="text-light-green"><i class="fas fa-chevron-left"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="tag-share"><span class="text-light-green share-tag">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- restaurent top -->
    <!-- restaurent details -->
    <section class="restaurent-details  u-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading padding-tb-10">
                        <h3 class="text-light-black title fw-700 no-margin">{{ $restaurant->name ?? 'Untitled' }}</h3>
                        <p class="text-light-black sub-title no-margin">{{ $restaurant->phone ?? '' }}
                        <p class="text-light-black sub-title no-margin">{{ $restaurant->address ?? 'Unlisted Address' }}
                        <p>                        {!! $restaurant->webUrl ? '<a href="'. $restaurant->webUrl .'" class="text-light-black sub-title no-margin">' . $restaurant->webUrl . '</a>'  : '' !!}
                        </p>                         {{--                            <span><a href="checkout.html" class="text-success">Change locations</a></span>--}}
                        {{--                        <div class="head-rating">--}}
                        {{--                            --}}{{--                             Todo: Need to make this work wth an actual rating reviewsSum/reviewsCount--}}
                        {{--                            <div class="rating"> <span class="fs-16 text-yellow">--}}
                        {{--                              <i class="fas fa-star"></i>--}}
                        {{--                            </span>--}}
                        {{--                                <span class="fs-16 text-yellow">--}}
                        {{--                              <i class="fas fa-star"></i>--}}
                        {{--                            </span>--}}
                        {{--                                <span class="fs-16 text-yellow">--}}
                        {{--                              <i class="fas fa-star"></i>--}}
                        {{--                            </span>--}}
                        {{--                                <span class="fs-16 text-yellow">--}}
                        {{--                              <i class="fas fa-star"></i>--}}
                        {{--                            </span>--}}
                        {{--                                <span class="fs-16 text-dark-white">--}}
                        {{--                              <i class="fas fa-star"></i>--}}
                        {{--                            </span>--}}
                        {{--                                <span class="text-light-black fs-12 rate-data">--}}
                        {{--                                    {{ $restaurant->reviewsCount ?? 0}}--}}
                        {{--                                    {{ isset($restaurant->reviewsCount) && ($restaurant->reviewsCount != 1) ? 'ratings' : 'rating' }}--}}
                        {{--                                </span>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="product-review">--}}
                        {{--                                <div class="restaurent-details-mob">--}}
                        {{--                                    <a href="#"> <span class="text-light-black"><i--}}
                        {{--                                                class="fas fa-info-circle"></i></span>--}}
                        {{--                                        <span class="text-dark-white">info</span>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="restaurent-details-mob">--}}
                        {{--                                    <a href="#"> <span class="text-light-black"><i--}}
                        {{--                                                class="fas fa-info-circle"></i></span>--}}
                        {{--                                        <span class="text-dark-white">info</span>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="restaurent-details-mob">--}}
                        {{--                                    <a href="#"> <span class="text-light-black"><i--}}
                        {{--                                                class="fas fa-info-circle"></i></span>--}}
                        {{--                                        <span class="text-dark-white">info</span>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="restaurent-details-mob">--}}
                        {{--                                    <a href="#"> <span class="text-light-black"><i--}}
                        {{--                                                class="fas fa-info-circle"></i></span>--}}
                        {{--                                        <span class="text-dark-white">info</span>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                --}}{{--                                <h6 class="text-light-black no-margin">91<span class="fs-14">% Food was good</span></h6>--}}
                        {{--                                --}}{{--                                <h6 class="text-light-black no-margin">91<span class="fs-14">% Food was good</span></h6>--}}
                        {{--                                --}}{{--                                <h6 class="text-light-black no-margin">91<span class="fs-14">% Food was good</span></h6>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="restaurent-logo">
                        <img src="{{ $restaurant->photo ?? asset('img/logo.png') }}" class="img-fluid" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent details -->
    <!-- restaurent tab -->
    <div class="restaurent-tabs u-line">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="restaurent-menu scrollnav">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active text-light-white fw-700" data-toggle="pill"
                                                    href="#menu">Menu</a>
                            </li>
                            <li class="nav-item"><a class="nav-link text-light-white fw-700" data-toggle="pill"
                                                    href="#about">About</a>
                            </li>
                            <li class="nav-item"><a class="nav-link text-light-white fw-700" data-toggle="pill"
                                                    href="#review">Reviews</a>
                            </li>
                            <li class="nav-item"><a class="nav-link text-light-white fw-700" data-toggle="pill"
                                                    href="#mapgallery">Map & Gallery</a>
                            </li>
                        </ul>
                        <div class="add-wishlist">
                            <img src="{{ asset('img/svg/heart-grey.svg') }}" alt="tag">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- restaurent tab -->
    <!-- restaurent address -->
    <div class="restaurent-address u-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="address-details">
                        <div class="address">
                            <div class="delivery-address"><a href="" class="text-light-black">Delivery,
                                    ASAP
                                    ({{ isset($restaurant->prep_min) ? $restaurant->prep_min . ' minutes' : 'No Estimate Available' }}
                                    )</a>
                                <div class="delivery-type"><span
                                        class="text-success fs-12 fw-500">No minimum</span>
                                    {{--                                    <span class="text-light-white">, Free Delivery</span>--}}
                                </div>
                            </div>
                            {{--                            <div class="change-address"><a href="checkout.html" class="fw-500">Change</a>--}}
                            {{--                            </div>--}}
                        </div>
                        {{--                        <p class="text-light-white no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing--}}
                        {{--                            elit,</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- restaurent address -->
    <!-- restaurent meals -->
    <section class="section-padding restaurent-meals bg-light-theme">
        <div class="container">
            <div class="alert alert-info text-center" id="alert" style="display: none;">

            </div>

            <div class="row">
                <div class="col-lg-12 col-xl-11">
                    @foreach($current->collection('restaurant_menu')->documents() as $menu)
                        @foreach($current->collection('restaurant_menu')->document($menu->data()['id'])->collection('menu_section')->documents() as $section)
                            <h3 class="mb-2">{{ $section->data()['name'] }}</h3>

                            <div class="row mb-4">
                                @if($current->collection('restaurant_menu')->document($menu->data()['id'])->collection('menu_section')->document($section->data()['id'])->collection('menu_item')->documents())
                                    @foreach($current->collection('restaurant_menu')->document($menu->data()['id'])->collection('menu_section')->document($section->data()['id'])->collection('menu_item')->documents() as $product)
                                        <div class="col-lg-6 mb-2">
                                            <x-menu-item-card
                                                :product="$product"
                                                :restaurant="$restaurant">
                                            </x-menu-item-card>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            This restaurant doesn't have a
                                            menu
                                            set up yet.
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent meals -->
    <!-- restaurent about -->
    <section class="section-padding restaurent-about smoothscroll" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light-black fw-700 title">{{ $restaurant->title ?? '' }}</h3>
                    {{--                    <p class="text-light-green no-margin">American, Breakfast, Coffee and Tea, Fast Food, Hamburgers</p>--}}
                    <p class="text-light-white no-margin">{{ $restaurant->description ?? '' }}</p>
                    <span
                        class="text-{{ isset($restaurant->price) && $restaurant->price > 0 ? 'success' : 'dark-white' }} fs-16">$</span>
                    <span
                        class="text-{{ isset($restaurant->price) && $restaurant->price > 1 ? 'success' : 'dark-white' }} fs-16">$</span>
                    <span
                        class="text-{{ isset($restaurant->price) && $restaurant->price > 2 ? 'success' : 'dark-white' }} fs-16">$</span>
                    <span
                        class="text-{{ isset($restaurant->price) && $restaurant->price > 3 ? 'success' : 'dark-white' }} fs-16">$</span>
                    <span
                        class="text-{{ isset($restaurant->price) && $restaurant->price > 4 ? 'success' : 'dark-white' }} fs-16">$</span>
                    <ul class="about-restaurent">
                        <li>
                            <i class="fas fa-building"></i>
                            <span>
                                <a href="#" class="text-light-white">{{ $restaurant->name }}</a>
                            </span>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>
                                <a href="#" class="text-light-white">{{ $restaurant->address }}</a>
                            </span>
                        </li>
                        <li><i class="fas fa-phone-alt"></i>
                            <span><a href="tel:"
                                     class="text-light-white">{{$restaurant->phone}}</a></span>
                        </li>
                        {{--                        <li><i class="far fa-envelope"></i>--}}
                        {{--                            <span><a href="mailto:" class="text-light-white">demo@domain.com</a></span>--}}
                        {{--                        </li>--}}
                    </ul>
                    {{--                    <ul class="social-media pt-2">--}}
                    {{--                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li><a href="#"><i class="fab fa-twitter"></i></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li><a href="#"><i class="fab fa-instagram"></i></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li><a href="#"><i class="fab fa-youtube"></i></a>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                </div>
                <div class="col-md-6">
                    <div class="restaurent-schdule">
                        <div class="card">
                            <div class="card-header text-light-white fw-700 fs-16">Hours</div>
                            <div class="card-body">
                                <div class="schedule-box">
                                    @if(isset($restaurant->operation_info) && isset($restaurant->operation_info) && count($restaurant->operation_info->monday) > 0)
                                        <div class="day text-light-black">Monday</div>
                                        <div
                                            class="time text-light-black">{{ $restaurant->operation_info->monday[0] == true ? $restaurant->operation_info->monday[1] . ' - ' . $restaurant->operation_info->monday[2] : 'Closed' }}</div>
                                    @endif
                                </div>
                                <div class="collapse show" id="schdule">
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Tuesday</div>
                                        <div
                                            class="time text-light-black">{{ $restaurant->operation_info->monday[0] == true ? $restaurant->operation_info->monday[1] . ' - ' . $restaurant->operation_info->monday[2] : 'Closed' }}</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Wednesday</div>
                                        <div
                                            class="time text-light-black">{{ $restaurant->operation_info->monday[0] == true ? $restaurant->operation_info->monday[1] . ' - ' . $restaurant->operation_info->monday[2] : 'Closed' }}</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Thurdsay</div>
                                        <div
                                            class="time text-light-black">{{ $restaurant->operation_info->monday[0] == true ? $restaurant->operation_info->monday[1] . ' - ' . $restaurant->operation_info->monday[2] : 'Closed' }}</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Friday</div>
                                        <div
                                            class="time text-light-black">{{ $restaurant->operation_info->monday[0] == true ? $restaurant->operation_info->monday[1] . ' - ' . $restaurant->operation_info->monday[2] : 'Closed' }}</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Saturday</div>
                                        <div
                                            class="time text-light-black">{{ $restaurant->operation_info->monday[0] == true ? $restaurant->operation_info->monday[1] . ' - ' . $restaurant->operation_info->monday[2] : 'Closed' }}</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Sunday</div>
                                        <div
                                            class="time text-light-black">{{ $restaurant->operation_info->monday[0] == true ? $restaurant->operation_info->monday[1] . ' - ' . $restaurant->operation_info->monday[2] : 'Closed' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"><a class="fw-500" data-toggle="collapse" href="#schdule">See
                                    the full schedule</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent about -->
    <!-- map gallery -->
    <div class="map-gallery-sec section-padding bg-light-theme smoothscroll" id="mapgallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-box">
                        <div class="row">
                            <div class="col-md-6 map-pr-0">
                                <iframe id="locmap"
                                        src="https://maps.google.com/maps?q={{ $restaurant->address }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                            <div class="col-md-6 map-pl-0">
                                <div class="gallery-box padding-10">
                                    <ul class="gallery-img">
                                        <li>
                                            <a class="image-popup"
                                               href="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                               title="Image title">
                                                <img
                                                    src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                    class="img-fluid full-width"
                                                    alt="9.jpg"/>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup"
                                               href="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                               title="Image title">
                                                <img
                                                    src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                    class="img-fluid full-width"
                                                    alt="9.jpg"/>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup"
                                               href="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                               title="Image title">
                                                <img
                                                    src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                    class="img-fluid full-width"
                                                    alt="9.jpg"/>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup"
                                               href="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                               title="Image title">
                                                <img
                                                    src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                    class="img-fluid full-width"
                                                    alt="9.jpg"/>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup"
                                               href="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                               title="Image title">
                                                <img
                                                    src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                    class="img-fluid full-width"
                                                    alt="9.jpg"/>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup"
                                               href="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                               title="Image title">
                                                <img
                                                    src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                    class="img-fluid full-width"
                                                    alt="9.jpg"/>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- map gallery -->
    <!-- restaurent reviews -->
    @php
        $reviewTotal = isset($restaurant->reviewsCount) && $restaurant->reviewsCount > 0 && $restaurant->reviewsSum > 0 ? $restaurant->reviewsSum / $restaurant->reviewsCount : 0;
    @endphp
    <section class="section-padding restaurent-review smoothscroll" id="review">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Reviews
                            for {{ $restaurant->title ?? 'this restaurant' }}</h3>
                    </div>
                    <div class="restaurent-rating mb-xl-20">
                        <div class="star"><span class="text-{{ $reviewTotal > 0 ? 'yellow' : 'dark-white'}} fs-16">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-{{ $reviewTotal > 1 ? 'yellow' : 'dark-white'}} fs-16">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-{{ $reviewTotal > 2 ? 'yellow' : 'dark-white'}} fs-16">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-{{ $reviewTotal > 3 ? 'yellow' : 'dark-white'}} fs-16">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-{{ $reviewTotal > 4 ? 'yellow' : 'dark-white'}} fs-16">
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <span class="fs-12 text-light-black">
                            {{ $restaurant->reviewsCount ?? 0}}
                            {{ isset($restaurant->reviewsCount) && ($restaurant->reviewsCount != 1) ? 'ratings' : 'rating' }}</span>
                    </div>
                    <div class="u-line"></div>
                </div>
                @if(isset($reviews) && $reviews->count() > 0)
                    <div class="col-md-12">
                        @foreach($reviews as $review)
                            <div class="review-box">
                                <div class="review-user">
                                    <div class="review-user-img">
                                        <img src="{{ $review['authorProfilePic'] ?? 'https://via.placeholder.com/40' }}"
                                             class="rounded-circle" alt="#" style="max-height: 90px;">
                                        <div class="reviewer-name">
                                            <p class="text-light-black fw-600">{{ $review['authorName'] && trim($review['authorName']) != '' ? $review['authorName'] : 'Anonymous' }}
                                            {{--                                                <small class="text-light-white fw-500">New--}}
                                            {{--                                                    York, (NY)</small>--}}
                                            {{--                                            </p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>--}}
                                        </div>
                                    </div>
                                    <div class="review-date"><span class="text-light-white">Sep 20, 2020</span>
                                    </div>
                                </div>
                                <div class="ratings"><span
                                        class="text-{{ $review['rating'] > 0 ? 'yellow' : 'dark-white' }} fs-16">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="text-{{ $review['rating'] > 1 ? 'yellow' : 'dark-white' }} fs-16">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="text-{{ $review['rating'] > 2 ? 'yellow' : 'dark-white' }} fs-16">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="text-{{ $review['rating'] > 3 ? 'yellow' : 'dark-white' }} fs-16">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="text-{{ $review['rating'] > 4 ? 'yellow' : 'dark-white' }} fs-16">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="ml-2 text-light-white">2 days ago</span>
                                </div>
                                <p class="text-light-black">{{ isset($review['text']) && trim($review['text']) != '' ? $review['text'] :  'No text provided.'}}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-12">
                        <div class="review-img">
                            <img src="{{ asset('img/review-footer.png') }}" class="img-fluid" alt="#">
                            <div class="review-text">
                                <h2 class="text-light-white mb-2 fw-600">Be one of the first to review</h2>
                                <p class="text-light-white">Order now and write a review to give others the inside
                                    scoop.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalProductDetail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-white">
                <div class="modal-header border-0 pb-0 justify-content-end">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" style="flex-shrink: 0;"><path d="M17.2929 18.7071C17.6834 19.0976 18.3166 19.0976 18.7071 18.7071C19.0976 18.3166 19.0976 17.6834 18.7071 17.2929L13.4142 12L18.7071 6.70711C19.0976 6.31658 19.0976 5.68342 18.7071 5.29289C18.3166 4.90237 17.6834 4.90237 17.2929 5.29289L12 10.5858L6.70711 5.29289C6.31658 4.90237 5.68342 4.90237 5.29289 5.29289C4.90237 5.68342 4.90237 6.31658 5.29289 6.70711L10.5858 12L5.29289 17.2929C4.90237 17.6834 4.90237 18.3166 5.29289 18.7071C5.68342 19.0976 6.31658 19.0976 6.70711 18.7071L12 13.4142L17.2929 18.7071Z" fill="#494949"></path></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="frmProductDetail">
                        <input type="hidden" class="restaurant-id">
                        <input type="hidden" class="menu-id">
                        <input type="hidden" class="section-id">
                        <input type="hidden" class="product-id">
                        <h4 class="font-weight-bold mb-2 product-name">Name</h4>
                        <img class="product-image d-none mb-3" src="" alt="">
                        <p class="limit-line-3 product-description">Description</p>
                        <h5 class="font-weight-bold product-price mt-2 mb-3"></h5>
                        <h5 class="font-weight-bold product-calory">Cal: 600-700</h5>
                        <div class="product-options">

                        </div>

                        <label for="">Message:</label>
                        <textarea name="" class="form-control message" cols="30" rows="3"></textarea>
                    </form>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button class="btn btn-block btn-add-cart">Add to cart</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTemporaryProduct" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-white">
                <div class="modal-header border-0 pb-0 justify-content-end">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" style="flex-shrink: 0;"><path d="M17.2929 18.7071C17.6834 19.0976 18.3166 19.0976 18.7071 18.7071C19.0976 18.3166 19.0976 17.6834 18.7071 17.2929L13.4142 12L18.7071 6.70711C19.0976 6.31658 19.0976 5.68342 18.7071 5.29289C18.3166 4.90237 17.6834 4.90237 17.2929 5.29289L12 10.5858L6.70711 5.29289C6.31658 4.90237 5.68342 4.90237 5.29289 5.29289C4.90237 5.68342 4.90237 6.31658 5.29289 6.70711L10.5858 12L5.29289 17.2929C4.90237 17.6834 4.90237 18.3166 5.29289 18.7071C5.68342 19.0976 6.31658 19.0976 6.70711 18.7071L12 13.4142L17.2929 18.7071Z" fill="#494949"></path></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Sorry, this item is temporarily unavailable</h5>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('submit', '.add-to-cart-form', function (e) {
                e.preventDefault();

                var form = $(e.target);
                console.log(form.attr('action'));
                var inputs = form.find('input');
                var select = form.find('select');

                // not sure if you wanted this, but I thought I'd add it.
                // get an associative array of just the values.
                var values = {};
                inputs.each(function () {
                    values[this.name] = $(this).val();
                });
                select.each(function () {
                    values[this.name] = $(this).val();
                });

                // console.log(values);
                // $.post(form.attr('action'), values, "json")
                //     .done(function (data) {
                //         console.log(data);
                //         if (data.error) {
                //             $('#alert').show();
                //             $('#alert').empty().append(
                //                 '<div class="row">' + data.error + '</div>' +
                //                 '<div class="row">' + data.alert + '</div>'
                //             );
                //         } else {
                //             // Todo: Prepend to not get rid of the subtotal box.
                //             var cartItems = $(document).find('.cat-product-box').remove();
                //             var cartBadge = $(document).find('.user-alert-cart').first();
                //             console.log('Cart Badge Below');
                //             console.log(cartBadge);
                //             cartBadge.empty().text(data.items.length);
                //             var carts = $(document).find('.cart-item-holder');
                //             console.log(carts);
                //             carts.each(function () {
                //                 var items = data.items;
                //                 var string = '';
                //                 for (var itemkey in items) {
                //                     string += parseFirstCartItemString(items[itemkey], itemkey) + parseSecondCartItemString(items[itemkey], itemkey) + parseThirdCartItemString(items[itemkey], itemkey);
                //                 }
                //                 $(this).html(string);
                //             });

                //             var subtotals = $(document).find('.cart-subtotal');
                //             subtotals.each(function (subtotalEvent) {
                //                 $(this).empty().append(
                //                     '<a href="#" class="text-dark-white fw-500">$' + data.subtotal + '</a>');
                //             });
                //         }
                //     })
            });

            function parseFirstCartItemString(item, index) {
                console.log(item);
                return '<div class="cat-product-box" data-cart="' + index + '-' + item.id + '">' +
                '                        <div class="cat-product">' +
                '                            <div class="cat-name">' +
                '                                <div class="row">' +
                '                                    <div class="col-12">' +
                '                                        <a href="#">' +
                '                                            <p class="text-dark"><span' +
               '                                                    class="text-dark-white">' + item.quantity + '</span>' + item.name + '</p>';
            }

            function parseSecondCartItemString(item, index) {
                var string = '';
                options = item.options;
                for (var optionkey in options) {
                    string += '<span class="text-light-white">' + options[optionkey] + '</span>';
                }
                return string;
            }

            function parseThirdCartItemString(item, index) {
                return '                                            <div class="delete-btn">' +
                    '                                                <a class="text-dark-white remove-item"' +
                    '                                                   data-id="' + item.id + '" data-index="' + index + '"> <i' +
                    '                                                        class="far fa-trash-alt"></i>' +
                    '                                                </a>' +
                    '                                            </div>' +
                    '                                        </a>' +
                    '                                    </div>' +
                    '                                </div>' +
                    '                            </div>' +
                    '                            <div class="price"><a href="#" class="text-dark-white fw-500">' +
                    '$' + item.price +
                    '                                </a>' +
                    '                            </div>' +
                    '                        </div>' +
                    '                    </div>';
            }
        });

        const resetProductPrice = (el) => {
            var total = $("#modalProductDetail .btn-add-cart").data('price');

            $("#modalProductDetail .product-options select option:selected").each((index, item) => {
                if(extraPrice = $(item).data('price')) {
                    total = parseFloat(total) + parseFloat(extraPrice);
                }
            })

            $("#modalProductDetail .btn-add-cart").text('Add to cart - $' + parseFloat(total).toFixed(2))
        }

        $(function() {
            $(".restaurent-product-detail").click(function(e) {
                if($(e.target).hasClass('fav-icon')) {
                    return false;
                }

                let product = $(this).data('detail');

                if(isNaN(product.price) || product.price == null) {
                    $("#modalTemporaryProduct").modal('show')
                    return;
                }

                $("#modalProductDetail .restaurant-id").val(product.restaurant_id)
                $("#modalProductDetail .menu-id").val(product.menu_id)
                $("#modalProductDetail .section-id").val(product.section_id)
                $("#modalProductDetail .product-id").val(product.id)

                $("#modalProductDetail .product-image").addClass('d-none')
                if(product.photo) {
                    $("#modalProductDetail .product-image").attr('src', product.photo)
                    $("#modalProductDetail .product-image").removeClass('d-none')
                }

                $("#modalProductDetail .product-name").text(product.name)
                $("#modalProductDetail .product-description").text(product.description)
                $("#modalProductDetail .product-price").text('Price: $' + product.price ? product.price : 0)

                if(product.extraOption) {
                    let options = '';
                    product.extraOption.forEach(item => {
                        options += '<label>'+ item.title +'</label>' +
                            '<select class="form-control mb-3" '+ (item.required ? 'required="required"' : '') +' onchange="resetProductPrice(this)">' +
                                '<option value="0">Choose...</option>';

                                item.data.forEach((option_item, index) => {
                                    options += '<option value="' +  (index + 1) + '" data-price="'+ (option_item.price ? option_item.price : 0) +'">' + option_item.tag + '(+$' + (option_item.price ? option_item.price : '0.00') + ')' +'</option>'
                                });

                        options += '</select>';
                    });

                    $("#modalProductDetail .product-options").html(options);
                }
                $("#modalProductDetail .btn-add-cart").data('price', (product.price ? product.price : 0))
                $("#modalProductDetail .btn-add-cart").text('Add to cart - $' + (product.price ? product.price : 0))

                $("#frmProductDetail")[0].reset()
                $("#modalProductDetail").modal('show')
            })

            $("#frmProductDetail").submit(function(e) {
                e.preventDefault()
                if($("#modalProductDetail .btn-add-cart span").length) return; // Processing

                var data = {
                    _token: "{{ csrf_token() }}",
                    restaurant_id: $(this).find('.restaurant-id').val(),
                    menu_id: $(this).find('.menu-id').val(),
                    section_id: $(this).find('.section-id').val(),
                    product_id: $(this).find('.product-id').val(),
                    message: $(this).find('.message').val()
                }

                var options = [];
                $("#modalProductDetail .product-options select").each((index, item) => {
                    if($(item).val() > 0) {
                        options.push({option_id: index + 1, option_data_id: $(item).val()})
                    }
                })

                Object.assign(data, { options: options});

                $("#modalProductDetail .btn-add-cart").prepend('<span class="spinner-border spinner-border-sm mb-1 mr-2" role="status" aria-hidden="true"></span>')

                $.ajax({
                    url: '{{ route("app.cart.add-item") }}',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        $("#modalProductDetail .btn-add-cart span").remove()
                        renderCart()

                        $("#modalProductDetail").modal('hide')
                    }
                });
            })

            $("#modalProductDetail .btn-add-cart").click(function(e) {
                e.preventDefault()
                $("#frmProductDetail").trigger('submit')
            })
        })
    </script>
@endpush

