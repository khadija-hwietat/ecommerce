<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stripe\{stripe, charge, cutomer };
use Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
      public function test()
    {

//        \Stripe\Stripe::setApiKey("sk_test_DZKxK7fDFtEdQ6z2SBf68GkR");

// // Token is created using Checkout or Elements!
// // Get the payment token ID submitted by the form:
// $token = $_POST['stripeToken'];

// // Charge the user's card:
// $charge = \Stripe\Charge::create(array(
//   "amount" => 1000,
//   "currency" => "usd",
//   "description" => "Example charge",
//   "source" => $token,
// ));

        return view('test');

    }
    
    public function test2()
    {

//dd(Request()->all());
   $stripe = array(
  "secret_key"      => "sk_test_DZKxK7fDFtEdQ6z2SBf68GkR",
  "publishable_key" => "pk_test_2Zl02Xmh4pJcCJxYDHjqR6FA"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

     $customer = \Stripe\Customer::create(array(
      'email' => request('stripeEmail'),
      'source'  => request('stripeToken')
  ));

      $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 5000,//Cart::subtotal()*1000,
      'currency' => 'usd'
  ));

     return "thanks for payment ";
       // dd(request()->all());
    }

}
