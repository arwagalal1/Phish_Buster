 <?php
 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');})->name('home');

Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/before-interview', [ServicesController::class, 'beforeInterview'])->name('before-interview');
    Route::get('/verification-code', [ServicesController::class, 'verificationCode'])->name('verification-code');
});


require __DIR__.'/auth.php';