<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Editor\EditorController;
use App\Http\Controllers\Store\ContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Store\SubscriberController;
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




Route::get('sendsms',[TwilioController::class,'sendMsg']);

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

    Route::controller(ContactController::class)
    ->prefix("contacts")
    ->name("contacts.")
    ->group(function(){

        Route::get('','index')->name('index');
        Route::get('/search','search')->name('search');
        Route::post('/store','store')->name('store');
        Route::delete('/{id}','destroy')->name('destroy');
    
        
    });
    Route::controller(SubscriberController::class)
    ->prefix("subscribers")
    ->name("subscribers.")
    ->group(function(){

        Route::get('','index')->name('index');
        Route::get('/search','search')->name('search');
        Route::post('/store','store')->name('store');
        Route::delete('/{id}','destroy')->name('destroy');
    
        
    });
 
});


Route::middleware(['auth','editor'])->group(function () {

    Route::get('editor/dashboard', [EditorController::class, 'index'])->name('editor.dashboard');
});



include __DIR__.'/store.php';
include __DIR__.'/stripe.php';
include __DIR__.'/auth.php';

Auth::routes();
