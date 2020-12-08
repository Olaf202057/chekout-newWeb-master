@extends('layouts.app')

@section('title')
    <title>Chekout | Past Orders</title>
@endsection

@section('content')
    <div class="most-popular section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-1 browse-cat border-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header-left">
                                <h3 class="text-light-black header-title title-2">Past Orders</h3>
                            </div>
                        </div>
                        @if(count($orders) > 0)
                            <div class="col-12">
                                @foreach($orders as $order)
                                     <div class="product-list-view">
                                        <div class="product-list-info">
                                            <div class="product-list-img">
                                                <a href="{{ route('app.restaurant.show', ['id' => $order['vendorID']]) }}">
                                                    <img
                                                        src="{{ $vendor['photo'] ?? 'https://via.placeholder.com/90' }}"
                                                        class="img-fluid" alt="#">

                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-right-col">
                                            <div class="product-list-details">
                                                <div class="product-list-title">
                                                    <div class="product-info">
                                                        <h6><a href="{{ route('app.restaurant.show', ['id' => $order['vendorID']]) }}"
                                                               class="text-light-black fw-600">{{$order['vendor']['name'] ?? 'Restaurant'}}</a>
                                                        </h6>

                                                        <p class="text-light-white fs-12">{{ $order['vendor']['brief_description'] ?? 'Restaurant' }}</p>
                                                    </div>
                                                </div>
                                                Total Cost: ${{ isset($order['taxes_and_fees']) && isset($order['subtotal']) && is_numeric($order['taxes_and_fees']) && is_numeric($order['subtotal'])? number_format($order['taxes_and_fees'] + $order['subtotal'], 2) : number_format(0, 2) }}
                                                <a href="{{ route('app.user.order.show', ['id' => $order['order_id']]) }}" class="btn btn-primary">View Order</a>
                                            </div>
                                            <div class="product-list-bottom">
                                                <div class="product-list-type">
                                                    Ordered Date: {{ $order['created_at']->toFormattedDateString() ?? '00:00' }} at {{ $order['created_at_time'] ?? '00:00' }} ET
                                                </div>
                                                <div class="mob-tags-label">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="col-12">
                                <div class="alert alert-info">
                                    You haven't ordered anything yet!
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Browse by category -->

@endsection
