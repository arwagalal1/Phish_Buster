<?php

use App\Http\Controllers\InterviewController;

Route::get('/pathways', [InterviewController::class, 'showPathways'])->name('pathways');
Route::get('/interview', [InterviewController::class, 'index'])->name('interview')->middleware('auth');
Route::get('/api/questions', [InterviewController::class, 'getQuestions'])->middleware('auth');
// Route::post('/api/submit-answers', [InterviewController::class, 'submitAnswers'])->middleware('auth');
Route::post('/api/submit-answer', [InterviewController::class, 'submitAnswer'])->middleware('auth');
Route::post('/api/complete-interview', [InterviewController::class, 'completeInterview'])->middleware('auth');
// Route::get('/wait', fn() => view('interview.wait'))->name('wait');
Route::get('/wait', [InterviewController::class, 'showWaitPage'])->name('wait');
Route::get('/404', fn() => view('errors.404'))->name('404');
Route::get('/api/user-id', [InterviewController::class, 'getUserId'])->middleware('auth');