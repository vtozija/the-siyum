<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{ 
    /**
     * Handle payment
     */
    public function payment(Request $request)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $payment = Stripe\Charge::create ([
                "amount" => 720,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Ticket order payment." 
        ]);

        dd($payment->id);
  
        return $request->session()->flash('success', 'Payment has been successfully processed.');
          
        return back();
    }
}