<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ResellersController;
use App\Http\Controllers\Reseller\HomeController;

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class,'login']);
    Route::post('login', [AuthController::class,'store'])->name('login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');

        Route::view('/admin', 'admin.home');
        Route::get('/resellers', [ResellersController::class,'index']);
        Route::get('/resellers/create', [ResellersController::class,'create']);
        Route::post('/resellers/create', [ResellersController::class,'store'])->name('reseller.create');
        Route::get('/resellers/edit/{resellers:user_id}', [ResellersController::class,'edit']);
        Route::post('/resellers/edit', [ResellersController::class,'update'])->name('reseller.update');
        Route::post('/resellers/delete', [ResellersController::class,'destroy'])->name('reseller.delete');
        Route::get('/products', [ProductController::class,'index']);
        Route::get('/products/create', [ProductController::class,'create']);
        Route::post('/products/create', [ProductController::class,'store'])->name('product.create');
        Route::get('/products/edit/{products:id_product}', [ProductController::class,'edit']);
        Route::post('/products/edit', [ProductController::class,'update'])->name('product.update');
        Route::post('/products/delete', [ProductController::class,'destroy'])->name('product.delete');

        Route::get('/', [HomeController::class,'index']);


});
