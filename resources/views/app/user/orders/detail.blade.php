@extends('layouts.app')

@section('content')
    <section class="checkout-page section-padding bg-light-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tracking-sec">
                        <div class="tracking-details padding-20 p-relative">
                            <h5 class="text-light-black fw-600">{{ $vendor->name ?? '' }}</h5>
                            <span class="text-light-white">Estimated Delivery time</span>
                            <h2 class="text-light-black fw-700 no-margin">9:00pm-9:10pm</h2>
                            <div id="add-listing-tab" class="step-app">
                                <ul class="step-steps">
                                    <li class="done">
                                        <a href="javascript:void(0)"> <span class="number"></span>
                                            <span class="step-name">Order
                                                sent<br>{{ $order->created_at_time ?? '00:00' }}</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:void(0)"> <span class="number"></span>
                                            <span class="step-name">In the works</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"> <span class="number"></span>
                                            <span class="step-name">Out of delivery</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"> <span class="number"></span>
                                            <span class="step-name">Delivered</span>
                                        </a>
                                    </li>
                                </ul>
                                {{--                                <button type="button" class="fullpageview text-light-black fw-600" data-modal="modal-12">Full Page View</button>--}}
                            </div>
                        </div>
                        <div class="tracking-map">
                            <div id="pickupmap"></div>
                        </div>
                    </div>
                    <!-- recipt -->
                    <div class="recipt-sec padding-20">
                        <div class="recipt-name title u-line full-width mb-xl-20">
                            <div class="recipt-name-box">
                                <h5 class="text-light-black fw-600 mb-2">{{ $vendor->name ?? '' }}</h5>
                                <p class="text-light-white ">Estimated Delivery time</p>
                            </div>
                            {{--                            <div class="countdown-box">--}}
                            {{--                                <div class="time-box"> <span id="mb-hours"></span>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="time-box"> <span id="mb-minutes"></span>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="time-box"> <span id="mb-seconds"></span>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="u-line mb-xl-20">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="recipt-name full-width padding-tb-10 pt-0">
                                        <h5 class="text-light-black fw-600">Delivery (ASAP) to:</h5>
                                        <span class="text-light-white ">{{ $order->author->firstName ?? 'None' }}</span>
                                        <span class="text-light-white ">{{ $order->address->line1 ?? 'None'}}</span>
                                        <span class="text-light-white ">{{ $order->address->city ?? 'None'}}
                                            , {{ $order->address->state }}, {{ $order->address->postalCode ?? 'None'}}</span>
                                        <p class="text-light-white ">{{ $order->author->phone ?? 'None' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="recipt-name full-width padding-tb-10 pt-0">
                                        <h5 class="text-light-black fw-600">Delivery instructions</h5>
                                        <p class="text-light-white "> {{ $order->instrucitons ?? 'No special instructions.' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ad-banner padding-tb-10 h-100">
                                        <img src=" {{$vendor->logo_url ?? 'https://via.placeholder.com/337x139'}}"
                                             class="img-fluid full-width" alt="banner-adv">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-line mb-xl-20">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="text-light-black fw-600 title">Your Order
                                        <span>
                                            {{--                                            <a href="#" class="fs-12">Print Receipt</a>--}}
                                        </span>
                                    </h5>
                                    <p class="title text-light-white">{{ $order->created_at->toFormattedDateString() }}
                                        <span class="text-light-black">Order #{{$order->order_id ?? 'None'}}</span>
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    @if(count($order->products) > 0)
                                        @foreach($order->products as $product)
                                            <div class="checkout-product">
                                                <div class="img-name-value">
                                                    <div class="product-img">
                                                        {{--                                                        <a href="#">--}}
                                                        {{--                                                            <img src="{{}}" alt="#">--}}
                                                        {{--                                                        </a>--}}
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="d-flex flex-row">
                                                            <div class="product-value">
                                                                <span
                                                                    class="text-light-white">{{ $product->quantity }}</span>
                                                            </div>
                                                            <div class="product-name"><span><a href="#"
                                                                                               class="text-light-white">{{ $product->name }}</a></span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row">
                                                            <div class="item-options">
                                                                @if(isset($product->options) && count($product->options) > 0)
                                                                    @foreach($product->options as $option)
                                                                        <small>{{$option}}</small>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price"><span
                                                        class="text-light-white">${{isset($product->price) && is_numeric($product->price) ? number_format($product->price, 2) : number_format(0, 2)}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="payment-method mb-md-40">
                                    <h5 class="text-light-black fw-600">Payment Method</h5>
                                    <div class="method-type"><i class="fab fa-credit-card text-dark-white"></i>
                                        <span class="text-light-white">Credit Card</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="price-table u-line">
                                    <div class="item"><span class="text-light-white">Item subtotal:</span>
                                        <span
                                            class="text-light-white">${{ isset($order->subtotal) && is_numeric($order->subtotal) ? number_format($order->subtotal, 2) : number_format(0, 2) }}</span>
                                    </div>
                                    <div class="item"><span class="text-light-white">Tax and fees:</span>
                                        <span
                                            class="text-light-white">${{ isset($order->taxes_and_fees) && is_numeric($order->taxes_and_fees) ? number_format($order->taxes_and_fees, 2) : number_format(0, 2) }}</span>
                                    </div>
                                </div>
                                <div class="total-price padding-tb-10">
                                    <h5 class="title text-light-black fw-700">Total:
                                        <span>${{ isset($order->taxes_and_fees) && isset($order->subtotal) && is_numeric($order->taxes_and_fees) && is_numeric($order->subtotal)? number_format($order->taxes_and_fees + $order->subtotal, 2) : number_format(0, 2) }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 d-flex"><a href="#" class="btn-first white-btn fw-600 help-btn">Need
                                    Help?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
