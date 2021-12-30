<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\StripeController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');


// route 
Route::group(['middleware' => ['auth']], function() 
{
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::get('/email/verify', function () {
    return view('auth.verify-email'); 
})->middleware('auth')->name('verification.notice');

// for consumer roles only
Route::group(['middleware' => ['auth', 'role:consumer']], function() 
{
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.myprofile');
    Route::get('consumer/deposit', 'App\Http\Controllers\Deposit\DepositController@consumer_deposits')->name('consumer.deposit.view');
    Route::get('consumer/map', 'App\Http\Controllers\Consumer\Consumer@maps')->name('consumer.map.view');

});

// for collectioncenter roles only
Route::group(['middleware' => ['auth', 'role:collectioncenter']], function() 
{
    // deposit route with approval middleware
    Route::middleware(['approved'])->group(function () {
    Route::get('/deposit', 'App\Http\Controllers\Deposit\DepositController@index')->name('deposit.view');});
    Route::post('deposit', 'App\Http\Controllers\Deposit\DepositController@store')->name('deposit.create');
    Route::get('approval/deposit', 'App\Http\Controllers\Deposit\DepositController@approval')->name('deposit.approval');

    Route::get('/marketplace', 'App\Http\Controllers\Marketplace\MarketplaceController@index')->name('market.show');
    Route::get('/marketplace/{id}', 'App\Http\Controllers\Marketplace\MarketplaceController@bids_detail')->name('market.detail');
    Route::post('/marketplace/offer/create', 'App\Http\Controllers\Offer\OfferController@offer_create')->name('offer.create');

    Route::get('offers/collectioncenter', 'App\Http\Controllers\Offer\OfferController@collectioncenter_offers')->name('collection_offers.view');
    

    Route::get('/dispatch/collectioncenter', 'App\Http\Controllers\Tracking\TrackingController@index')->name('dispatch.view');
    Route::post('/dispatch', 'App\Http\Controllers\Tracking\TrackingController@store')->name('dispatch.store');


    Route::get('orders/collectioncenter', 'App\Http\Controllers\Order\OrderController@collectioncenter_order_view')->name('collection_orders.view');
    Route::get('/orders/{id}','App\Http\Controllers\Order\OrderController@collectioncenter_order_detail')->name('collection_orders.detail');

    
    Route::get('/profile', 'App\Http\Controllers\CollectionCenter\CollectionCenterController@profile_view')->name('profile.view');
    Route::post('/details', 'App\Http\Controllers\CollectionCenter\CollectionCenterController@details_create')->name('details.create');
    Route::get('/inventory', 'App\Http\Controllers\Inventory\InventoryController@index')->name('inventory.view');
});


// for admins roles only
Route::group(['middleware' => ['auth', 'role:administrator']], function() 
{
    Route::get('/reports', 'App\Http\Controllers\Admin\AdminController@reports_view')->name('reports.view');
    Route::get('admin/users', 'App\Http\Controllers\Admin\AdminController@users_view')->name('users.view');

    Route::get('admin/approve', 'App\Http\Controllers\Admin\AdminController@approve')->name('admin.approve');
    Route::get('admin/approve/{user_id}', 'App\Http\Controllers\Admin\AdminController@approve_center')->name('admin.approve.center');
});





// for recycling plants roles only
Route::group(['middleware' => ['auth', 'role:recyclingplant']], function() 
{
    Route::get('/rate', 'App\Http\Controllers\Rate\RateController@index')->name('rate.view');
    Route::post('/rate', 'App\Http\Controllers\Rate\RateController@store')->name('rate.create');
    Route::post('/rate/update', 'App\Http\Controllers\Rate\RateController@update_rate')->name('rate.update');

    Route::get('/bid', 'App\Http\Controllers\Bid\BidController@index')->name('bid.view');
    Route::post('/bid', 'App\Http\Controllers\Bid\BidController@store')->name('bid.store');
    Route::post('/bid/update', 'App\Http\Controllers\Bid\BidController@bid_update')->name('bid.update');


    Route::get('/offers', 'App\Http\Controllers\Offer\OfferController@recycling_plant_offers')->name('plantoffers.view');
    Route::get('/payment/{id}', 'App\Http\Controllers\StripeController@payment_view')->name('payment.view');
    Route::post('/order', 'App\Http\Controllers\Order\OrderController@order_create')->name('order.create');
    Route::get('/order', 'App\Http\Controllers\Order\OrderController@order_view')->name('order.view');
    Route::get('/order/{id}','App\Http\Controllers\Order\OrderController@order_detail')->name('order.detail');

    Route::get('/tracking/recyclingplant', 'App\Http\Controllers\Tracking\TrackingController@plant_tracking')->name('tracking.view');


    Route::get('/recyclingplant/marketplace', 'App\Http\Controllers\Marketplace\MarketplaceController@plants_marketplace')->name('marketplace.show');
   
});










require __DIR__.'/auth.php';
