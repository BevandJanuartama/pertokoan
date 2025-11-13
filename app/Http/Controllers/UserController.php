<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Untuk menangani input dari form atau query
use App\Models\Toko;         // Model Toko, karena user akan melihat toko dan produknya

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan daftar semua toko untuk user
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua data toko
        $tokos = Toko::all();

        // Kirim data ke view 'user.index'
        return view('user.index', compact('tokos'));
    }

    /**
     * Show the form for creating a new resource.
     * Biasanya untuk menampilkan form tambah, tapi belum digunakan
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Untuk menyimpan data baru ke database, belum digunakan
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Menampilkan detail toko dan daftar produk miliknya
     * @param \App\Models\Toko $user
     * @return \Illuminate\View\View
     */
    public function show(Toko $user)
    {
        // Ambil produk yang dimiliki toko
        $produks = $user->produks;

        // Kirim data toko dan produknya ke view 'user.show'
        return view('user.show', [
            'toko' => $user,
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * Biasanya menampilkan form edit, belum digunakan
     * @param string $id
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Untuk menyimpan perubahan data ke database, belum digunakan
     * @param \Illuminate\Http\Request $request
     * @param string $id
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Untuk menghapus data, belum digunakan
     * @param string $id
     */
    public function destroy(string $id)
    {
        //
    }
}
