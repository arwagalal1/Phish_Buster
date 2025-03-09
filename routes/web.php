<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Route::get('/access denied', function () {
    return view('accessdenied');
});

Route::get('/contact us', function () {
    return view('contact-us');
});

Route::get('/before interview', function () {
    return view('interview.before-interview');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/forget password', function () {
    return view('auth.forget-password');
});

Route::get('/verify code', function () {
    return view('auth.verify-code');
});

Route::get('/reset password', function () {
    return view('auth.reset-password');
});
// require __DIR__.'/auth.php';


Route::get('/profile', function () {
    return view('profile');
});

Route::get('/', function () {
    return view('home');
});


Route::get('/services', function () {
    return view('services');
});

Route::get('/pathways', function () {
    return view('interview.pathways');
});


Route::get('/interview', function () {
    return view('interview.interview');
});

Route::get('/wait', function () {
    return view('interview.wait');
});

Route::get('/before assessment', function () {
    return view('assessment.before-assessment');
});

Route::get('/verification code', function () {
    return view('assessment.verification-code');
});

Route::get('/assessment', function () {
    return view('assessment.assessment');
});

Route::get('/end', function () {
    return view('assessment.end');
});