<?php

use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::middleware('auth')->group(function (){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings.add', [SettingsController::class, 'insert'])->name('settings.add');
});


