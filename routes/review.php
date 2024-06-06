<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/reviews', [ReviewController::class, 'index_view'])->name('views.reviews.index');
    Route::get('/reviews/store', [ReviewController::class, 'store_view'])->name('views.reviews.store');
    Route::get('/reviews/{id}/patch', [ReviewController::class, 'patch_view'])->name('views.reviews.patch');

    Route::post('/reviews/store', [ReviewController::class, 'store_action'])->name('actions.reviews.store');
    Route::get('/reviews/search', [ReviewController::class, 'search_action'])->name('actions.reviews.search');
    Route::patch('/reviews/{id}/patch', [ReviewController::class, 'patch_action'])->name('actions.reviews.patch');
    Route::delete('/reviews/{id}/clear', [ReviewController::class, 'clear_action'])->name('actions.reviews.clear');
});
