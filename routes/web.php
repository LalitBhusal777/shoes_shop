<?php

use App\Http\Controllers\{
    CartController,
    CategoryController,
    DashboardController,
    OrderController,
    PagesController,
    ProductController,
    ProfileController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/categoryproducts/{catid}', [PagesController::class, 'categoryproducts'])->name('categoryproducts');
Route::get('/viewproduct/{id}', [PagesController::class, 'viewproduct'])->name('viewproduct');


// Routes that require authentication
Route::middleware('auth')->group(function() {
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('/mycart', [CartController::class, 'mycart'])->name('mycart');
    Route::delete('/cart/remove/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/myprofile',[PagesController::class,'myprofile'])->name('myprofile');
    Route::get('/orders/{id}/status/{status}',[OrderController::class,'status'])->name('orders.status');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes that require both authentication and admin privileges
Route::middleware(['auth', 'isadmin'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Product routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
});

require __DIR__.'/auth.php';
