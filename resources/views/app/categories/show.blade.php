@extends('layouts.app')
@section('title')
    <title>Chekout | Categories</title>
@endsection

@section('content')
    <div class="most-popular section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-1 browse-cat border-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header-left">
                                <h3 class="text-light-black header-title title-2">{{$categoryName}}</h3>
                            </div>
                        </div>
                        @if($vendors->count() > 0)
                            <div class="col-12">
                                @foreach($vendors as $vendor)
                                    <div class="product-list-view">
                                        <div class="product-list-info">
                                            <div class="product-list-img">
                                                <a href="{{ route('app.restaurant.show', ['id' => $vendor['vendor_id']]) }}">
                                                    <img
                                                        src="{{ $vendor['logo_url'] ?? 'https://via.placeholder.com/90' }}"
                                                        class="img-fluid" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-right-col">
                                            <div class="product-list-details">
                                                <div class="product-list-title">
                                                    <div class="product-info">
                                                        <h6> <a href="{{ route('app.restaurant.show', ['id' => $vendor['vendor_id']]) }}">{{ $vendor['name'] ?? 'Restaurant' }}</a>

                                                        </h6>
                                                        {{--                                                        Todo: Description of Restaurant--}}
                                                        <p class="text-light-white fs-12">{{$vendor['brief_description'] ?? 'Restaurant' }}</p>
                                                    </div>
                                                </div>
                                                <div class="product-detail-right-box">
{{--                                                    <div class="product-list-rating text-center">--}}
{{--                                                        <div class="ratings"><span class="text-yellow"><i--}}
{{--                                                                    class="fas fa-star"></i></span>--}}
{{--                                                            <span class="text-yellow"><i class="fas fa-star"></i></span>--}}
{{--                                                            <span class="text-yellow"><i class="fas fa-star"></i></span>--}}
{{--                                                            <span class="text-yellow"><i class="fas fa-star"></i></span>--}}
{{--                                                            <span class="text-yellow"><i--}}
{{--                                                                    class="fas fa-star-half-alt"></i></span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="rating-text">--}}
{{--                                                            <p class="text-light-white fs-12">3845 ratings</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="product-list-tags">
                                                    </div>
                                                    {{--                                                    Todo: Price Range --}}
                                                    <div class="product-price-icon">
                                                        <span
                                                            class="text-{{ isset($vendor['price']) && $vendor['price'] > 0 ? 'success' : 'dark-white' }} fs-16">$</span>
                                                        <span
                                                            class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 1 ? 'success' : 'dark-white' }} fs-16">$</span>
                                                        <span
                                                            class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 2 ? 'success' : 'dark-white' }} fs-16">$</span>
                                                        <span
                                                            class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 3 ? 'success' : 'dark-white' }} fs-16">$</span>
                                                        <span
                                                            class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 4 ? 'success' : 'dark-white' }} fs-16">$</span>
                                                    </div>
                                                    <div class="product-list-label">
                                                    </div>
                                                    <div class="product-list-price">
                                                        <div class="price">
                                                            <h6 class="text-light-black no-margin">$0</h6>
                                                            <span class="text-light-white">Minimum</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="product-list-bottom">--}}
{{--                                                <div class="product-list-type">--}}
{{--                                                </div>--}}
{{--                                                <div class="mob-tags-label">--}}
{{--                                                </div>--}}
{{--                                                <div class="product-list-time">--}}
{{--                                                    <ul>--}}
{{--                                                        <li class="text-light-white">{{$vendor['prep_min'] ?? '0'}}--}}
{{--                                                            mins--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="col-12">
                                <div class="alert alert-info">
                                    We don't have any restaurants in this category yet. Check back soon!
                                </div>
                            </div>
                        @endif
                    </div>
                    <section class="browse-cat u-line section-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-header-left">
                                        <h3 class="text-light-black header-title title">Browse by cuisine
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="category-slider swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($categories as $category)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('app.category.show', ['id' => $category['category_id']])}}"
                                                       class="categories">
                                                        <div class="icon text-custom-white bg-light-green ">
                                                            <img src="{{ $category['photo'] }}"
                                                                 class="rounded-circle" alt="categories">
                                                        </div>
                                                        <span
                                                            class="text-light-black cat-name">{{ $category['title'] }}</span>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Browse by category -->

@endsection
