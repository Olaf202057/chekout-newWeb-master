@extends('layouts.base')
<!-- Navigation -->
@section('body')
        <!-- Navigation -->
    <div class="container-fluid pl-0 pr-0">
        <div class="bs-canvas bs-canvas-left position-fixed bg-light h-100">
            <header class="bs-canvas-header p-3 bg-white">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true" class="text-dark">&times;</span></button>
            </header>
            {{-- <div class="bs-canvas-content px-3 py-5">
                <div class="card mb-5">
                    <img src="{{ asset('img/user.png') }}" class="img-fluid" alt="Logo" style="width:50px;">
                </div>
                <div class="card mb-5">
                    <div class="card-header">
                        Example Card
                    </div>
                    <div class="card-body">
                        Text Here
                    </div>
                </div>

            </div> --}}
            <div class="bs-canvas-content px-3 py-5" style="height: 90%; display:flex; flex-direction:column">
                <input type="hidden" id="current_lat" value="">
                        <input type="hidden" id="current_lng" value="">
                @if($user)
                <div class="menu_top">
                    <div class="menu_top_user">
                        <img src="{{ asset('img/user.jfif') }}" class="img-fluid" alt="Logo" style="width:60px;height:60px;">
                        <div class="menu_top_user_btns">
                            <span>Dave</span>
                            <a href="{{ route('app.user.account.show') }}"><span>View account</span></a>
                        </div>
                    </div>
                    <div class="menu_top_items">
                        <ul>
                            <li>
                                <div class="menu_top_item">
                                    <i class="fas fa-receipt"></i>
                                    <a href="{{ route('app.user.orders.past') }}"><span>Orders</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="menu_top_item">
                                    <i class="fas fa-heart"></i>
                                    <a href="{{ route('app.user.favorite.show') }}"><span>Favorites</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="menu_top_item">
                                    <i class="fas fa-wallet"></i>
                                    <a href="{{ route('app.user.wallet.show') }}"><span>Wallet</span></a>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="menu_top_signout">

                        <a><span>Sign Out</span></a>

                    </div>
                </div>
                @else
                <div class="menu_top">
                    <div class="menu_signin">
                        <Button type="button" onclick="location.href='{{route('auth.login')}}';">Sign In</Button>
                    </div>
                </div>
                @endif
                <hr>
                <div class="menu_bottom">
                    <div class="menu_create_items">
                        
                        <a href="{{ route('app.restaurant.show-register') }}"><span>Add your restaurant</span></a>

                    </div>
                    <div class="menu_mobile_info">
                        <img src="{{ asset('img/app-icon.png') }}" class="img-fluid" alt="Logo">
                        <p>There's more to love in <br>the app.</p>
                    </div>
                    <div class="menu_mobile_app">
                        <button onclick="window.open('https://apps.apple.com/us/app/order-chekout/id1540173746','');"><i class="fab fa-apple"></i><span>iPhone<span></button>
                        <button onclick="window.open('https://play.google.com/store/apps/details?id=com.orderchekout.vendor.android','');"><i class="fab fa-android"></i><span>Android<span></button>
                    </div>
                </div>

                <div class="menu_bottom" style="margin-top: auto;">
                    <div class="menu_top_items">
                        <ul>
                            <li>
                                <div class="menu_top_item">
                                    <i class="fas fa-question-circle"></i>
                                    <a href="#"><span id="show_help">Concierge</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_create_items">
                        <a><span style="font-size:14px; color:green">Conciege Service: &nbsp855-535-0404</span></a>
                        <a><span style="font-size:14px; color:green">Service Available: &nbsp5:00 AM to Midnight</span></a>

                    </div>
                </div>
            </div>
        </div>

        <main>
            <div class="header">
                <header class="full-width">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mainNavCol">
                                <!-- logo -->
                                <div class="logo mainNavCol">
                                    <button class="navbar-toggler pull-bs-canvas-left" type="button" data-target="#sidebar" data-toggle="collapse"><i class="fas fa-bars"></i></button>
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Logo">
                                    </a>
                                </div>
                                <!-- logo -->
                                <div class="main-search mainNavCol">
                                    <form class="main-search search-form full-width">
                                        <div class="row">

                                            <!-- location picker -->
                                            <div class="col-lg-5 col-md-5 ml-4">
                                                <a href="#" class="delivery-add p-relative"> <span class="icon"><i
                                                            class="fas fa-map-marker-alt"></i></span>
                                                    <span class="address">Brooklyn, NY</span>
                                                </a>
                                                <div class="location-picker">
                                                    <input type="text" class="form-control" placeholder="Enter a new address" id="searchInput" autocomplete="false" >
                                                </div>
                                            </div>
                                            <!-- location picker -->
                                            <!-- search -->
                                            {{--<div class="col-lg-5 col-md-5">
                                                <div class="dropdown search-box">
                                                    <input type="text" class="form-control"
                                                           placeholder="Pizza, Burger, Chinese" id="search-box"
                                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                                         id="search-list" style="border-radius: 0;">
                                                        <a class="dropdown-item" href="http://google.com">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>--}}
                                            <!-- search -->
                                        </div>
                                    </form>
                                </div>
                                <div class="right-side fw-700 mainNavCol">
                                {{--                            <div class="gem-points">--}}
                                {{--                                <a href="#"> <i class="fas fa-concierge-bell"></i>--}}
                                {{--                                    <span>Order Now</span>--}}
                                {{--                                </a>--}}
                                {{--                            </div>--}}
                                <!-- mobile search -->
                                    <div class="mobile-search">
                                        <a href="#" data-toggle="modal" data-target="#search-box"> <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                    <!-- mobile search -->
                                    <!-- user account -->
                                    @if($user)
                                        <div class="user-details p-relative">
                                            <a href="#" class="text-light-white fw-500">
                                                <img src="https://via.placeholder.com/30" class="rounded-circle" alt="userimg">
                                                <span>Hi, {{ isset($user['displayName']) && $user['displayName'] != '' ? $user['displayName'] : $user['email']}}</span>
                                            </a>
                                            <div class="user-dropdown">
                                                {{--
                                                <ul>
                                                    <li>
                                                        <a href="order-details.html">
                                                            <div class="icon"><i class="flaticon-rewind"></i>
                                                            </div>
                                                            <span class="details">Past Orders</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="order-details.html">
                                                            <div class="icon"><i class="flaticon-takeaway"></i>
                                                            </div>
                                                            <span class="details">Upcoming Orders</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="icon"><i class="flaticon-breadbox"></i>
                                                            </div>
                                                            <span class="details">Saved</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="icon"><i class="flaticon-gift"></i>
                                                            </div>
                                                            <span class="details">Gift cards</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="icon"><i class="flaticon-refer"></i>
                                                            </div>
                                                            <span class="details">Refer a friend</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="icon"><i class="flaticon-diamond"></i>
                                                            </div>
                                                            <span class="details">Perks</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="icon"><i class="flaticon-user"></i>
                                                            </div>
                                                            <span class="details">Account</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="icon"><i class="flaticon-board-games-with-roles"></i>
                                                            </div>
                                                            <span class="details">Help</span>
                                                        </a>
                                                    </li>
                                                </ul>--}}
                                                <div class="user-footer"><span class="text-light-black">Not now?</span>
                                                    <form action="{{ route('auth.logout') }}" method="POST">
                                                        @csrf
                                                        <button class="text-orange">Sign Out</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="gem-points">
                                            <a href="{{ route('auth.login') }}"> <i class="fas fa-user"></i>
                                                <span>Sign In</span>
                                            </a>
                                        </div>
                                @endif
                                <!-- mobile search -->
                                    <!-- user notification -->
                                    {{--
                                    <div class="cart-btn notification-btn">
                                        <a href="#" class="text-dark fw-700"> <i class="fas fa-bell"></i>
                                            <span class="user-alert-notification"></span>
                                        </a>
                                        <div class="notification-dropdown">
                                            @if(isset($notifications) && $notifications->count() > 0)
                                                @foreach($notifications as $notification)
                                                    <div class="item">
                                                        <div class="product-detail">
                                                            <a href="#">
                                                                <div class="img-box">
                                                                    <img src="https://via.placeholder.com/50x50" class="rounded"
                                                                         alt="image">
                                                                </div>
                                                                <div class="product-about">
                                                                    <p class="text-light-black">Lil Johnny’s</p>
                                                                    <p class="text-light-white">Spicy Maxican Grill</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="rating-box">
                                                            <p class="text-light-black">How was your last order ?.</p> <span
                                                                class="text-dark-white"><i class="fas fa-star"></i></span>
                                                            <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                                            <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                                            <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                                            <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                                            <cite class="text-light-white">Ordered 2 days ago</cite>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="item mt-3">
                                                    <div class="product-detail">
                                                        <div class="alert">
                                                            No new notifications.
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>--}}
                                    <!-- user notification -->
                                    <!-- user cart -->
                                    <div class="cart-btn cart-dropdown">
                                        <a href="#" class="text-dark fw-700"> <i class="fas fa-shopping-bag"></i>
                                            <span class="user-alert-cart">0</span>
                                        </a>
                                        <div class="cart-detail-box">
                                            <div class="card">
                                                <div class="card-header padding-15">{{ $cart->vendor_name ?? 'Your orders' }}</div>
                                                <div class="card-body no-padding">
                                                    <div class="item-total border-top">
                                                        <div class="padding-15 d-flex justify-content-between">
                                                            <div>
                                                                <span class="fw-700">Total:</span>
                                                                <span class="fw-700 total-price">$0</span>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-danger" onclick="emptyCart()">Empty cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-dark-white text-center my-4 no-items">No order</h6>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="{{ route('app.checkout.index')}}" class="btn btn-block btn-add-cart">
                                                        Checkout
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- user cart -->
                                </div>
                            </div>
                            <div class="col-sm-12 mobile-search">
                                <div class="mobile-address">
                                    <a href="#" class="delivery-add" data-toggle="modal" data-target="#address-box"> <span
                                            class="address">Brooklyn, NY</span>
                                    </a>
                                </div>
                                <div class="sorting-addressbox"><span
                                        class="full-address text-dark">Brooklyn, NY 10041</span>
                                    <div class="btns">
                                        <div class="filter-btn">
                                            <button type="button"><i class="fas fa-sliders-h text-dark fs-18"></i>
                                            </button>
                                            <span class="text-dark">Sort</span>
                                        </div>
                                        <div class="filter-btn">
                                            <button type="button"><i class="fas fa-filter text-dark fs-18"></i>
                                            </button>
                                            <span class="text-dark">Filter</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <div class="main-sec"></div>
            @yield('content')
        </main>
    <!-- modal boxes -->
        <div class="modal fade" id="address-box">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title fw-700">Change Address</h4>
                    </div>
                    <div class="modal-body">
                        <div class="location-picker">
                            <input type="text" class="form-control" placeholder="Enter a new address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="section-padding bg-light-theme pt-0 u-line bg-black">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-12 offset-5" style="margin-left:0px!important">
                        <div class="row" style="display:flex; justify-content:center;">

                            <div class="col-12 col-sm-2 text-center">
                                <div class="footer-links">
                                    <h6 class="text-custom-white">Download Apps</h6>
                                    <div class="appimg">
                                        <a href="#">
                                            <img src="{{ asset('img/app-store-badge.png') }}" class="img-fluid"
                                                 alt="app logo" style="width: 150px;">
                                        </a>
                                    </div>
                                    <div class="appimg">
                                        <a href="#">
                                            <img src="{{asset('img/google-play-badge.png')}}" class="img-fluid"
                                                 alt="app logo" style="width: 150px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copyright bg-black">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="payment-logo mb-md-20">
                            <div class="payemt-icon">
                                <img src="{{ asset('img/cards/visa.jpg') }}" alt="#">
                                <img src="{{ asset('img/cards/mastercard.png') }}" alt="#">
                                <img src="{{ asset('img/cards/card-front.jpg') }}" alt="#">
                                <img src="{{ asset('img/cards/amex-card-front.png') }}" alt="#">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center medewithlove align-self-center">
                        <a href="http://www.Slidesigma.com" class="text-custom-white"><img src="{{ asset('img/logo.png') }}"
                                                                                           alt="chekout logo"></a>
                    </div>
                    <div class="col-lg-4">
                        <div class="copyright-text"><span class="text-light-white">© <a href="#" class="text-light-white">Chekout</a> - 2020 | All Rights Reserved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('app.user.help')
@endsection

@push('scripts')


    <script>
        $(document).ready(function () {

            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5fc852b9920fc91564ccf353/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            
           
  
    
   
  
            if ("geolocation" in navigator){ //check geolocation available
	            
	           
                navigator.geolocation.getCurrentPosition(function(position){
            
                    var url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyC1jKOFLhfQoZD3xJISSPnSW9-4SyYPpjY&location_type=ROOFTOP&result_type=street_address&latlng='+position.coords.latitude+','+position.coords.longitude;
                    // $(".address").text("nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
                    $.ajax({
                        url: url,
                        type:'GET',
                        success:function(result){
                            console.log("ttttt");
                            var val = result['results'][0]['formatted_address'].split(',');
                             var setuplocation = getCookie("setuplocation");
                             if (setuplocation == "") {
                                setCookie("setuplocation", val[0], 365);
                              $(".address").text(val[0]);
                             }else{
                                 $(".address").text(setuplocation);
                             }
                        },
                        error:function(error){
                            console.log(error);
                        }
                    });
                });
                
                
            }


            $(document).on('click', '.pull-bs-canvas-right, .pull-bs-canvas-left', function(){
                $('body').prepend('<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
                if($(this).hasClass('pull-bs-canvas-right'))
                    $('.bs-canvas-right').addClass('mr-0');
                else
                    $('.bs-canvas-left').addClass('ml-0');
                return false;
            });

            $(".menu_top_item").on("click", "#show_help", function() {
                var elm = $('.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                var options = {
                    'backdrop': 'static'
                };

                $('#help-modal').modal(options)
            });

            $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function(){
                var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $('.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                return false;
            });
            $('#search-box').on('keyup', debounce(function () {
                if ($('#search-box').val() == '') {
                    $('#search-list').dropdown('hide');
                }
                $.post('/searchbox', {
                        _token: '{{ csrf_token() }}',
                        searchTerm: $('#search-box').val(),
                    }, "json"
                )
                    .done(function (data) {
                        console.log(data);
                        if (data.length > 0) {
                            data.forEach(function (item) {
                                var link = null;
                                if (item.type === 'restaurant') {
                                    link = '/restaurant/' + item.type_id;
                                } else if (item.type === 'product') {
                                    link = '/restaurant/' + item.type_id;
                                }
                                $('#search-list').empty();
                                $('#search-list').append('<a href="' + link + '" class="dropdown-item" >' + item.name + '</a>');
                                $('.dropdown-toggle').dropdown('open');
                            });
                        } else {
                            $('#search-list').append('<a class="dropdown-item" href="">No Results</a>');
                        }
                    })
            }, 500));

            function debounce(func, wait, immediate) {
                var timeout;
                return function () {
                    var context = this, args = arguments;
                    var later = function () {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    };
                    var callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
                };
            }
        });

        const removeCartItem = (product_id) => {
            window.event.preventDefault()

            var data = {
                _token: "{{ csrf_token() }}",
                product_id
            }

            $.ajax({
                url: '{{ route("app.cart.remove-item") }}',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(result) {
                    renderCart()
                }
            })
        }

        const emptyCart = () => {
            window.event.preventDefault()

            var data = {
                _token: "{{ csrf_token() }}",
            }

            $.ajax({
                url: '{{ route("app.cart.remove-all") }}',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(result) {
                    renderCart()
                }
            })
        }

        const renderCart = () => {
            $.ajax({
                url: '{{ route("app.cart.get-data") }}',
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    if(Object.keys(result).length) {
                        $(".cart-btn.cart-dropdown .cart-detail-box .card-body .item-total").removeClass('d-none')
                        $(".cart-btn.cart-dropdown .cart-detail-box .card-body .no-items").addClass('d-none')
                    } else {
                        $(".cart-btn.cart-dropdown .cart-detail-box .card-body .item-total").addClass('d-none')
                        $(".cart-btn.cart-dropdown .cart-detail-box .card-body .no-items").removeClass('d-none')
                    }

                    $(".cart-btn.cart-dropdown .user-alert-cart").text(Object.keys(result).length)

                    var list = '';
                    var total_price = 0;
                    
                    for (const [key, item] of Object.entries(result)) {
                        list += '<div class="cat-product-box border-bottom-1">' +
                            '<div class="cat-product pb-1">' +
                                '<div class="d-flex justify-content-between">' +
                                    '<div class="cat-name text-dark">' +
                                        '<span class="text-dark-white mr-2">' + item.quantity + ' ×</span>' +
                                        item.name +
                                    '</div>' +
                                    '<div class="price ml-2">$' + parseFloat(item.item_price).toFixed(2) + '</div>' +
                                '</div>' +
                                '<div class="item-options ml-4">' +
                                    '<div class="option">';
                                    
                                    item.options.forEach(function(option) {
                                        list += '<div class="name limit-line-2 text-light-white">•' + option.name + '</div>';
                                        if(!isNaN(option.price) && option.price != null && option.price)
                                            list += '<div class="price ml-2">+$' + option.price + '</div>';
                                    })

                        list +=     '</div>' +
                                '</div>' +
                                '<div class="message text-light-white ml-3">' + item.message + '</div>'+
                            '</div>' +
                            '<p class="text-center text-danger font-weight-bold" style="cursor: pointer" onclick="removeCartItem(\'' + item.id + '\')"> Remove </p>' +
                        '</div>';

                        total_price = parseFloat(total_price) + parseFloat(item.total_price)
                    }

                    $(".cart-btn.cart-dropdown .cart-detail-box .card-body .cat-product-box").remove();
                    $(".cart-btn.cart-dropdown .cart-detail-box .card-body").prepend(list);

                    $(".cart-btn.cart-dropdown .cart-detail-box .item-total .total-price").text('$' + total_price.toFixed(2))
                }
            });
        }

        $(function() {
            renderCart();
            var inputa = document.getElementById('searchInput');
            var autocompletea = new google.maps.places.Autocomplete(inputa);
            autocompletea.addListener('place_changed', function() {
                var placea = autocompletea.getPlace();
                var valff = placea.formatted_address.split(',');
                 setCookie("setuplocation", valff[0], 365);
                  $(".address").text(valff[0]);
                  $(".location-picker").toggleClass("open");
                    $(".delivery-add").toggleClass("open");
            });
        })
       function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires="+d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    
    function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
    </script>
    <style>
        .location-picker{
            width:100%;
        }
    </style>
@endpush
