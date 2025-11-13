<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

/**
 * Controller Produk untuk API
 *
 * Mengelola CRUD produk dan mengembalikan data dalam format JSON.
 * Produk berelasi dengan Toko (Many-to-One).
 */
class ProdukController extends Controller
{
    /**
     * Menampilkan semua produk beserta data toko terkait
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $produks = Produk::with('toko')->orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $produks
        ]);
    }

    /**
     * Menampilkan daftar toko untuk form tambah produk (opsional)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        $tokos = Toko::all();

        return response()->json([
            'success' => true,
            'data' => $tokos
        ]);
    }

    /**
     * Menyimpan produk baru
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_toko' => 'required|exists:toko,id',
        ]);

        // Simpan produk
        $produk = Produk::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk
        ]);
    }

    /**
     * Menampilkan detail produk beserta data toko
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Produk $produk)
    {
        $produk->load('toko');

        return response()->json([
            'success' => true,
            'data' => $produk
        ]);
    }

    /**
     * Menampilkan data produk yang akan diedit
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Memperbarui data produk
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Produk $produk)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_toko' => 'required|exists:toko,id',
        ]);

        // Update produk
        $produk->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui',
            'data' => $produk
        ]);
    }

    /**
     * Menghapus produk
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\JsonResponse
     */
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
