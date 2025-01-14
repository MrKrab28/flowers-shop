<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('register', [AccountController::class, 'register'])->name('register');
    Route::post('register', [AccountController::class, 'store'])->name('register.store');
});

Route::get('tes', function () {
    return view('mail.testes');
});
