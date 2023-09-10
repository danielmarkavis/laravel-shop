<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCompleteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::group([
    'middleware' => 'web',
], function() {
    Route::resource('products', ProductController::class)
        ->parameters(['products' => 'product:sku'])->only(['index','show']);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{variant:sku}', [CartController::class, 'store'])->name('add.to.cart');
    Route::get('/delete-from-cart/{variant:sku}', [CartController::class, 'destroy'])->name('delete.from.cart');
});

Route::group([
    'middleware' => 'auth'
], function() {
    Route::resource('checkout', CheckoutController::class)
        ->only(['index', 'store']);

    Route::resource('payment', PaymentController::class)
        ->parameters(['payment' => 'order:uuid'])->only(['index', 'store', 'show']);

    Route::resource('account', AccountController::class)
        ->only(['index']);

    Route::resource('orders', OrderController::class)
        ->parameters(['orders' => 'order:uuid'])->only(['index', 'show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
