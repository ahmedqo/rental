<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index_view'])->name('views.guest.index');
Route::get('/fleet', [GuestController::class, 'fleet_view'])->name('views.guest.fleet');
Route::get('/blogs', [GuestController::class, 'blogs_view'])->name('views.guest.blogs');
Route::get('/fleet/{slug}', [GuestController::class, 'show_view'])->name('views.guest.show');
Route::get('/blogs/{slug}', [GuestController::class, 'blog_view'])->name('views.guest.blog');

Route::post('/order', [GuestController::class, 'order_action'])->name('actions.guest.order');
