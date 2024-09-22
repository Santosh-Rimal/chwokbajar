<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\blogController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\SliderController;
use App\Http\Controllers\Frontend\ContactController;



Route::get('/',[SliderController::class,'home']);
Route::get('/blogs',[blogController::class,'index'])->name('frontend.blogs');
Route::get('/abouts',[AboutController::class,'index'])->name('frontend.abouts');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('contacts',[ContactController::class,'index'])->name('frontend.contact');
Route::post('/contact-submit', [ContactController::class, 'submitContact'])->name('contact.submit');


require __DIR__.'/auth.php';