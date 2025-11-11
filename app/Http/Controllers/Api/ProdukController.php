<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Menampilkan seluruh produk beserta relasi toko
    public function index()
    {
        $produks = Produk::with('toko')->orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $produks
        ]);
    }

    // Menampilkan daftar toko untuk form tambah produk (opsional)
    public function create()
    {
        $tokos = Toko::all();

        return response()->json([
            'success' => true,
            'data' => $tokos
        ]);
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_toko' => 'required|exists:toko,id',
        ]);

        $produk = Produk::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk
        ]);
    }

    // Menampilkan detail produk
    public function show(Produk $produk)
    {
        $produk->load('toko');

        return response()->json([
            'success' => true,
            'data' => $produk
        ]);
    }

    // Menampilkan data produk yang akan diedit
    public function edit(Produk $produk)
    {
        $tokos = Toko::all();

        return response()->json([
            'success' => true,
            'data' => [
                'produk' => $produk,
                'tokos' => $tokos
            ]
        ]);
    }

    // Memperbarui data produk
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_toko' => 'required|exists:toko,id',
        ]);

        $produk->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui',
            'data' => $produk
        ]);
    }

    // Menghapus produk
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus produk',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
