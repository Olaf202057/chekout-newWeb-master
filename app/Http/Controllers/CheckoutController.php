<?php

namespace App\Http\Controllers;

use App\Models\Firebase\Cart;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Vendors\VendorsRepositoryInterface;
use App\Services\ExternalApis\RelayDelivery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Omnipay\Omnipay;

class CheckoutController extends Controller
{
    public function index(VendorsRepositoryInterface $vendorsRepository, UsersRepositoryInterface $usersRepository)
    {
        $fs_user = null;
        if (session()->has('firestore_user')) {
            $fs_user = session()->get('firestore_user');
        }
        //$firebaseUser = $usersRepository->getFirestoreUserById(sess);
        $customerName = 'Brandon';
        $customerAddress = new \stdClass();
        $customerAddress->address1 = '111 W 9th Street';
        $customerAddress->address2 = '';
        $customerAddress->city = 'Brooklyn';
        $customerAddress->state = 'New York';
        $customerAddress->zip = '12345';
        $customerPhone = '111-111-1111';
        if ($fs_user) {
            $savedCardRaw = $usersRepository->getPaymentMethodByOwnerId($fs_user->user_id);
        } else {
            $savedCardRaw = null;
        }
        $savedCard = $savedCardRaw ? $savedCardRaw->card_id : false;
        $lastFour = $savedCardRaw ? $savedCardRaw->card->last4 : false;
        $cardProvider = $savedCardRaw ? $savedCardRaw->card->brand : false;
        $expMonth = '00';
        $expYear = '00';
        if ($savedCardRaw) {
            $expMonth = $savedCardRaw->card->exp_month ?? $savedCardRaw->card->expMonth;
            $expYear = $savedCardRaw->card->exp_year ?? $savedCardRaw->card->expYear;
        }
        $expiration = $expMonth . '/' . $expYear;
        $tax_rate = .07875;
        $fee_rate = .10;
        $cart = session('cart');
        if (!empty($cart)) {
            $cartStatus = true;
            $restaurant = null;
            // $restaurant = $vendorsRepository->getVendorById($cart->vendor);
        } else {
            $cartStatus = false;
            $restaurant = null;
        }
        return view('app.checkout.index', [
            'customerName' => $customerName,
            'customerAddress' => $customerAddress,
            'customerPhone' => $customerPhone,
            'cartStatus' => $cartStatus,
            'restaurant' => $restaurant,
            'taxRate' => $tax_rate,
            'feeRate' => $fee_rate,
            'savedCard' => $savedCard,
            'lastFour' => $lastFour,
            'cardProvider' => $cardProvider,
            'expiration' => $expiration
        ]);
    }

    public function attemptOrder(Request $request, UsersRepositoryInterface $usersRepository, VendorsRepositoryInterface $vendorsRepository)
    {
        if( empty(session()->get('firestore_user')) )
            return redirect(route('auth.login'));

        //return $request->all();
        $tax_rate = .07875;
        $fee_rate = .10;
        $this->validate($request, [
            'address1' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'customer_phone' => 'required',
            'cardselect' => 'required',
            'customer_name' => 'required'
        ]);
        // Todo: Remove this when we add more states;
        $request->merge(['state' => 'NY']);

        if ($request->cardselect == 'new') {
            try {
                $fullStripeToken = json_decode(base64_decode($request->fulltoken), false);
                $usersRepository->createNewPaymentMethod($fullStripeToken);
            } catch (Exception $e) {
                dd($e);
            }
            $request->lastfour;
            $request->paymentmethod;
        } else {
            $request->paymentmethod;
        }

        // Todo: Fix this so it actually works.
//        if($relay->canDeliverTo($address)->canDeliver == false){
        // if (false) {
        //     session()->flash('message', 'Sorry, we cannot deliver to that address');
        //     return redirect(route('app.checkout.index'));
        // } else {
        $fs_user = session('firestore_user');
        if ($fs_user) {
            $stripeCustomer = $fs_user->stripeCustomerID ?? null;
        } else {
            session()->flash('message', 'You must be logged in to complete an order.');
            return redirect(route('app.checkout.index'));
        }

        $gateway = Omnipay::create('Stripe');
        $gateway->setApiKey(env('STRIPE_SECRET'));

        if (!$stripeCustomer) {
            $customerResponse = $gateway->createCustomer([
                'description' => 'Chekout User',
                'email' => $fs_user->email
            ])->send();
            if ($customerResponse->isSuccessful()) {
                $stripeCustomer = $customerResponse->getCustomerReference();
                $usersRepository->updateFirestoreUser($fs_user->user_id, [
                    'stripeCustomerID' => $stripeCustomer
                ]);
                $fs_user->stripeCustomerId = $stripeCustomer;
                session()->forget('firestore_user');
                session()->put('firestore_user', $fs_user);
            } else {
                session()->flash('message', 'There was an error creating your order.');
                return redirect(route('app.checkout.index'));
            }
        }

        // Todo: Set the restaurant name;
        $restaurantName = null;

        $totalCost = $this->calculateTotalCost($tax_rate, $fee_rate);
        $fees = $this->calculateFees($tax_rate, $fee_rate);

        // Todo: Create this order on firebase now and return the id
        $firebaseOrder = $usersRepository->createOrder($fs_user, $request->all(), $totalCost, $fees);
        $firebaseOrderId = $firebaseOrder->order_id;
        //dd($firebaseOrder);

        $returnUrl = env('APP_URL') . '/order/callback/' . $firebaseOrderId;

        $data = [
            'amount' => $totalCost,
            'currency' => 'USD',
            'description' => 'Chekout Order for ' . $restaurantName . ': ' . $firebaseOrderId,
//                'paymentMethod' => $paymentMethod,
//                'returnUrl' => $returnUrl,
//                'confirm' => true,
        ];
        if ($request->cardselect == 'new') {
            $cardResponse = $gateway->createCard([
                'token' => $request->paymentmethod,
                'customerReference' => $stripeCustomer,
            ])->send();

            if($cardResponse->isSuccessful()){
                $data['cardReference'] = $cardResponse->getTransactionReference();
                $data['customerReference'] = $stripeCustomer;
            }else{
                Log::Info($cardResponse->getMessage());
                session()->flash('message', 'There was a problem with your payment method. Try another.');
                return redirect(route('app.checkout.index'));
            }
        } else {
            $savedCardRaw = $usersRepository->getPaymentMethodByOwnerId($fs_user->user_id);
            //dd($savedCardRaw);
            if ($savedCardRaw) {
                $data['customerReference'] = $stripeCustomer;
            }
        }

        $response = $gateway->purchase($data)->send();

        if ($response->isRedirect()) {
            return $response->redirect();
        } else if ($response->isSuccessful()) {
            // Todo: Enable delivery
            // Todo: Update the order with the charge id and the status

            $cart = session('cart');

            $usersRepository->updateOrder($firebaseOrderId, $response->getTransactionReference(), 'Order Paid');
            // $vendor = $vendorsRepository->getVendorById($cart->vendor);
            // if($this->createRelayDelivery($firebaseOrderId, $request->all(), $cart, $vendor->envoronment['relay_id'], ($cart->subtotal * $tax_rate))){
            session()->forget('cart');
            return redirect(route('app.user.order.show', ['id' => $firebaseOrderId ?? 'test']));
            // }else{
            //     session()->flash('message', 'There was a problem creating your delivery. Try again.');
            //     return redirect(route('app.checkout.index'));
            // }

        } else {

            Log::Info($response->getMessage());
            session()->flash('message', 'There was a problem with your payment method. Try another.');
            return redirect(route('app.checkout.index'));
        }
        // }
    }

    public function callback(Request $request, $provider, $firebaseOrderId, $status = null)
    {
        $gateway = Omnipay::create('Stripe\PaymentIntents');
        $gateway->setApiKey(env('STRIPE_SECRET'));
        $completePaymentUrl = env('APP_URL') . '/order/callback/' . $firebaseOrderId;
        $response = $gateway->confirm([
            'paymentIntentReference' => $request->payment_intent,
            'returnUrl' => $completePaymentUrl
        ])->send();
        if ($response->isSuccessful()) {
            $transactionReference = $response->getTransactionReference();
            // Todo: Store this transaction in the firebase order as transactionReference
            // $this->createRelayDelivery();

        } else {
            // Todo: There was an error or they cancelled.
            // Todo: redirect to the order to checkout and tell them that they cancelled.
            session()->flash('message', 'You cancelled the order.');
        }
    }


    private function createRelayDelivery($firebaseOrderId, $dataArray, $cart, $producer, $tax)
    {
        $externalId = $firebaseOrderId;
        $customerName = $dataArray['customer_name'];
        $customerPhone = $dataArray['customer_phone'];
        $address1 = $dataArray['address1'];
        $city = $dataArray['city'];
        $state = $dataArray['state'];
        $zip = $dataArray['zip'];
        $instructions = $dataArray['delivery_instructions'];
        $tip = 0;

        $items = [];
        foreach($cart->items as $item){
            $options = [];
            if(isset($item['options']) && count($item['options']) > 0){
                foreach($item['options'] as $option){
                    $newOption = [
                        'name' => $option['name'],
                        'quantity' => 1
                    ];
                    array_push($options, $newOption);
                }
            }
            $newItem = [
                'name' => $item['name'],
                'quantity' => 1,
                'price' => $item['price'],
                'options' => $options
            ];
            array_push($items, $newItem);
        }
        $data = [
            'order' => [
                'externalId' => $externalId,
                'producer' => [
                    'producerLocationKey' => $producer
                ],
                'consumer' => [
                    'name' => $customerName,
                    'phone' => $customerPhone,
                    'location' => [
                        'address1' => $address1,
                        'city' => $city,
                        'state' => $state,
                        'zip' => $zip
                    ]
                ],
                'price' => [
                    'subTotal' => $cart->subtotal,
                    'tax' => $tax,
                    'tip' => $tip
                ],
                'specialInstructions' => $instructions,
                'items' => $items
            ]
        ];

        $service = new RelayDelivery();
        $service->createOrder($data);
        return true;
    }


    public function cancelOrder()
    {
        return null;
    }

    private function calculateFees($taxRate, $feeRate) {
        $cart = session('cart');
        if(empty($cart))
            return 0;

        $total = 0;
        foreach ($cart as $item) {
            if (!empty($item['total_price']) && is_numeric($item['total_price'])) {
                $total += $item['total_price'];
            }
        }
        return round($total * ($taxRate + $feeRate), 2);
    }

    private function calculateTotalCost($taxRate, $feeRate) {
        $cart = session('cart');
        if(empty($cart))
            return 0;

        $total = 0;
        foreach ($cart as $item) {
            if (!empty($item['total_price']) && is_numeric($item['total_price'])) {
                $total += $item['total_price'];
            }
        }
        return round($total * (1 + ($taxRate + $feeRate)), 2);
    }
}
