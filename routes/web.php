<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/busreizen', function () {
    return view('busreizen.index');
})->name('busreizen');

Route::get('/profile', function() {
    return view('profile.index');
})->name('profile');

Route::get('/profile/edit', function() {
    return view('profile.edit');
})->name('edit_profile');

Route::get('/profile/friends', function() {
    return view('profile.friends');
})->name('friends');

Route::get('/login', function() {
    return view('login.index');
})->name('login');

Route::get('/register', function() {
    return view('register.index');
})->name('register');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

Route::get('/beheer', function() {
    return view('beheer.index');
})->name('beheer');

Route::get('/beheer/create', function() {
    return view('beheer.create');
})->name('create_festival');

Route::get('/beheer/edit/{id}', function (string $id) {
    return view('beheer.edit');
})->whereNumber('id')->name('edit_festival');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
