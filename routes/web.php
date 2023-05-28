<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AlreadyLoggedIn;
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

Route::get('/dashboard', DashboardController::class)
    ->middleware('auth')
    ->name('home');

Route::controller(AuthController::class)->group(function() {
    Route::get('/auth/login', 'login')
        ->name('auth.login')
        ->middleware(AlreadyLoggedIn::class);
    Route::post('/auth/logout', 'logout');
    Route::post('/auth/login', 'authenticate')
        ->name('auth.authenticate');
});

Route::resource('products', ProductController::class)
    ->except('index')
    ->middleware('auth');
Route::get('/products/{product}/show-ajax', [ProductController::class, 'showAjax'])->middleware('auth');

Route::get('/language/change/{locale}', [LanguageController::class, 'change'])->name('language.change');
