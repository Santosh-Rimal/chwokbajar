<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\InquiryController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('contacts', InquiryController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('homes', HomeController::class);
});


// Route::get('/',[SliderController::class,'home']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Adding custome route files 
 Route::group([],base_path('routes/frontend.php'));

require __DIR__.'/auth.php';