<?php

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

//    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::resource('payment', PaymentController::class)
        ->only(['index', 'store']);
//    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');

});

//Route::middleware(['auth'])->get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
//Route::middleware(['auth'])->get('/payment', [PaymentController::class, 'index'])->name('payment.index');


Route::get('/account', function () {
    return view('pages.account.index');
})->middleware(['auth', 'verified'])->name('account');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
