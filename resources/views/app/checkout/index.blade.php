@extends('layouts.app')

@section('title')
    <title>Chekout</title>
@endsection

@section('content')
    <section class="final-order section-padding bg-light-theme">
        <div class="container-fluid">
            @if($cartStatus)
                @if($errors->any())
                    <div class="col-lg-9">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="col-lg-9">
                        <div class="alert alert-info">
                            {{session('message')}}
                        </div>
                    </div>
                @endif
                <form class="row" id="form" action="{{ route('app.checkout.submit') }}" method="POST">
                    @csrf
                    <div class="col-lg-9">
                        <div class="main-box padding-20">
                            <div class="row mb-xl-20">
                                <div class="col-12 col-md-6">
                                    <div class="section-header-left">
                                        <h3 class="text-light-black header-title fw-700">Review and place order</h3>
                                    </div>
                                    <h6 class="text-light-black fw-700 fs-14">Review address and payments before
                                        completing your purchase</h6>
                                    <h6 class="text-light-black fw-700 mb-2">Order details</h6>
                                    <p class="text-light-green fw-600">Deliver Now</p>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <p class="text-light-white title2 mb-1">
                                                <label for="customer_name">Your Name <small>(required)</small></label>
                                                <input type="text" class="form-control" name="customer_name"
                                                       id="customer_name"
                                                       placeholder="Your Name" value="{{ $customerName }}" required>
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p class="text-light-white title2 mb-1">
                                                <label for="phone_number">Phone Number <small>(required)</small></label>
                                                <input type="text" class="form-control" name="customer_phone"
                                                       placeholder="Phone Number" value="{{ $customerPhone }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-light-black fw-600 mb-1">Address</p>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <p class="text-light-white title2 mb-1">
                                                <label for="address1">Street Address <small>(required)</small></label>
                                                <input type="text" class="form-control" name="address1"
                                                       placeholder="Street Address"
                                                       value="{{ $customerAddress->address1 }}" required>
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p class="text-light-white title2 mb-1">
                                                <label for="address1">Address Line 2</label>
                                                <input type="text" class="form-control" name="address2"
                                                       placeholder="Address Line 2"
                                                       value="{{ $customerAddress->address2 }}" required>
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p class="text-light-white title2 mb-1">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="city"
                                                       placeholder="City" value="{{ $customerAddress->city }}" required>
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p class="text-light-white title2 mb-1">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" name="state"
                                                       placeholder="State" value="New York" disabled>
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p class="text-light-white title2 mb-1">
                                                <label for="zip">Zip</label>
                                                <input type="text" class="form-control" name="zip"
                                                       placeholder="Zip Code" value="{{ $customerAddress->zip }}"
                                                       required>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="advertisement-img">
                                        <img src="{{ asset('img/logo-512.png') }}"
                                             class="img-fluid full-width"
                                             alt="advertisement-img"
                                             style="object-fit: contain">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="payment-sec">
                                        <div class="section-header-left">
                                            <h3 class="text-light-black header-title">Delivery Instructions</h3>
                                        </div>
                                        <div class="form-group">
                                        <textarea class="form-control form-control-submit" rows="4"
                                                  placeholder="Delivery Details"
                                                  name="delivery_instructions"></textarea>
                                        </div>
                                        <div class="section-header-left">
                                            <h3 class="text-light-black header-title">Payment information</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="accordion">
                                                    <div class="payment-option-tab">
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item"><a class="nav-link fw-600 active"
                                                                                    data-toggle="tab"
                                                                                    href="#savecreditcard">Stripe</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="savecreditcard">
                                                                @if($savedCard)
                                                                    <div class="row mb-2">
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="card-element">Last
                                                                                    Four: {{ $lastFour }}</label>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="card-element">Card
                                                                                    Provider: {{ $cardProvider }}</label>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="card-element">Expiration: {{ $expiration }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12 text-center ">
                                                                            <div class="form-group">
                                                                                <button type="button"
                                                                                        class="btn-first green-btn text-custom-white"
                                                                                        id="addstripebutton">Add New
                                                                                    Card
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="row mb-4"
                                                                     style="{{ $savedCard ? 'display: none' : '' }}"
                                                                     id="addstripe">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="card-element">Cardholder
                                                                                Name</label>
                                                                            <input type="text" id="cardholder-name"
                                                                                   class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="card-element">Card</label>
                                                                        <div id="card-element"
                                                                             class="form-control"></div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="cardselect"
                                                                       value="{{ $savedCard ? 'existing' : 'new' }}"
                                                                       id="cardselect">
                                                                <div class="form-group">
                                                                    <button type="button"
                                                                            {{ $savedCard ? '' : 'disabled' }} id="submit-order"
                                                                            class="btn-first green-btn text-custom-white full-width fw-500">
                                                                        Place Your Order
                                                                    </button>
                                                                </div>
                                                                <p class="text-center text-light-black no-margin">By
                                                                    placing
                                                                    your order, you agree to foodmart's <a href="#">terms
                                                                        of
                                                                        use</a> and <a href="#">privacy agreement</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <div class="cart-detail-box">
                                <div class="card">
                                    <div class="card-header padding-15 fw-700">Your orders</div>
                                    <div class="card-body no-padding" id="scrollstyle-4">

                                        <div class="padding-15">
                                            <div class="item-total fw-600 border-0 pb-0">

                                            </div>
                                            <div class="delivery-fee text-light-green fw-600 border-0 pt-0 pb-0"> Delivery fee: Free </div>
                                            <div class="tax-fee text-dark-white fw-600 border-0 pt-0 pb-0">
                                                Taxes & Fees <button type="button" class="tax-info" onclick="openTaxInfo()"><i class="fas fa-info-circle"></i></button> : $0
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-0 modify-order">
                                        <div class="total-amount text-custom-white fw-700"> Total: $0 </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="row">
                    <div class="col-lg-8 offset-2">
                        <div class="main-box padding-20 text-center">
                            <h3 clas="text-light-black header-title fw-700">Your cart is empty. Find something
                                satisfying.</h3>
                        </div>
                    </div>
                </div>
                <section class="browse-cat u-line section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-header-left">
                                    <h3 class="text-light-black header-title title">Browse by cuisine <span
                                            class="fs-14">
                                    {{--                                            <a href="restaurant.html">See all restaurants</a></span></h3>--}}
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
                                                        <img src="{{ $category['photo'] }}" class="rounded-circle"
                                                             alt="categories">
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
            @endif
        </div>
    </section>
    <div class="modal" tabindex="-1" role="dialog" id="taxes">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Taxes & Fees</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="sales-tax">Sales tax: $0</p>
                    <p class="service-fee"> Service fee: $0 </p>
                    <p><small>Happy Holidays, Free Delivery all of December</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const removeCheckoutCartItem = (product_id) => {
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
                    renderCheckoutCart()
                }
            })
        }

        const renderCheckoutCart = () => {
            $.ajax({
                url: '{{ route("app.cart.get-data") }}',
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    if(Object.keys(result).length) {
                        $(".sidebar .cart-detail-box .card-body .item-total").removeClass('d-none')
                        $(".sidebar .cart-detail-box .card-body .no-items").addClass('d-none')
                    } else {
                        $(".sidebar .cart-detail-box .card-body .item-total").addClass('d-none')
                        $(".sidebar .cart-detail-box .card-body .no-items").removeClass('d-none')
                    }

                    $(".sidebar .user-alert-cart").text(Object.keys(result).length)

                    var list = '';
                    var total_price = 0;

                    for (const [key, item] of Object.entries(result)) {
                        list += '<div class="cat-product-box border-bottom">' +
                            '<div class="cat-product pb-1">' +
                            '<div class="d-flex justify-content-between">' +
                            '<div class="cat-name text-dark fw-700">' +
                            '<span class="text-dark-white mr-2">' + item.quantity + ' ×</span>' +
                            item.name +
                            '</div>' +
                            '<div class="price fw-700 ml-2">$' + parseFloat(item.item_price).toFixed(2) + '</div>' +
                            '</div>' +
                            '<div class="item-options ml-4">';

                        item.options.forEach(function(option) {
                            list += '<div class="option">' +
                                '<div class="name limit-line-2 text-light-white">•' + option.name + '</div>';

                            if(!isNaN(option.price) && option.price != null && option.price)
                                list += '<div class="price ml-2">+$' + option.price + '</div>';

                            list += '</div>';
                        })

                        list += '</div>'+
                            '<div class="message text-light-white ml-3">' + item.message + '</div>'+
                            '</div>' +
                            '<p class="text-center text-danger font-weight-bold" style="cursor: pointer" onclick="removeCheckoutCartItem(\'' + item.id + '\')"> Remove </p>' +
                            '</div>';

                        total_price = parseFloat(total_price) + parseFloat(item.total_price)
                    }

                    $(".sidebar .cart-detail-box .card-body .cat-product-box").remove();
                    $(".sidebar .cart-detail-box .card-body").prepend(list);

                    $(".sidebar .cart-detail-box .item-total").text('Subtotal: $' + total_price.toFixed(2))

                    var tax = (total_price * '{{$taxRate ?? 0}}');
                    var service_fee = (total_price * '{{$feeRate ?? 0}}');

                    $(".sidebar .cart-detail-box .tax-fee").html('Taxes & Fees <button type="button" class="tax-info" onclick="openTaxInfo()"><i class="fas fa-info-circle"></i></button> : $' + ( parseFloat(tax) + parseFloat(service_fee) ).toFixed(2))

                    $("#taxes .sales-tax").text('Sales Tax: $' + tax.toFixed(2))
                    $("#taxes .service-fee").text('Service Fee: $' + service_fee.toFixed(2))

                    $(".sidebar .cart-detail-box .total-amount").text('Total: $' + (parseFloat(total_price) + parseFloat(tax) + parseFloat(service_fee)).toFixed(2))
                }
            });
        }

        $(function() {
            renderCheckoutCart()
        })

        // Todo: Need the actual stripe id
        if ({{$cartStatus ? 'true' : 'false'}} == true)
        {
            var stripe = Stripe('{{ env('STRIPE_TOKEN') }}');
            var elements = stripe.elements();
            var cardElement = elements.create('card');
            cardElement.mount('#card-element');

            cardElement.on('change', function (event) {
                if (event.complete) {
                    $('#submit-order').attr('disabled', false);

                } else if (event.error) {
                    $('#submit-order').attr('disabled', 'disabled');
                    // show validation to customer
                }
            });
            $('#submit-order').on('click', function () {
                // Todo: Validate cardholder name;
                // Todo: Check if existing or new is set before doing the validation stuff;
                if ($('#cardselect').val() == 'new') {
                    // Todo: Get the cardholder details and set them here (billing details) validate them first?
                    var cardholder = $('#customer_name').val();
                    stripe.createToken(cardElement).then(function (result) {
                        if (result.error) {
                            // Inform the customer that there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Send the token to your server.
                            console.log(result);
                            var paymentMethodId = result.token.id;
                            console.log(result.token.card);
                            var lastfour = result.token.card.last4;
                            var form = $('#form');
                            form.append('<input name="paymentmethod" type="hidden" value="' + paymentMethodId + '">');
                            form.append('<input name="lastfour" type="hidden" value="' + lastfour + '">');
                            form.append('<input name="fulltoken" type="hidden" value=' + btoa(JSON.stringify(result.token)) + '">');
                            form.submit();
                        }
                    });
                } else {
                    var form = $('#form');
                    form.append('<input name="paymentmethod" type="hidden" value="{{ $savedCard }}">');
                    form.submit();
                }
            });

            $('#addstripebutton').on('click', function (e) {
                // Todo: make a hidden input that says existing or new
                $('#addstripe').toggle();
                if ($('#addstripe').is(':visible')) {
                    $(e.target).text('Use Existing Card');
                    $('#cardselect').val('new');
                    $('#submit-order').attr('disabled', false);
                } else {
                    $(e.target).text('Add New Card')
                    $('#cardselect').val('existing');

                }
            })

        }

        const openTaxInfo = () => {
            $('#taxes').modal('show');
        }
    </script>
@endpush
