<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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













    });
});
