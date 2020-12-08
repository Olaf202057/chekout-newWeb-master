<?php

namespace App\Http\Controllers;

use App\Events\ReceivedOrderPlacedWebhook;
use Illuminate\Http\Request;

class DeliveryWebhookController extends Controller
{
    public function handle(Request $request, $webhook)
    {
        switch ($webhook) {
            case 'placed':
                $this->orderPlacedWebhook($request);
                break;
            case 'pickedup':
                $this->pickupCompletedWebhook($request);
                break;
            case 'location':
                $this->orderLocationWebhook($request);
                break;
            case 'void':
                $this->orderVoidWebhook($request);
                break;
            case 'delivered':
                $this->deliveryCompletedWebhook($request);
                break;

        }
    }

    public function orderPlacedWebhook($request)
    {
        event(new ReceivedOrderPlacedWebhook($request->orderKey));
    }

    public function pickupCompletedWebhook($request)
    {

    }

    public function orderLocationWebhook($request)
    {

    }

    public function orderVoidWebhook($request)
    {

    }

    public function deliveryCompletedWebhook($request)
    {

    }
}
