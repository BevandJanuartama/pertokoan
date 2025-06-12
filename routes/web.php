<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

// Route resource untuk CRUD Toko
Route::resource('toko', TokoController::class);

// Route resource untuk CRUD Produk
Route::resource('produk', ProdukController::class);
