<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    /**
     * Get the payment view
     */
    public function handleGet()
    {
        return view('stripe');
    }
  
    /**
     * Handle payment
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        Stripe\Charge::create ([
                "amount" => 4 * 180,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
  
        return $request->session()->flash('success', 'Payment has been successfully processed.');
          
        return back();
    }
}