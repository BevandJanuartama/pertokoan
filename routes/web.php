<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckLevel;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Berisi semua route HTTP untuk aplikasi berbasis web.
| Route dapat diberi middleware untuk membatasi akses (contoh: admin/user).
*/

// ========================= HALAMAN UTAMA ========================= //
// Route publik, tidak butuh login
Route::get('/', function () {
    // Menampilkan file resources/views/welcome.blade.php
    return view('welcome');
});


// ================================================================= //
//            ROUTE UNTUK ADMIN (wajib login + level admin)          //
// ================================================================= //
Route::middleware(['auth', CheckLevel::class . ':admin'])->group(function () {

    /**
     * CRUD Toko
     *
     * Route::resource() otomatis membuat:
     * - GET    /toko          -> index
     * - GET    /toko/create   -> create
     * - POST   /toko          -> store
     * - GET    /toko/{id}     -> show
     * - GET    /toko/{id}/edit-> edit
     * - PUT    /toko/{id}     -> update
     * - DELETE /toko/{id}     -> destroy
     */
    Route::resource('toko', TokoController::class);

    /**
     * CRUD Produk
     *
     * Sama seperti di atas, namun untuk entitas produk.
     * Produk juga memiliki foreign key id_toko.
     */
    Route::resource('produk', ProdukController::class);
});


// ================================================================= //
//              ROUTE UNTUK USER (wajib login + level user)          //
// ================================================================= //
Route::middleware(['auth', CheckLevel::class . ':user'])->group(function () {

    /**
     * CRUD User
     *
     * Menampilkan data di dashboard user
     */
    Route::resource('user', UserController::class);
});


// ================================================================= //
//               ROUTE AUTH BAWAAN BREEZE (Login, Register)          //
// ================================================================= //
// Termasuk login, register, forgot password, email verification dll.
require __DIR__ . '/auth.php';
