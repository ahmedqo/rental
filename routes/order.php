<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/orders', [OrderController::class, 'index_view'])->name('views.orders.index');
    Route::get('/orders/store', [OrderController::class, 'store_view'])->name('views.orders.store');
    Route::get('/orders/{id}/patch', [OrderController::class, 'patch_view'])->name('views.orders.patch');

    Route::post('/orders/store', [OrderController::class, 'store_action'])->name('actions.orders.store');
    Route::get('/orders/search', [OrderController::class, 'search_action'])->name('actions.orders.search');
    Route::patch('/orders/{id}/patch', [OrderController::class, 'patch_action'])->name('actions.orders.patch');
    Route::delete('/orders/{id}/clear', [OrderController::class, 'clear_action'])->name('actions.orders.clear');
});
