<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TokoController extends Controller
{
    // Menampilkan semua data toko
    public function index()
    {
        $tokos = Toko::all();
        return view('admin.toko.index', compact('tokos'));
    }

    // Menampilkan form tambah toko
    public function create()
    {
        return view('admin.toko.create');
    }

    // Menyimpan data toko baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        Toko::create($request->all());
        Alert::success('Berhasil', 'Toko berhasil ditambahkan');
        return redirect()->route('toko.index');
    }

    // Menampilkan detail toko dan daftar produk yang dimilikinya
    public function show(Toko $toko)
    {
        $produks = $toko->produks;
        return view('admin.toko.show', compact('toko', 'produks'));
    }

    // Menampilkan form edit toko
    public function edit(Toko $toko)
    {
        return view('admin.toko.edit', compact('toko'));
    }

    // Menyimpan perubahan data toko
    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $toko->update($request->all());
        Alert::success('Berhasil', 'Data toko berhasil diperbarui');
        return redirect()->route('toko.index');
    }

    // Menghapus data toko
    public function destroy(Toko $toko)
    {
        $toko->delete();
        Alert::success('Dihapus', 'Data toko berhasil dihapus');
        return redirect()->route('admin.toko.index');
    }
}
