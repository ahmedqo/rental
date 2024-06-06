<?php

use App\Http\Controllers\GuestController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index_view'])->name('views.guest.index');
Route::get('/faqs', [GuestController::class, 'faqs_view'])->name('views.guest.faqs');
Route::get('/fleet', [GuestController::class, 'fleet_view'])->name('views.guest.fleet');
Route::get('/blogs', [GuestController::class, 'blogs_view'])->name('views.guest.blogs');
Route::get('/fleet/{slug}', [GuestController::class, 'show_view'])->name('views.guest.show');
Route::get('/blogs/{slug}', [GuestController::class, 'blog_view'])->name('views.guest.blog');
Route::get('/privacy_policy', [GuestController::class, 'privacy_view'])->name('views.guest.privacy');
Route::get('/terms_and_condition', [GuestController::class, 'terms_view'])->name('views.guest.terms');

Route::post('/reserve', [GuestController::class, 'reserve_action'])->name('actions.guest.reserve');
Route::post('/revie/{id}w', [GuestController::class, 'review_action'])->name('actions.guest.review');

Route::get('/show/{id}', function ($id) {
    $data = Reservation::with('Car')->where('id', $id)->limit(1)->first();
    return view('mail.reserve', compact('data'));
});
