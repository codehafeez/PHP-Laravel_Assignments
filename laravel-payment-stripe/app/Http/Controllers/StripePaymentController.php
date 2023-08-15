<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Stripe;     
class StripePaymentController extends Controller
{
    public function stripe(){
        return view('stripe');
    }
    
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::create(array(
                "address" => [
                        "line1" => "Sukkur Pakistan",
                        "postal_code" => "65200",
                        "city" => "Sukkur",
                        "state" => "Sindh",
                        "country" => "PK",
                    ],
    
                "email" => "demo@gmail.com",
                "name" => "Abdul Hafeez",
                "source" => $request->stripeToken
             ));
    
    
        Stripe\Charge::create ([
            "amount" => 100 * 100,    
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => "Test payment from codehafeez.com",
            "shipping" => [
                "name" => "Jenny Rosen",
                "address" => [    
                "line1" => "510 Townsend St",
                "postal_code" => "98140",
                "city" => "San Francisco",
                "state" => "CA",
                "country" => "US",
                ],
            ]    
        ]); 
    
        Session::flash('success', 'Payment successful!');    
        return back();
    }
}