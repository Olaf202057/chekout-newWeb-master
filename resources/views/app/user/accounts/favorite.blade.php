@extends('layouts.app')

@section('title')
    <title>Chekout</title>
@endsection

@section('content')
    <!-- slider -->

<section class="favorite_content">
    @if($favorites==null)
    <div class="favorite_body">
        <img src="{{ asset('img/nofavorite.png') }}" class="img-fluid" alt="food">
        <h3>No favorites yet</h3>
        <span>Restaurants you rate highly will appear hear. </span>
        <Button id="find_food"><span>Find Food</span></Button>
    </div>
    @else
    <section class="ex-collection section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Your Favorites</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row" id="restaurant-list">

                        @foreach($favorites as $favorite)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20 b-"  style="cursor:pointer;">
                                <div class="product-img">
                                    <a href="">
                                        <img
                                            src="https://via.placeholder.com/255x150"
                                            class="img-fluid full-width"
                                            alt="product-img" style="height:100%;">
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10">
                                            <div class="custom-tag">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title" style="font-weight:bold"><a
                                                href="#"
                                                class="text-light-black ">Test Restaurant
                                            </a></h6>
                                        <div class="tags">
                                        </div>
                                    </div>
                                    <p class="text-light-black" style="display:inline; margin-right:30px;">Best Restaurant in New York</p>
                                    <div class="product-details">
                                        <div class="price-time"><span
                                                class="text-light-white time">Brooklyn New York</span>
                                            <span
                                                class="text-light-white price">100</span>
                                        </div>
                                    </div>
                                    <div class="product-footer">
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
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

</section>




@endsection

@push('scripts')

    <script>
        $(".favorite_body").on("click", "#find_food", function() {
            window.location.href = "{{route('home')}}"
            });
    </script>
@endpush

