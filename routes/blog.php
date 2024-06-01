<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/blogs', [BlogController::class, 'index_view'])->name('views.blogs.index');
    Route::get('/blogs/store', [BlogController::class, 'store_view'])->name('views.blogs.store');
    Route::get('/blogs/{id}/patch', [BlogController::class, 'patch_view'])->name('views.blogs.patch');

    Route::post('/blogs/store', [BlogController::class, 'store_action'])->name('actions.blogs.store');
    Route::get('/blogs/search', [BlogController::class, 'search_action'])->name('actions.blogs.search');
    Route::patch('/blogs/{id}/patch', [BlogController::class, 'patch_action'])->name('actions.blogs.patch');
    Route::delete('/blogs/{id}/clear', [BlogController::class, 'clear_action'])->name('actions.blogs.clear');
});
