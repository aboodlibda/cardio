<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



//Route::get('/', function () {
//    return view('cms.dashboard');
//})->name('dashboard');

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::prefix('cms')->group(function (){
        Route::view('/','cms.dashboard')->name('dashboard');
        Route::resource('products',ProductController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('tags',TagController::class);
        Route::resource('coupons',CouponController::class);
        Route::resource('users',UserController::class);
        Route::resource('roles',RoleController::class);
        Route::resource('orders',OrderController::class);
        Route::resource('permissions',PermissionController::class);
        Route::resource('customers',CustomerController::class);



        Route::view('show-user','cms.user.show')->name('show-user');
        Route::view('show-order','cms.order.show')->name('show-order');
        Route::view('show-role','cms.user.role.show')->name('show-role');
        Route::view('show-customer','cms.customer.show')->name('show-customer');













    });
});
