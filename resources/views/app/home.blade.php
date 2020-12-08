@extends('layouts.app')

@section('title')
    <title>Chekout</title>
@endsection

@section('content')
    <!-- slider -->

    <section class="about-us-slider swiper-container p-relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-item">
                <img src="{{ asset('/img/processed.jpeg') }}" class="img-fluid full-width" alt="Banner">
                <div class="transform-center">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 align-self-center">
                                <div class="right-side-content">
                                    <h1 class="text-custom-white fw-600">Crave it? Get it.</h1>
                                    <h3 class="text-custom-white fw-400">Search for a favorite restaurant, cuisine, or
                                        dish.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay overlay-bg"></div>
            </div>
        </div>
        {{--        <!-- Add Arrows -->--}}
        {{--        <div class="swiper-button-next"></div>--}}
        {{--        <div class="swiper-button-prev"></div>--}}
    </section>
    <!-- slider -->
    <!-- Browse by category -->
    <section class="browse-cat u-line section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Browse by cuisine</h3>
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
    <!-- Browse by category -->
    <!-- your previous order -->
    {{-- <section class="recent-order section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Your previous orders <span class="fs-14"><a
                                    href="{{ route('app.user.orders.past') }}">See all past orders</a></span></h3>
                    </div>
                </div>
                @if(isset($prevOrders) && $prevOrders->count() > 0)
                    @foreach($prevOrders as $order)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="product-box mb-md-20">
                                <div class="product-img">
                                    <a href="restaurant.html">
                                        <img src="https://via.placeholder.com/255x104" class="img-fluid full-width"
                                             alt="product-img">
                                    </a>
                                </div>
                                <div class="product-caption">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">
                                            Chilli
                                            Chicken Pizza</a></h6>
                                    <p class="text-light-white">Big Bites, Brooklyn</p>
                                    <div class="product-btn">
                                        <a href="order-details.html"
                                           class="btn-first white-btn full-width text-dark fw-600">Track
                                            Order</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info">
                            You haven't ordered anything yet.
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section> --}}
    <!-- your previous order -->
    <!-- Explore collection -->
    <section class="ex-collection section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Restaurants Near You</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row" id="restaurant-list">
                        <input type="hidden" id="current_lat" value="">
                        <input type="hidden" id="current_lng" value="">
                        @if(isset($nearby) && $nearby->count() > 0)
                            @foreach($nearby as $restaurant)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product-box mb-xl-20 b-" onclick="location.href='{{route('app.restaurant.show', ['id' => $restaurant['vendor_id'] ?? ''])}}';" style="cursor:pointer;">
                                        <div class="product-img">
                                            <a href="">
                                                <img
                                                    src="{{$restaurant['photo'] ?? 'https://via.placeholder.com/255x150'}}"
                                                    class="img-fluid full-width"
                                                    alt="product-img" style="height:150px;">
                                            </a>
                                            <div class="overlay">
                                                <div class="product-tags padding-10">
                                                    <div class="custom-tag">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$restaurant['latitude']}}">
                                        <input type="hidden" value="{{$restaurant['longitude']}}">
                                        <input type="hidden" value="{{$restaurant['prep_min']}}">
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title" style="font-weight:bold"><a
                                                        href="{{route('app.restaurant.show', ['id' => $restaurant['vendor_id'] ?? ''])}}"
                                                        class="text-light-black ">{{ $restaurant['name'] ?? '' }}
                                                    </a></h6>
                                                <div class="tags">
                                                </div>
                                            </div>
                                            <p class="text-light-black" style="display:inline; margin-right:30px;">{{ $restaurant['description'] ?? '' }}</p>
                                            <div class="product-details">
                                                <div class="price-time"><span
                                                        class="text-light-white time">{{ explode(',',$restaurant['address'])[0] ?? '' }}</span>
                                                    <span
                                                        class="text-light-white price">{{ $restaurant['min_order'] ?? '' }}</span>
                                                </div>
                                                {{--                                                <div class="rating"> <span>--}}
                                                {{--                        <i class="fas fa-star text-yellow"></i>--}}
                                                {{--                        <i class="fas fa-star text-yellow"></i>--}}
                                                {{--                        <i class="fas fa-star text-yellow"></i>--}}
                                                {{--                        <i class="fas fa-star text-yellow"></i>--}}
                                                {{--                        <i class="fas fa-star text-yellow"></i>--}}
                                                {{--                      </span>--}}
                                                {{--                                                    <span class="text-light-white text-right">4225 ratings</span>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                            <div class="product-footer">
                                                 <span
                                                     class="text-{{ isset($vendor['price']) && $vendor['price'] > 0 ? 'success' : 'dark-white' }} fs-16" style="color:black; font-size:12px;">$</span>
                                                <!--<span-->
                                                <!--    class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 1 ? 'success' : 'dark-white' }} fs-16">$</span>-->
                                                <!--<span-->
                                                <!--    class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 2 ? 'success' : 'dark-white' }} fs-16">$</span>-->
                                                <!--<span-->
                                                <!--    class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 3 ? 'success' : 'dark-white' }} fs-16">$</span>-->
                                                <!--<span-->
                                                <!--    class="text-{{ isset($vendor['price']) &&  $vendor['price'] > 4 ? 'success' : 'dark-white' }} fs-16">$</span>-->
                                                {{--                                                <span class="text-custom-white square-tag">--}}
                                                {{--                      <img src="/img/svg/004-leaf.svg" alt="tag">--}}
                                                {{--                    </span>--}}
                                                {{--                                                <span class="text-custom-white square-tag">--}}
                                                {{--                      <img src="/img/svg/006-chili.svg" alt="tag">--}}
                                                {{--                    </span>--}}
                                                {{--                                                <span class="text-custom-white square-tag">--}}
                                                {{--                      <img src="/img/svg/005-chef.svg" alt="tag">--}}
                                                {{--                    </span>--}}
                                                {{--                                                <span class="text-custom-white square-tag">--}}
                                                {{--                      <img src="/img/svg/008-protein.svg" alt="tag">--}}
                                                {{--                    </span>--}}
                                                {{--                                                <span class="text-custom-white square-tag">--}}
                                                {{--                      <img src="/img/svg/009-lemon.svg" alt="tag">--}}
                                                {{--                    </span>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="alert alert-primary">
                                    No restaurants near you.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{--            <div class="row">--}}
            {{--                <div class="col-md-6">--}}
            {{--                    <div class="ex-collection-box mb-sm-20">--}}
            {{--                        <img src="https://via.placeholder.com/540x300" class="img-fluid full-width" alt="image">--}}
            {{--                        <div class="category-type overlay padding-15"><a href="restaurant.html" class="category-btn">Top--}}
            {{--                                rated</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-md-6">--}}
            {{--                    <div class="ex-collection-box">--}}
            {{--                        <img src="https://via.placeholder.com/540x300" class="img-fluid full-width" alt="image">--}}
            {{--                        <div class="category-type overlay padding-15"><a href="restaurant.html" class="category-btn">Top--}}
            {{--                                rated</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </section>
    <!-- Explore collection -->
    <!-- footer -->
    {{--    <div class="footer-top section-padding bg-black">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">--}}
    {{--                    <div class="icon-box"><span class="text-dark"><i class="flaticon-credit-card-1"></i></span>--}}
    {{--                        <span class="text-custom-white">100% Payment<br>Secured</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">--}}
    {{--                    <div class="icon-box"><span class="text-dark"><i class="flaticon-wallet-1"></i></span>--}}
    {{--                        <span class="text-custom-white">Support lots<br> of Payments</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">--}}
    {{--                    <div class="icon-box"><span class="text-dark"><i class="flaticon-help"></i></span>--}}
    {{--                        <span class="text-custom-white">24 hours / 7 days<br>Support</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-2 col-sm-4 col-6">--}}
    {{--                    <div class="icon-box"><span class="text-dark"><i class="flaticon-truck"></i></span>--}}
    {{--                        <span class="text-custom-white">Free Delivery<br>with $50</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-2 col-sm-4 col-6">--}}
    {{--                    <div class="icon-box"><span class="text-dark"><i class="flaticon-guarantee"></i></span>--}}
    {{--                        <span class="text-custom-white">Best Price<br>Guaranteed</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-2 col-sm-4 col-6">--}}
    {{--                    <div class="icon-box"><span class="text-dark"><i class="flaticon-app-file-symbol"></i></span>--}}
    {{--                        <span class="text-custom-white">Mobile Apps<br>Ready</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

@push('scripts')
    <script>
        
        $(document).ready(function () {
            if ("geolocation" in navigator){ //check geolocation available
	            function myFunction(item) {
                    var latitude = parseFloat($(item).children().eq(0).children().eq(1).val());
                    var longitude = parseFloat($(item).children().eq(0).children().eq(2).val());
                    var current_lat = parseFloat($('#current_lat').val());
                    var current_lng = parseFloat($('#current_lng').val());
                    var prep_time = $(item).children().eq(0).children().eq(3).val();
                    //var timeurl = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='+current_lat+','+current_lng+'&destinations='+latitude+','+longitude+'&&key=AIzaSyC1jKOFLhfQoZD3xJISSPnSW9-4SyYPpjY';
                   
                   
                   console.log(current_lat);
                   const origin1 = { lat: current_lat, lng: current_lng };
                   const dest1 = {lat: latitude,lng: longitude};
                   
                   var service = new google.maps.DistanceMatrixService();  
                    service.getDistanceMatrix({
                      origins: [origin1],
                      destinations: [dest1],
                      travelMode: google.maps.TravelMode.DRIVING,
                     },function(response){
                         //console.log(response);
                        $(item).find("div.product-footer").children().eq(0).text("Delivery Time: "+response['rows'][0]['elements'][0]['duration']['text']+" + "+prep_time+"mins");     
                     });
                    
                }
	            
                navigator.geolocation.getCurrentPosition(function(position){
                    console.log("Found your location \nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
                    $("#current_lat").val(position.coords.latitude.toString());
                    $("#current_lng").val(position.coords.longitude.toString());
                    var url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyC1jKOFLhfQoZD3xJISSPnSW9-4SyYPpjY&location_type=ROOFTOP&result_type=street_address&latlng='+position.coords.latitude+','+position.coords.longitude;
                    // $(".address").text("nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
                    $.ajax({
                        url: url,
                        type:'GET',
                        success:function(result){
                            console.log(result['results'][0]['formatted_address']);
                            
                            var val = result['results'][0]['formatted_address'].split(',');
                          //  $(".address").text(val[0]);
                        },
                        error:function(error){
                            console.log(error);
                        }
                    });
                    var lists = $("#restaurant-list").children("div.col-lg-4").toArray();
                    lists.forEach(myFunction);
                });
                
                
            }


           // var lists = $("#restaurant-list").children("div.col-lg-4").toArray();
            //lists.forEach(myFunction);
        });
    </script>
    <style>
        .header .search-form span.address{
            min-width:250px;
        }
    </style>
@endpush

