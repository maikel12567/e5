<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'overview'])->name('welcome');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}', [ProductController::class, 'showhome'])->name('show');




Route::get('/dashboard', [ProductController::class, 'overviewDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'checkUserRole:3'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    //product
    Route::get('/admin/product', [AdminDashboardController::class, 'productIndex'])->name('admin.product');
    Route::get('/admin/product/create', [AdminDashboardController::class, 'productCreate'])->name('admin.product.create');
    Route::post('/admin/product', [AdminDashboardController::class, 'productStore'])->name('admin.product.store');
    Route::get('/admin/product/{id}/edit', [AdminDashboardController::class, 'productEdit'])->name('admin.product.edit');
    Route::put('/admin/product/{id}', [AdminDashboardController::class, 'productUpdate'])->name('admin.product.update');
    Route::delete('/admin/product/{id}', [AdminDashboardController::class, 'productDestroy'])->name('admin.product.destroy');
    //user
    Route::get('/admin/users', [AdminDashboardController::class, 'userIndex'])->name('admin.user');
    Route::get('/admin/user/create', [AdminDashboardController::class, 'userCreate'])->name('admin.user.create');
    Route::post('/admin/user', [AdminDashboardController::class, 'userStore'])->name('admin.user.store');
    Route::get('/admin/user/{id}/edit', [AdminDashboardController::class, 'userEdit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [AdminDashboardController::class, 'userUpdate'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [AdminDashboardController::class, 'userDestroy'])->name('admin.user.destroy');


});

require __DIR__.'/auth.php';