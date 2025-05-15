<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::resource('domains', DomainController::class)->only(['store', 'update', 'destroy']);

    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::post('/plans/{plan}', [PlanController::class, 'subscribe'])->name('plans.subscribe');

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });
});
