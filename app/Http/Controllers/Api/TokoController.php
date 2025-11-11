<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $tokos = Toko::all();
        return response()->json([
            'success' => true,
            'data' => $tokos
        ]);
    }

    public function create()
    {
        return response()->json([
            'success' => true,
            'message' => 'Form tambah toko tersedia'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $toko = Toko::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Toko berhasil ditambahkan',
            'data' => $toko
        ]);
    }

    public function show(Toko $toko)
    {
        $produks = $toko->produks;
        return response()->json([
            'success' => true,
            'data' => [
                'toko' => $toko,
                'produks' => $produks
            ]
        ]);
    }

    public function edit(Toko $toko)
    {
        return response()->json([
            'success' => true,
            'data' => $toko
        ]);
    }

    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $toko->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Data toko berhasil diperbarui',
            'data' => $toko
        ]);
    }

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
