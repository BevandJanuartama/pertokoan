<?php

namespace App\Http\Controllers;

use App\Models\Toko; // Model Toko untuk akses database
use Illuminate\Http\Request; // Untuk menerima input dari form
use RealRashid\SweetAlert\Facades\Alert; // Untuk menampilkan notifikasi popup

class TokoController extends Controller
{
    /**
     * Menampilkan semua data toko
     * Route: GET /toko
     */
    public function index()
    {
        $tokos = Toko::all(); // Ambil semua data toko dari database
        return view('admin.toko.index', compact('tokos')); 
        // Kirim data ke view admin.toko.index
    }

    /**
     * Menampilkan form tambah toko
     * Route: GET /toko/create
     */
    public function create()
    {
        return view('admin.toko.create'); // Tampilkan halaman form tambah toko
    }

    /**
     * Menyimpan data toko baru ke database
     * Route: POST /toko
     * @param Request $request Input dari form
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        Toko::create($request->all()); // Simpan data ke tabel toko
        Alert::success('Berhasil', 'Toko berhasil ditambahkan'); // Popup notifikasi
        return redirect()->route('toko.index'); // Kembali ke daftar toko
    }

    /**
     * Menampilkan detail toko dan daftar produk yang dimilikinya
     * Route: GET /toko/{toko}
     * @param Toko $toko Route Model Binding
     */
    public function show(Toko $toko)
    {
        $produks = $toko->produks; // Ambil semua produk milik toko
        return view('admin.toko.show', compact('toko', 'produks'));
    }

    /**
     * Menampilkan form edit toko
     * Route: GET /toko/{toko}/edit
     * @param Toko $toko Route Model Binding
     */
    public function edit(Toko $toko)
    {
        return view('admin.toko.edit', compact('toko')); // Tampilkan form edit
    }

    /**
     * Menyimpan perubahan data toko
     * Route: PUT/PATCH /toko/{toko}
     * @param Request $request Input dari form
     * @param Toko $toko Data toko yang akan diupdate (Route Model Binding)
     */
    public function update(Request $request, Toko $toko)
    {
        // Validasi input
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $toko->update($request->all()); // Update data di database
        Alert::success('Berhasil', 'Data toko berhasil diperbarui'); // Popup notifikasi
        return redirect()->route('toko.index'); // Kembali ke daftar toko
    }

    /**
     * Menghapus data toko
     * Route: DELETE /toko/{toko}
     * @param Toko $toko Data toko yang akan dihapus (Route Model Binding)
     */
    public function destroy(Toko $toko)
    {
        $toko->delete(); // Hapus dari database
        Alert::success('Dihapus', 'Data toko berhasil dihapus'); // Popup notifikasi
        return redirect()->route('toko.index'); // Kembali ke daftar toko
    }
}
