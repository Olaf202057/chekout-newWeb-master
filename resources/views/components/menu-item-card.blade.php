<div class="restaurent-product-list">
    <div class="restaurent-product-detail" data-detail="{{ json_encode($product->data())}}">
        <div class="restaurent-product-left">
            <div class="restaurent-product-title-box">
                <div class="restaurent-product-box">
                    <div class="restaurent-product-title">
                        <h5 class="mb-2" data-toggle="modal" data-target="#restaurent-popup">
                            <a href="javascript:void(0)"
                                class="text-light-black fw-600">{{ $product->data()['name'] ?? ''}}</a>
                        </h5>
                    </div>
                    <div class="restaurent-product-label"></div>
                </div>
                <div class="restaurent-product-rating"></div>
            </div>
            <div class="restaurent-product-caption-box text-light-white limit-line-3 w-100">
                {{ $product->data()['description'] ?? '' }}
            </div>
            @if(is_numeric( $product->data()['price'] ))
                <p class="font-weight-bold m-0 mt-2">${{ $product->data()['price'] ?? 0 }}</p>
            @endif
            <form
                action="{{ route('app.cart.add-item', ['restaurantId' => $restaurant->id, 'id' => $product->data()['id']]) }}"
                class="add-to-cart-form" method="post">
                @csrf
                <input type="hidden" name="item" value="{{$product->data()['id']}}">
            </form>
            <div
                class="restaurent-product-price">
            </div>
            <div class="restaurent-tags-price">
                <div class="restaurent-tags">
                </div>
                <img class="fav-icon"
                    src="{{ asset('img/svg/heart-red.svg') }}"
                    alt="tag">
            </div>
        </div>
        <div
            class="restaurent-product-img">
            @if(isset($product->data()['photo']))
                <img
                    src="{{ $product->data()['photo']}}"
                    class="img-fluid"
                    alt="#">
            @endif
        </div>
    </div>
</div>
