<?php

Route::get('/pathways', fn() => view('interview.pathways'))->name('pathways');
Route::get('/interview', fn() => view('interview.interview'))->name('interview');
Route::get('/wait', fn() => view('interview.wait'))->name('wait');