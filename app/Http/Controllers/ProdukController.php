<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Controller Produk untuk halaman admin
 *
 * Mengelola CRUD Produk beserta relasi ke Toko.
 */
class ProdukController extends Controller
{
    /**
     * Menampilkan seluruh produk beserta relasi toko
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $produks = Produk::with('toko')->orderBy('created_at', 'asc')->get();
        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Menampilkan form tambah produk
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tokos = Toko::all(); // Ambil semua toko untuk dropdown pilih toko
        return view('admin.produk.create', compact('tokos'));
    }

    /**
     * Menyimpan produk baru
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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

        // Simpan produk baru
        Produk::create($request->all());

        // Notifikasi sukses
        Alert::success('Berhasil', 'Produk berhasil ditambahkan');

        return redirect()->route('produk.index');
    }

    /**
     * Menampilkan form edit produk
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\View\View
     */
    public function edit(Produk $produk)
    {
        $tokos = Toko::all(); // Ambil semua toko untuk dropdown pilih toko
        return view('admin.produk.edit', compact('produk', 'tokos'));
    }

    /**
     * Menyimpan perubahan data produk
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\RedirectResponse
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

        // Notifikasi sukses
        Alert::success('Berhasil', 'Produk berhasil diperbarui');

        return redirect()->route('produk.index');
    }

    /**
     * Menghapus produk
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        // Notifikasi sukses
        Alert::success('Dihapus', 'Produk berhasil dihapus');

        return redirect()->route('produk.index');
    }
}
