<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;

/**
 * Controller Toko untuk API
 *
 * Mengelola CRUD Toko dan mengembalikan data dalam format JSON.
 * Setiap Toko dapat memiliki banyak Produk (relasi one-to-many).
 */
class TokoController extends Controller
{
    /**
     * Menampilkan semua toko
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tokos = Toko::all();

        return response()->json([
            'success' => true,
            'data' => $tokos
        ]);
    }

    /**
     * Menampilkan info form tambah toko (opsional)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return response()->json([
            'success' => true,
            'message' => 'Form tambah toko tersedia'
        ]);
    }

    /**
     * Menyimpan toko baru
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        // Simpan data toko
        $toko = Toko::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Toko berhasil ditambahkan',
            'data' => $toko
        ]);
    }

    /**
     * Menampilkan detail toko beserta produk terkait
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Toko $toko)
    {
        $produks = $toko->produks; // Relasi produk

        return response()->json([
            'success' => true,
            'data' => [
                'toko' => $toko,
                'produks' => $produks
            ]
        ]);
    }

    /**
     * Menampilkan data toko yang akan diedit
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Toko $toko)
    {
        return response()->json([
            'success' => true,
            'data' => $toko
        ]);
    }

    /**
     * Memperbarui data toko
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Toko $toko)
    {
        // Validasi input
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        // Update data toko
        $toko->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data toko berhasil diperbarui',
            'data' => $toko
        ]);
    }

    /**
     * Menghapus toko
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Toko $toko)
    {
        try {
            $toko->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data toko berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus toko',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
