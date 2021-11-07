<?php

use Illuminate\Support\Facades\Route;

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

// route 
Route::group(['middleware' => ['auth']], function() 
{
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for consumer roles only
Route::group(['middleware' => ['auth', 'role:consumer']], function() 
{
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.myprofile');
});

// for collectioncenter roles only
Route::group(['middleware' => ['auth', 'role:collectioncenter']], function() 
{
    // deposit route with approval middleware
    Route::middleware(['approved'])->group(function () {
          Route::get('/deposit', 'App\Http\Controllers\Deposit\DepositController@index')->name('deposit.view');
     });
    Route::post('/deposit', 'App\Http\Controllers\Deposit\DepositController@store')->name('deposit.create');
    Route::get('approval/deposit', 'App\Http\Controllers\Deposit\DepositController@approval')->name('deposit.approval');

    Route::get('/marketplace', 'App\Http\Controllers\Marketplace\MarketplaceController@index')->name('market.show');
    Route::get('/profile', 'App\Http\Controllers\CollectionCenter\CollectionCenterController@profile_view')->name('profile.view');
    Route::post('/details', 'App\Http\Controllers\CollectionCenter\CollectionCenterController@details_create')->name('details.create');
});


// for collectioncenter roles only
Route::group(['middleware' => ['auth', 'role:administrator']], function() 
{
    Route::get('/reports', 'App\Http\Controllers\Admin\AdminController@reports_view')->name('reports.view');
    Route::get('admin/users', 'App\Http\Controllers\Admin\AdminController@users_view')->name('users.view');

    Route::get('admin/approve', 'App\Http\Controllers\Admin\AdminController@approve')->name('admin.approve');
    Route::get('admin/approve/{user_id}', 'App\Http\Controllers\Admin\AdminController@approve_center')->name('admin.approve.center');
});










require __DIR__.'/auth.php';
