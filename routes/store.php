<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\StoreController;


Route::controller(StoreController::class)
->group(function(){

    Route::get('/shop','index')->name('index');
    Route::get('/','home')->name('home');
    Route::get('/contact','contact')->name('contact');
    
});

Route::controller(CartController::class)
->group(function(){

    Route::get('cart','cart')->name('cart');
    Route::get('add-to-cart/{id}','addToCart');
    Route::patch('update-cart','updateCart');
    Route::delete('remove-from-cart','removeCart');
    Route::get('/clear-cart','clearCart')->name('cart.clear');

    
});