<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    // Menampilkan seluruh produk beserta relasi toko
    public function index()
    {
        $produks = Produk::with('toko')->orderBy('created_at', 'asc')->get();
        return view('admin.produk.index', compact('produks'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $tokos = Toko::all(); // untuk dropdown pilih toko
        return view('admin.produk.create', compact('tokos'));
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

        Produk::create($request->all());

        Alert::success('Berhasil', 'Produk berhasil ditambahkan');
        return redirect()->route('produk.index');
    }

    // Menampilkan form edit produk
    public function edit(Produk $produk)
    {
        $tokos = Toko::all();
        return view('admin.produk.edit', compact('produk', 'tokos'));
    }

    // Menyimpan perubahan data produk
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_toko' => 'required|exists:toko,id',
        ]);

        $produk->update($request->all());

        Alert::success('Berhasil', 'Produk berhasil diperbarui');
        return redirect()->route('produk.index');
    }

    // Menghapus produk
    public function destroy(Produk $produk)
    {
        $produk->delete();

        Alert::success('Dihapus', 'Produk berhasil dihapus');
        return redirect()->route('admin.produk.index');
    }
}
