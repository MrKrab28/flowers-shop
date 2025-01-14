<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('product')->group(function () {
        Route::get('add', [ProductController::class, 'add'])->name('product.add');
        Route::post('add', [ProductController::class, 'store'])->name('product.store');
        Route::get('list', [ProductController::class, 'index'])->name('products');
        Route::get('list/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('update', [ProductController::class, 'update'])->name('product.update');
        Route::delete('delete', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::get('orders/{status}', [OrderController::class, 'index'])->name('orders');
    Route::get('orders/{status}/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::post('orders/{status}/{id}', [OrderController::class, 'update'])->name('order.update');

    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews');

    Route::get('customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('customers/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('customers', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('customers', [CustomerController::class, 'delete'])->name('customer.delete');

    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::put('account', [AccountController::class, 'update'])->name('account.update');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('send-email', [EmailController::class, 'index'])->name('kirim-email');
    Route::get('cari-email', [EmailController::class, 'cariemail'])->name('get-email');
    Route::post('tes-email', [EmailController::class, 'tes'])->name('tes-email');
});
