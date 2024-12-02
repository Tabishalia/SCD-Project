<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/shop', [WebController::class, 'shop'])->name('shop');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/blog', [WebController::class, 'blog'])->name('blog');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/services', [WebController::class, 'services'])->name('services');
Route::get('/cart', [WebController::class, 'cart'])->name('cart');
Route::get('/productDetail{product}', [WebController::class, 'productDetail'])->name('productDetail');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// Route::resource('categories', CategoryController::class);
// Route::resource('products', ProductController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard'); // Home dashboard
    Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('products.create'); // Add new movie form
    Route::post('/dashboard/products', [ProductController::class, 'store'])->name('products.store'); // Store movie
    Route::get('/dashboard/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Edit movie
    Route::put('/dashboard/products/{product}', [ProductController::class, 'update'])->name('products.update'); // Update movie
    Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete movie
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories.index'); // Show all categories
    Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create'); // Add new category form
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('categories.store'); // Store category
    Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit'); // Edit category
    Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])->name('categories.update'); // Update category
    Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
