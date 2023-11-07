<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Editor\EditorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Stripe\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/shop',[StoreController::class,'index'])->name('index');
Route::get('/',[StoreController::class,'home'])->name('home');
Route::get('/contact',[StoreController::class,'contact'])->name('contact');


Route::post('/session', [StripeController::class,'session'])->name('session');
Route::get('/success', [StripeController::class,'success'])->name('success');

Route::controller(CartController::class)
->group(function(){

    Route::get('cart','cart')->name('cart');
    Route::get('add-to-cart/{id}','addToCart');
    Route::patch('update-cart','updateCart');
    Route::delete('remove-from-cart','removeCart');
    Route::get('/clear-cart','clearCart')->name('cart.clear');

    
});

Route::middleware(['auth','admin'])->group(function () {

    Route::controller(AdminController::class)
    ->prefix("admin/dashboard")
    ->group(function(){
        Route::get('','index')->name('admin.dashboard');
        // Route::get('/charts',  'categoryChart')->name('admin.charts');
    
    });

    route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function(){
        Route::get('',  'index')->name('index');
        Route::get('/statistics',  'statistics')->name('statistics');
        Route::post('/search',  'search')->name('search');
        Route::get('/edit/{id}',  'edit')->name('edit');
        Route::post('',  'store')->name('store');
        Route::put('/{id}',  'update')->name('update');
        Route::delete('/{id}',  'destroy')->name('destroy');
        Route::get('/create',  'create')->name('create');
    
    });

    Route::controller(CategoryController::class)
    ->prefix('categories')
    ->name('categories.')
    ->group(function(){
        Route::get('',  'index')->name('index');
        Route::get('/show/{id}}', 'show')->name('show');
        Route::post('/search',  'search')->name('search');
        Route::get('/edit/{id}',  'edit')->name('edit');
        Route::post('',  'store')->name('store');
        Route::put('/{id}',  'update')->name('update');
        Route::delete('/{id}',  'destroy')->name('destroy');
        Route::get('/create',  'create')->name('create');

    });
    
 
});


Route::middleware(['auth','editor'])->group(function () {

    Route::get('editor/dashboard', [EditorController::class, 'index'])->name('editor.dashboard');
});


Route::controller(GithubController::class)->group(function(){
    Route::get('auth/github', 'redirectToGithub')->name('auth.github');
    Route::get('auth/github/callback', 'handleGithubCallback');
});


Route::controller(GoogleController::class)->group(function(){

    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Auth::routes();
