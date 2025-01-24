<?php

use App\Http\Controllers\BeheerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use App\Models\Festival;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/busreizen', [TripController::class, 'index'])->name('busreizen');
Route::get('/busreizen/search', [TripController::class, 'search'])->name('search_busreizen');
Route::get('/busreizen/search/{destination}', [TripController::class, 'searchByDestination'])->name('search_destination_busreizen');
Route::get('/contact', fn() => view('contact.index'))->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/busreizen/order/{id}', [BookingController::class, 'index'])->name('order_busreis');
    Route::post('/busreizen/order/complete', [BookingController::class, 'store'])->name('store_order');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', fn() => view('profile.edit'))->name('edit_profile');
    Route::get('/profile/friends', fn() => view('profile.add'))->name('add_friends');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('beheer')->group(function () {
    Route::get('/', [BeheerController::class, 'index'])->name('beheer');
    Route::get('/festival/{festivalInfo}', [BeheerController::class, 'show'])->name('beheer.show');
    Route::get('/create', fn() => view('beheer.create'))->name('create_festival');
    Route::post('/', [FestivalController::class, 'store'])->name('store_festival');
    Route::get('/edit/{id}', fn(int $id) => view('beheer.edit', ['festival' => Festival::findOrFail($id)]))->name('edit_festival');
    Route::patch('/edit/{festival}', [FestivalController::class, 'update'])->name('update_festival');
});

require __DIR__.'/auth.php';
