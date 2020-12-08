<div class="cart-detail-box" style="display:none">
    <div class="card">
        <div class="card-header padding-15 fw-700">Your Order from {{ $restaurant->name }}</div>
        <div class="card-body no-padding cart-item-holder" id="scrollstyle-4">
            @if( !empty($cart))
                @foreach($cart as $key => $item)
                    <div class="cat-product-box" data-cart="{{$key}}-{{$item['id']}}">
                        <div class="cat-product">
                            <div class="cat-name">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#">
                                            <p class="text-dark"><span
                                                    class="text-dark-white">{{ $item['quantity' ?? 0] }}</span> {{ $item['name'] ?? 'None'}}
                                            </p>
                                            @if(!empty($item['options']))
                                                @foreach($item['options'] as $option)
                                                    <div class="text-light-white">{{ $option['name'] }}</div>
                                                @endforeach
                                            @endif
                                            <div class="delete-btn">
                                                <a class="text-dark-white remove-item"
                                                   data-id="{{ $item['id'] }}" data-index="{{ $key }}"> <i
                                                        class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price"><a href="#" class="text-dark-white fw-500">
                                    ${{ is_numeric($item['price']) ? number_format($item['item_price'], 2) : number_format(0, 2)}}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="item-total">
                <div class="total-price border-0"><span class="text-dark-white fw-700">Items
                        subtotal:</span>
                    <span
                        class="text-dark-white fw-700 cart-subtotal"></span>
                </div>
                <div class="empty-bag padding-15 fw-700"><a href="#">Empty bag</a>
                </div>
            </div>
        </div>
        <div class="card-footer padding-15"><a href="{{ route('app.checkout.index') }}"
                                               class="btn-first green-btn text-custom-white full-width fw-500">Proceed
                to Checkout</a>
        </div>
    </div>
</div>
