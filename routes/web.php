<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;



Route::controller(WebController::class)->group(function () {
    Route::get('', 'index');
    Route::get('/shop', 'shop');
    Route::get('/about', 'about');
    Route::get('/blog', 'blog');
    Route::get('/contact', 'contact');
    Route::get('/services', 'services');
    Route::get('/cart', 'cart');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
