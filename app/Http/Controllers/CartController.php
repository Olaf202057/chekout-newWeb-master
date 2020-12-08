<?php

namespace App\Http\Controllers;

use App\Models\Firebase\Cart;
use App\Repositories\Vendors\VendorsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use function Symfony\Component\String\s;

class CartController extends Controller
{
    public function getData(Request $request) {
        return response()->json(session('cart'));
    }

    public function addItem(Request $request, VendorsRepositoryInterface $vendorsRepository) {
        // Todo: If they are different vendors do we show an error or create another cart?
        $data = $request->except(['_token']);
        $item = $vendorsRepository->getProductById($data['restaurant_id'], $data['menu_id'], $data['section_id'], $data['product_id']);

        $cart = [];

        if (session()->has('cart')) {
            $cart = session('cart');
            // foreach ($cart as $index => $item) {
            //     if($item['id'] == $data['product_id']) {
            //         $cart[$index]['quantity'] += 1;
            //         $cart[$index]['price'] *= 2;

            //         session()->put('cart', $cart);
            //         return response()->json($cart);
            //     }
            // }
        }

        $new_cart = array(
            'id' => $item->id,
            'name' => $item->name,
            'item_price' => $item->price,
            'quantity' => 1,
            'message' => $data['message']
        );

        $price = $item->price ? $item->price : 0;

        $options = [];
        if(!empty($data['options'])) {
            foreach ($data['options'] as $option) {
                $option_data = $item->extraOption[ $option['option_id'] - 1 ]->data[ $option['option_data_id'] - 1 ];

                if($option_data) {
                    $options[] = array(
                        'option_id' => $option['option_id'],
                        'option_data_id' => $option['option_data_id'],
                        'name' => $option_data->tag,
                        'price' => $option_data->price ? $option_data->price : 0
                    );

                    if($option_data->price)
                        $price += ($option_data->price ? $option_data->price : 0);
                }
            }
        }

        $new_cart['options'] = $options;
        $new_cart['total_price'] = $price;

        $cart[] = $new_cart;
        
        session()->put('cart', $cart);

        return response()->json($cart);
    }

    private function parseItemWithOptions($item, $options, $repo)
    {
        $price = str_replace(':', '.', $item->price);
        $optionList = [];
        foreach ($options as $key => $value) {
            $optionObj = $repo->getOptionById($value);
            if($optionObj && $optionObj->value){
                $price = $price + $optionObj->value;
                array_push($optionList, $key . ': ' . $optionObj->name);
            }
        }

        $newItem = [
            'id' => $item->id,
            'name' => $item->name,
            'quantity' => 1,
            'price' => $price,
            'options' => $optionList
        ];
        return $newItem;
    }

    private function sessionBasedCartFunctions($restaurantId, $item, $options, $vendorsRepository){
        if (session()->has('cart')) {
            // Session has cart
            $cart = session('cart');
            if ($this->compareVendors($restaurantId, $cart)) {
                session()->forget('cart');
                $items = $cart->items;
                array_push($items, $this->parseItemWithOptions($item, $options, $vendorsRepository));
                $cart->items = $items;
                $cart->subtotal = 0;
                foreach ($cart->items as $item) {
                    if(isset($item['price']) && is_numeric($item['price'])){
                        $cart->subtotal = $cart->subtotal + (($item['price'] ?? 0) * $item['quantity']);
                    }
                }
                session()->put('cart', $cart);
                return response()->json($cart);
            } else {
                $buttons = '<a class="btn btn-outline-dark mr-2" href="' . route('app.restaurant.select-new', ['restaurantId' => $restaurantId]) . '">Stay Here</a><a class="ml-2 btn btn-outline-dark" href="' . route('app.restaurant.go-back', ['restaurantId' => $cart->vendor ?? 0]) . '">Go Back</a>';
                return response()->json(
                    [
                        'error' => 'You already have items in your cart from another restaurant.',
                        'cart_vendor' => $cart->vendor,
                        'new_vendor' => $restaurantId,
                        'alert' => $buttons
                    ]
                );
            }
        } else {
            $cart = new Cart;
            $cart->vendor = $restaurantId;
            $cart->items = array($this->parseItemWithOptions($item, $options, $vendorsRepository));
            $cart->subtotal = 0;
            foreach ($cart->items as $item) {
                if(isset($item['price']) && is_numeric($item['price'])){
                    $cart->subtotal = $cart->subtotal + (($item['price'] ?? 0) * $item['quantity']);
                }
            }
            session()->put('cart', $cart);
            return response()->json($cart);
        }
    }

    public function removeItem(Request $request) {
        $productId = $request->product_id;

        if (session()->has('cart')) {
            $cart = session('cart');
            foreach ($cart as $key => $item) {
                if($item['id'] == $productId) {
                    unset($cart[$key]);
                    break;
                }
            }

            session()->put('cart', $cart);
            return response()->json($cart);
        }

        return response()->json([
            'error' => 'The item no longer exists in the cart.'
        ]);
    }

    public function removeAll(Request $request) {
        session()->forget('cart');

        return response()->json([]);
    }

    private function compareVendors($restaurantId, $cart)
    {
        // Todo: If not same vendors, return back with a modal for them to select a new vendor or whatever they want'
        if ($restaurantId == $cart->vendor) {
            return true;
        }
        return false;
    }
}
