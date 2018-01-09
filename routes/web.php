<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('test','HomeController@test');
  Route::post('test','HomeController@test2');




Route::get('/','FrontController@index')->name('home');
Route::get('/shirts','FrontController@shirts')->name('shirts');
Route::get('/shirt','FrontController@shirt')->name('shirt');
Auth::routes();


Route::get('/logout','Auth\LoginController@logout');
Route::get('/home','HomeController@index');
Route::resource('cart','CartController');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){
	    Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');
	Route::get('/',function(){
		return view('admin.index');
	})->name('admin.index');

	Route::resource('product','ProductsController');

   // Route::get('test','ProductsController@index');

	Route::resource('categories','CategoriesController');
	Route::get('orders/{type?}','OrderController@orders');
});

//Route::get('checkout','CheckoutController@check_if_auth');
Route::group(['middleware'=>'auth'],function(){

  Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');
  Route::post('shipping-info','CheckoutController@storePayment');

});
// Route::get('payment','CheckoutController@Payment')->name('checkout.payment');
// Route::post('store','CheckoutController@storePayment')->name('payment.store');