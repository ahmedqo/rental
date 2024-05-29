<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index_view'])->name('views.guest.index');
Route::get('/fleet', [GuestController::class, 'fleet_view'])->name('views.guest.fleet');
Route::get('/fleet/{slug}', [GuestController::class, 'show_view'])->name('views.guest.show');
