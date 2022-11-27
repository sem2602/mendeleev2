<?php

use App\Http\Controllers\AcceptPromController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::middleware('auth')->group(callback: function (){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings.add', [SettingsController::class, 'insert'])->name('settings.add');

    Route::get('/order.accept.site/{id}', [\App\Http\Controllers\OrderController::class, 'acceptSite']);

    Route::get('/order.accept.prom/{api_id}/{order_id}', [\App\Http\Controllers\OrderController::class, 'acceptProm'])->name('order.accept.prom');
    Route::post('/order.prom.accept', AcceptPromController::class)->name('order.prom.accept');

//    Route::get('/orders/accepted', function() {
//        $orders = \App\Models\Order::where('status_id', 1)->get();
//        dd($orders);
//    })->name('orders.accepted');

    Route::view('/orders/accepted', 'accepted', ['orders' => \App\Models\Order::where('status_id', 1)->get()])->name('orders.accepted');

    Route::get('order/confirm/{id}', [])->name('confirm.order');

    Route::post('/order.cancel/{id}/{service_id}', [\App\Http\Controllers\HomeController::class, 'cancelOrder']);

    Route::resource('clients', \App\Http\Controllers\ClientController::class);

});


