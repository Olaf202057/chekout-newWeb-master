<!DOCTYPE html>
{{--Todo: Set this layout up from the other laravel project view--}}
<html lang="en">
<head>
    @yield('title')

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    @stack('meta')

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
    <link rel="apple-touch-icon-precomposed" href="#">
    <link rel="shortcut icon" href="#">
    @stack('icons')

    @stack('fonts')

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.bundle.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
<div class="header">
    <header class="full-width">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mainNavCol">
                    <!-- logo -->
{{--                    <div class="logo mainNavCol" style="width: 50px!important;">--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/menu.png" class="img-fluid" alt="Menu">--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="logo mainNavCol">
                        <a href="#">
                            <img src="img/logo.png" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <!-- logo -->
                    <div class="main-search mainNavCol">
                        <form class="main-search search-form full-width">
                            <div class="row">
                                <!-- location picker -->
                                <div class="col-lg-6-blank col-md-5">

                                </div>

                                <div class="col-lg-6-top col-md-5">
                                    <a href="#" class="delivery-add p-relative"> <span class="icon"><i
                                                class="fas fa-map-marker-alt"></i></span>
                                        <span class="address">Brooklyn, NY</span>
                                    </a>
                                    <div class="location-picker">
                                        <input type="text" class="form-control" placeholder="Enter a new address">
                                    </div>
                                </div>

                                <div class="col-lg-6-top col-md-5">
                                    <a href="#"> <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="address">Deliver Now</span>
                                    </a>
                                </div>
                                <!-- location picker -->
                                <!-- search -->
                                <div class="col-lg-6-search col-md-7">
                                    <div class="search-box padding-10">
                                        <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                                    </div>
                                </div>
                                <!-- search -->
                            </div>
                        </form>
                    </div>
                    @if(!Auth::user())
                        <div class="right-side fw-700 mainNavCol">
                            <div class="gem-points">
                                <a href="/checkout/login">
                                    <span>Sign In</span>
                                </a>
                            </div>

                            <!-- user cart -->
                        </div>
                    @endif
                    @if(Auth::user())
                        <div class="right-side fw-700 mainNavCol">
                            <div class="user-details p-relative">
                                <a href="#" class="text-light-white fw-500">
                                    <img src="img/user-1.png" class="rounded-circle" alt="userimg">
                                    <span>Hi, {{ Auth::user()->displayName }}</span>
                                </a>
                                <div class="user-dropdown">
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
                                    </ul>
                                    <div class="user-footer"><span class="text-light-black">Not Jhon?</span> <a
                                            href="/checkout/signout">Sign Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-sm-12 mobile-search">
                    <div class="mobile-address">
                        <a href="#" class="delivery-add" data-toggle="modal" data-target="#address-box"> <span
                                class="address">Brooklyn, NY</span>
                        </a>
                    </div>
                    <div class="sorting-addressbox"><span
                            class="full-address text-light-green">Brooklyn, NY 10041</span>
                        <div class="btns">
                            <div class="filter-btn">
                                <button type="button"><i class="fas fa-sliders-h text-light-green fs-18"></i>
                                </button>
                                <span class="text-light-green">Sort</span>
                            </div>
                            <div class="filter-btn">
                                <button type="button"><i class="fas fa-filter text-light-green fs-18"></i>
                                </button>
                                <span class="text-light-green">Filter</span>
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

<footer class="section-padding bg-light-theme pt-0 u-line bg-black">

    <div class="container-fluid-footer">
        <div class="row">
            <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                <div class="footer-contact">
                    <h6 class="text-custom-white">Need Help</h6>
                    <ul>
                        <li class="fw-600"><span class="text-light-white">Call Us</span> <a href="tel:"
                                                                                            class="text-custom-white">+(347)
                                123 456 789</a>
                        </li>
                        <li class="fw-600"><span class="text-light-white">Email Us</span> <a href="mailto:"
                                                                                             class="text-custom-white">demo@domain.com</a>
                        </li>
                        <li class="fw-600"><span class="text-light-white">Join our twitter</span> <a href="#"
                                                                                                     class="text-custom-white">@foodmart</a>
                        </li>
                        <li class="fw-600"><span class="text-light-white">Join our instagram</span> <a href="#"
                                                                                                       class="text-custom-white">@foodmart</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-custom-white">Get to Know Us</h6>
                    <ul>
                        <li><a href="#" class="text-light-white fw-600">About Us</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Blog</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Socialize</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">foodmart</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Perks</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-custom-white">Let Us Help You</h6>
                    <ul>
                        <li><a href="#" class="text-light-white fw-600">Account Details</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Order History</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Find restaurant</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Login</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Track order</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-custom-white">Doing Business</h6>
                    <ul>
                        <li><a href="#" class="text-light-white fw-600">Suggest an Idea</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Be a Partner restaurant</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Create an Account</a>
                        </li>
                        <li><a href="#" class="text-light-white fw-600">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-custom-white">Download Apps</h6>
                    <div class="appimg">
                        <a href="#">
                            <img src="img/google.png" class="img-fluid" alt="app logo">
                        </a>
                    </div>
                    <div class="appimg">
                        <a href="#">
                            <img src="img/apple.png" class="img-fluid" alt="app logo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                <div class="footer-contact">
                    <h6 class="text-custom-white">Newsletter</h6>
                    <form class="subscribe_form">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-submit" name="email"
                                   placeholder="Enter your email">
                            <span class="input-group-btn">
                      <button class="btn btn-second btn-submit" type="button"><i
                              class="fas fa-paper-plane"></i></button>
                 </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="ft-social-media">
                    <h6 class="text-center text-light-black">Follow us</h6>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="payment-logo mb-md-20"><span class="text-light-white fs-14 mr-3">We are accept</span>
                    <div class="payemt-icon">
                        <img src="img/cards/visa.jpg" alt="#">
                        <img src="img/cards/mastercard.png" alt="#">
                        <img src="img/cards/card-front.jpg" alt="#">
                        <img src="img/cards/amex-card-front.png" alt="#">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center medewithlove align-self-center">
                <a href="http://www.Slidesigma.com" class="text-custom-white">Made with Real <i
                        class="fas fa-heart"></i> Slidesigma</a>
            </div>
            <div class="col-lg-4">
                <div class="copyright-text"><span class="text-light-white">© <a href="#" class="text-light-white">Slidesigma</a> - 2020 | All Right Reserved</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
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
<div class="modal fade" id="search-box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="search-box p-relative full-width">
                    <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                </div>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
<script src="{{ mix('js/app.bundle.js') }}"></script>

@stack('scripts')
</body>
</html>
