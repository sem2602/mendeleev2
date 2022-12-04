<?php

use App\Http\Controllers\AcceptPromController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingsController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(callback: function (){

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings.add', [SettingsController::class, 'insert'])->name('settings.add');

    Route::get('/orders/create', [OrderController::class, 'createOrder'])->name('create.order');

    Route::get('/order/accept/site/{id}', [OrderController::class, 'acceptSite'])->name('order.accept.site');

    Route::get('/order/accept/prom/{api_id}/{order_id}', [OrderController::class, 'acceptProm'])->name('order.accept.prom');
    Route::post('/order/prom/accept', AcceptPromController::class)->name('order.prom.accept');

    Route::view('/orders/accepted', 'accepted', ['orders' => Order::where('status_id', 1)->paginate(15)])->name('orders.accepted');

    Route::get('order/confirm/{id}', [])->name('confirm.order');

    Route::post('/order/cancel/{id}/{service_id}', [HomeController::class, 'cancel.order']);

    Route::resource('clients', ClientController::class);

});


