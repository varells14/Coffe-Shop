<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/shop');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::post('/admin/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.status');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
Route::post('/admin/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
Route::put('/admin/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
Route::put('/admin/products/update/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');

Route::get('/shop', [CustomerController::class, 'products'])->name('shop');
Route::post('/cart/add/{id}', [CustomerController::class, 'addToCart']);
Route::post('/cart/remove/{id}', [CustomerController::class, 'remove']);
Route::post('/cart/clear', [CustomerController::class, 'clearCart']);
Route::post('/checkout', [CustomerController::class, 'checkout']);



require __DIR__.'/auth.php';
