<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request){
        // Todo: Will have to create some sort of temporary record on the database in case of failed payment
        $deposit = new \stdClass();
        $gateway = Omnipay::create('Stripe\PaymentIntents');
        // Todo: Set API KEY
        $gateway->setApiKey('');
        $response = $gateway->purchase([
            'amount' => $request->amount,
            'currency' => 'USD',
            'description' => 'TwoReachDeposit',
            'paymentMethod' => $request->payment,
            // Todo: Set the proper callback url
            'returnUrl' => env('APP_URL') . '/dashboard/financial/deposit/stripe/' . $deposit->uuid,
            'confirm' => true,
        ])->send();
        if ($response->isRedirect()) {
            $response->redirect();
        } elseif ($response->isSuccessful()) {
            // Todo: Successful, do the rest.
        } else {
            // Todo: Error, show the payment error.
        }
    }

    public function callback(Request $request, $provider, $id, $status = null){
        $gateway = Omnipay::create('Stripe\PaymentIntents');
        // Todo: Redirect right back to this callback;
        $completePaymentUrl = '';
        // Todo: Set API KEY
        $gateway->setApiKey('');
        $response = $gateway->confirm([
            'paymentIntentReference' => $request->payment_intent,
            'returnUrl' => $completePaymentUrl
        ])->send();
        if ($response->isSuccessful()) {
            $transactionReference = $response->getTransactionReference();
        } else {
            // Todo: There was an error or they cancelled.
        }
    }
}
