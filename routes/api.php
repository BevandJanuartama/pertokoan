<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokoController;
use App\Http\Controllers\Api\ProdukController;

// Route API untuk CRUD Toko
Route::apiResource('toko', TokoController::class);

// Route API untuk CRUD Produk
Route::apiResource('produk', ProdukController::class);
