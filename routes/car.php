<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/cars', [CarController::class, 'index_view'])->name('views.cars.index');
    Route::get('/cars/store', [CarController::class, 'store_view'])->name('views.cars.store');
    Route::get('/cars/{id}/patch', [CarController::class, 'patch_view'])->name('views.cars.patch');
    Route::get('/cars/{id}/scene', [CarController::class, 'scene_view'])->name('views.cars.scene');

    Route::post('/cars/store', [CarController::class, 'store_action'])->name('actions.cars.store');
    Route::get('/cars/search', [CarController::class, 'search_action'])->name('actions.cars.search');
    Route::patch('/cars/{id}/patch', [CarController::class, 'patch_action'])->name('actions.cars.patch');
    Route::delete('/cars/{id}/clear', [CarController::class, 'clear_action'])->name('actions.cars.clear');
    Route::get('/cars/{id}/reservations', [CarController::class, 'reservations_action'])->name('actions.cars.reservations');
});
