<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade\Cart;
use App\user;


class Order extends Model
{
    //

    protected $fillable=['total','delivered']; 

    public function orderItems(){

    	return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }

    public function user(){

      return $this->belongsTo(User::class);
    }
    
     
    public static function createOrder(){

	 //Create the order
        $user=Auth::user();
        $order=$user->orders()->create([
         'total'=>Cart::total(),
         'delivered'=>0
        ]);

        $cartItems=Cart::content();
        foreach($cartItems as $cartItem ){

          $order->ordrItems()->attach($cartItem->id,[
           
           'qty'=>$cartItem->qty,
           'total'=>$cartItem->qty*$cartItem->price,
          ]);
        }
           

   }
    

}
