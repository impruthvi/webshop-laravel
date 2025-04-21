<?php

use App\Livewire\Cart;
use App\Livewire\CheckoutStatus;
use App\Livewire\MyOrders;
use App\Livewire\Product;
use App\Livewire\StoreFront;
use App\Livewire\ViewOrder;
use Illuminate\Support\Facades\Route;

Route::get('/', StoreFront::class)->name('home');
Route::get('/products/{productId}', Product::class)->name('product.show');
Route::get('/cart', Cart::class)->name('cart');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/checkout-status', CheckoutStatus::class)->name('checkout-status');
    Route::get('/order/{orderId}', ViewOrder::class)->name('order.show');
    Route::get('/my-orders', MyOrders::class)->name('my-orders');
});
