<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;

// Halaman utama (Inertia)
Route::get('/', function () {
    return Inertia::render('welcome');
});

// Dashboard hanya bisa diakses jika login & sudah verifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup route yang butuh autentikasi
Route::middleware('auth')->group(function () {
    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Toko, Produk, User
    Route::resource('toko', TokoController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
});

// Route auth bawaan Breeze
require __DIR__ . '/auth.php';
