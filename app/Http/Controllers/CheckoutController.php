<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
//use stripe\{stripe, charge, cutomer };
class CheckoutController extends Controller
{
    //

// this funvtion to chech if the user is authanticated or not 
    // public function check_if_auth(){

    // if(Auth::check()){

    // 	return redirect()->route('checkout.shipping');
        
    //   }

    //   return redirect('login');
    // }


    public function shipping(){

    
       return view('front.shipping-info');
    }

     public function payment(){

        return view('front.payment');
      }

 public function storePayment(Request $request)
    {
     //dd(Cart::subtotal());
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
      'amount'   => Cart::subtotal()*100,
      'currency' => 'usd'
  ));

      //create order 
      $user=Auth::user();
      $order=$user->orders()->create([
      'total'=>Cart::total(),
      'delivered'=>0
      ]);

      $cartItems=Cart::content();
       foreach($cartItems as $cartItem ){

          $order->orderItems()->attach($cartItem->id,[
           
           'qty'=>$cartItem->qty,
           'total'=>$cartItem->qty*$cartItem->price,
          ]);
        }

     return "thanks for payment ";
       // dd(request()->all());
    }

}
