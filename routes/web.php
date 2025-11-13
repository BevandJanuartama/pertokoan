<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route web utama aplikasi
| Middleware dipakai untuk membatasi akses sesuai kebutuhan
*/

// ===================== HALAMAN UTAMA ===================== //
// Route publik homepage menggunakan Inertia
Route::get('/', function () {
    return Inertia::render('welcome'); // Halaman frontend Inertia 'welcome'
});

// ===================== DASHBOARD ===================== //
// Hanya user login dan sudah verifikasi email
Route::get('/dashboard', function () {
    return view('dashboard'); // View Blade dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// ===================== GRUP ROUTE LOGIN ===================== //
// Semua route di dalam ini hanya bisa diakses user yang login
Route::middleware('auth')->group(function () {

    // ===================== PROFIL ===================== //
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');    // Form edit profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Simpan perubahan
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Hapus akun

    // ===================== CRUD TOKO ===================== //
    // Membuat semua route CRUD otomatis: index, create, store, show, edit, update, destroy
    Route::resource('toko', TokoController::class);

    // ===================== CRUD PRODUK ===================== //
    Route::resource('produk', ProdukController::class);

    // ===================== CRUD USER ===================== //
    Route::resource('user', UserController::class);
});

// ===================== ROUTE AUTH BAWAAN BREEZE ===================== //
// Login, register, logout, forgot password, email verification
require __DIR__ . '/auth.php';
