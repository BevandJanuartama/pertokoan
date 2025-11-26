@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content') {{-- Awal section konten --}}

{{-- ======================= JUDUL HALAMAN ======================= --}}
<h1 class="text-2xl font-bold mb-4 text-green-900">Detail Toko</h1>

{{-- ======================= INFORMASI TOKO ======================= --}}
<div class="mb-6 p-4 border-2 border-green-500 rounded-lg bg-green-50 text-green-900 space-y-2 text-[17px]">
    {{-- Menampilkan data toko --}}
    <p><strong>Nama Toko:</strong> {{ $toko->nama_toko }}</p>
    <p><strong>Alamat:</strong> {{ $toko->alamat }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $toko->nomor_telepon }}</p>
</div>

{{-- ======================= TOMBOL TAMBAH PRODUK ======================= --}}
{{-- Menuju form tambah produk baru --}}
<a href="{{ route('produk.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Produk
</a>

{{-- ======================= TABEL PRODUK ======================= --}}
<div class="overflow-x-auto"> {{-- Agar tabel tetap responsif --}}
    <div class="border-2 border-green-500 rounded-lg overflow-hidden"> {{-- Border luar tabel --}}
        
        <table class="w-full border-collapse">
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="w-[10%] px-4 py-3 text-center font-bold border border-green-500">No Produk</th>
                    <th class="w-[25%] px-4 py-3 text-center font-bold border border-green-500">Nama Produk</th>
                    <th class="w-[25%] px-4 py-3 text-center font-bold border border-green-500">Harga</th>
                    <th class="w-[15%] px-4 py-3 text-center font-bold border border-green-500">Stok</th>
                    <th class="w-[25%] px-4 py-3 text-center font-bold border border-green-500">Aksi</th>
                </tr>
            </thead>

            <tbody>
                {{-- Looping semua produk yang berasal dari toko ini --}}
                @forelse($produks as $produk)
                <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">
                    
                    {{-- Nomor urut --}}
                    <td class="px-4 py-3 text-center border border-green-500">{{ $loop->iteration }}</td>

                    {{-- Nama produk --}}
                    <td class="px-4 py-3 border border-green-500">{{ $produk->nama_produk }}</td>

                    {{-- Harga dalam format ribuan --}}
                    <td class="px-4 py-3 border border-green-500">
                        Rp{{ number_format($produk->harga, 0, ',', '.') }}
                    </td>

                    {{-- Stok --}}
                    <td class="px-4 py-3 text-center border border-green-500">{{ $produk->stok }}</td>
                    
                    {{-- Aksi edit dan hapus --}}
                    <td class="px-4 py-3 text-center border border-green-500">

                        {{-- Tombol Edit --}}
                        <a href="{{ route('produk.edit', $produk) }}"
                           class="inline-block px-3 py-1 mr-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                            Edit
                        </a>

                        {{-- Tombol Hapus produk --}}
                        <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin hapus produk ini?')"
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>

                @empty
                {{-- Jika toko belum memiliki produk --}}
                <tr>
                    <td colspan="5" class="text-center px-4 py-4 border border-green-500 text-gray-600">
                        Belum ada produk di toko ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

{{-- ======================= TOMBOL KEMBALI ======================= --}}
<a href="{{ route('toko.index') }}"
   class="inline-block mt-6 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition">
    ← Kembali ke daftar toko
</a>

@endsection {{-- Akhir dari konten --}}
