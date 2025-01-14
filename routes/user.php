<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:user'], function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('checkout', [CartController::class, 'order'])->name('checkout.order');

    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('orders/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::put('orders/{id}', [OrderController::class, 'terima'])->name('order.terima');
    Route::post('review', [OrderController::class, 'review'])->name('order.review');

    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::put('account', [AccountController::class, 'update'])->name('account.update');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
