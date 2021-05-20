<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Reseller\HomeController;
use App\Http\Controllers\Admin\ResellersController;
use App\Http\Controllers\Transactions\BasketController;

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class,'login']);
    Route::post('login', [AuthController::class,'store'])->name('login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/change-password', [AuthController::class,'change']);
    Route::post('/change-password', [AuthController::class,'changePassword'])->name('password.change');
    Route::view('/test', 'admin.test');


        Route::get('/resellers', [ResellersController::class,'index']);
        Route::get('/resellers/create', [ResellersController::class,'create']);
        Route::post('/resellers/create', [ResellersController::class,'store'])->name('reseller.create');
        Route::get('/resellers/edit/{resellers:user_id}', [ResellersController::class,'edit']);
        Route::post('/resellers/edit', [ResellersController::class,'update'])->name('reseller.update');
        Route::post('/resellers/delete', [ResellersController::class,'destroy'])->name('reseller.delete');
        Route::get('/products', [ProductController::class,'index']);
        Route::post('/products/category', [ProductController::class,'storeCategory'])->name('category.create');
        Route::get('/products/create', [ProductController::class,'create']);
        Route::post('/products/create', [ProductController::class,'store'])->name('product.create');
        Route::get('/products/edit/{products:id_product}', [ProductController::class,'edit']);
        Route::get('/products/color/{product:product_code}', [ProductController::class,'colorIndex'])->name('product.createColor');
        Route::post('/products/create/color', [ProductController::class,'colorAdd'])->name('color.create');
        Route::post('/products/update/color', [ProductController::class,'colorUpdate'])->name('color.update');
        Route::post('/products/delete/color', [ProductController::class,'colorDelete'])->name('color.delete');
        Route::post('/products/edit', [ProductController::class,'update'])->name('product.update');
        Route::post('/products/delete', [ProductController::class,'destroy'])->name('product.delete');


        Route::get('/', [HomeController::class,'index']);
        Route::get('/profile', [ResellersController::class,'profile']);
        Route::post('/profile', [ResellersController::class,'updateProfile'])->name('profile.update');
        Route::get('/shopping', [ResellersController::class,'shopping']);
        Route::get('/product-order/{products:id_product}', [ResellersController::class,'productOrder']);

        Route::get('/baskets', [BasketController::class,'index']);
        Route::post('/baskets', [BasketController::class,'store'])->name('basket.create');
        Route::post('/baskets/update', [BasketController::class,'update'])->name('basket.update');
        Route::post('/baskets/delete', [BasketController::class,'destroy'])->name('basket.delete');


});
