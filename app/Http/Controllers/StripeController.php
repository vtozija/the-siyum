<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Request;
use Stripe;

class StripeController extends Controller
{
    /**
     * Handle payment
     */
    public function payment(Request $request)
    {
        $order = Order::find($request->session()->get('order'));
        $shipping = ['address' => ['line1' => $request->billing_address, 'postal_code' => $request->zip], 'name' => $order->getFullNameAttribute()];

        //https://stripe.com/docs/api/charges/create
        if (isset($request->same_address)) {
            $shipping['address']['line1'] = $order->shipping_address;
            $shipping['address']['postal_code'] = $order->zip;
        }

        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $payment = Stripe\Charge::create([
            "amount" => 720,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Ticket order payment.",
            "shipping" => $shipping
        ]);
        
        $order->charge_id = $payment->id;
        $order->save();

        $request->session()->flash('success', 'Payment has been successfully processed.');

        return back();
    }
}
