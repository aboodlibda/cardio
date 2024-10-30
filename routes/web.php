<?php

use App\Http\Controllers\Auth\LoginController;
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


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::prefix('cms')->middleware(['auth:user,customer'])->group(function (){
        Route::view('/','cms.dashboard')->name('dashboard');

        Route::resources([
            'products'    => ProductController::class,
            'categories'  => CategoryController::class,
            'tags'        => TagController::class,
            'coupons'     => CouponController::class,
            'users'       => UserController::class,
            'roles'       => RoleController::class,
            'orders'      => OrderController::class,
            'permissions' => PermissionController::class,
            'customers'   => CustomerController::class,
        ]);


        Route::put('update-email/{id}',[UserController::class,'updateEmail'])->name('update-email');
        Route::put('update-password/{id}',[UserController::class,'updatePassword'])->name('update-password');
        Route::put('update-role/{id}',[UserController::class,'updateRole'])->name('update-role');
        Route::post('/upload-image', [ProductController::class, 'uploadImage']);



        Route::view('show-order','cms.order.show')->name('show-order');
        Route::view('show-customer','cms.customer.show')->name('show-customer');


    });

    Route::prefix('cms')->middleware('auth:user')->group(function () {
        Route::get('logout',[LoginController::class,'logout'])->name('user-logout');
    });

    Route::post('login',[LoginController::class,'login'])->name('user-login')->middleware('limit_request');
    Route::get('login',[LoginController::class,'showLogin'])->name('show-login');

});
