@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content') {{-- Awal section konten --}}

<h1 class="text-2xl font-bold mb-4 text-green-900">Detail Toko</h1>

{{-- Menampilkan informasi toko --}}
<div class="mb-6 p-4 border-2 border-green-500 rounded-lg bg-green-50 text-green-900 space-y-2 text-[17px]">
    <p><strong>Nama Toko:</strong> {{ $toko->nama_toko }}</p>
    <p><strong>Alamat:</strong> {{ $toko->alamat }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $toko->nomor_telepon }}</p>
</div>

{{-- Tombol untuk menambah produk --}}
<a href="{{ route('produk.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Produk
</a>

{{-- Tabel daftar produk --}}
<div class="overflow-x-auto">
    <div class="border-2 border-green-500 rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="w-[5%] px-4 py-3 text-center font-bold border border-green-500">No</th>
                    <th class="w-[45%] px-4 py-3 font-bold border border-green-500">Nama Produk</th>
                    <th class="w-[30%] px-4 py-3 font-bold border border-green-500">Harga</th>
                    <th class="w-[20%] px-4 py-3 text-center font-bold border border-green-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $produk)
                <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">
                    <td class="px-4 py-3 text-center border border-green-500">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 border border-green-500">{{ $produk->nama_produk }}</td>

                    <td class="px-4 py-3 border border-green-500">Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                    
                    <td class="px-4 py-3 text-center border border-green-500">
                        <a href="{{ route('produk.edit', $produk) }}"
                           class="inline-block px-3 py-1 mr-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                            Edit
                        </a>

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
                <tr>
                    <td colspan="4" class="text-center px-4 py-4 border border-green-500 text-gray-600">
                        Belum ada produk di toko ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Tombol kembali ke daftar toko --}}
<a href="{{ route('toko.index') }}"
   class="inline-block mt-6 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition">
    ← Kembali ke daftar toko
</a>

@endsection {{-- Akhir dari konten --}}
