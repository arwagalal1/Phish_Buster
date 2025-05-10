<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:10,1');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
    
    // Services and subpages
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/before-interview', [ServicesController::class, 'beforeInterview'])->name('before-interview');
    Route::get('/verification-code', [ServicesController::class, 'verificationCode'])->name('verification-code');
});

require __DIR__.'/auth.php';
require __DIR__.'/interview.php';