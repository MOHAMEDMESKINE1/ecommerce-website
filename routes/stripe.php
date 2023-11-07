<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Stripe\StripeController;


Route::controller(StripeController::class)
->group(function(){
    Route::post('/session','session')->name('session');
    Route::get('/success','success')->name('success');
    
});
