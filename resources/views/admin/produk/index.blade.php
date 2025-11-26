@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content') {{-- Awal dari bagian konten halaman --}}

{{-- ======================= JUDUL HALAMAN ======================= --}}
<h1 class="text-2xl font-bold mb-4 text-green-900">Daftar Produk</h1>

{{-- Tombol untuk menambahkan produk baru --}}
<a href="{{ route('produk.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Produk
</a>

{{-- Menampilkan pesan sukses setelah operasi CRUD --}}
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
        {{ session('success') }}
    </div>
@endif


{{-- ======================= TABEL PRODUK ======================= --}}
<div class="overflow-x-auto">
    <div class="border-2 border-green-500 rounded-lg overflow-hidden">

        <table class="w-full border-collapse">
            
            {{-- Header tabel --}}
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="w-[10%] px-4 py-3 text-center font-bold border border-green-500">No Produk</th>
                    <th class="w-[20%] px-4 py-3 text-center font-bold border border-green-500">Nama Produk</th>
                    <th class="w-[20%] px-4 py-3 text-center font-bold border border-green-500">Nama Toko</th>
                    <th class="w-[25%] px-4 py-3 text-center font-bold border border-green-500">Harga</th>
                    <th class="w-[5%]  px-4 py-3 text-center font-bold border border-green-500">Stok</th>
                    <th class="w-[20%] px-4 py-3 text-center font-bold border border-green-500">Aksi</th>
                </tr>
            </thead>

            {{-- Body tabel --}}
            <tbody>
                @foreach ($produks as $produk)
                <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">

                    {{-- No urut produk --}}
                    <td class="px-4 py-3 text-center border border-green-500">{{ $loop->iteration }}</td>

                    {{-- Nama produk --}}
                    <td class="px-4 py-3 text-center border border-green-500">
                        {{ $produk->nama_produk }}
                    </td>

                    {{-- Nama toko dari relasi belongsTo --}}
                    <td class="px-4 py-3 text-center border border-green-500">
                        {{ optional($produk->toko)->nama_toko ?? '-' }}
                    </td>

                    {{-- Harga produk --}}
                    <td class="px-4 py-3 border border-green-500">
                        Rp{{ number_format($produk->harga, 0, ',', '.') }}
                    </td>

                    {{-- Stok --}}
                    <td class="px-4 py-3 text-center border border-green-500">
                        {{ $produk->stok }}
                    </td>

                    {{-- Aksi edit & hapus --}}
                    <td class="px-4 py-3 text-center border border-green-500">

                        {{-- Tombol Edit --}}
                        <a href="{{ route('produk.edit', $produk) }}"
                           class="inline-block px-3 py-1 mr-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                            Edit
                        </a>

                        {{-- Tombol Hapus --}}
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
                @endforeach
            </tbody>
        </table>

    </div>
</div>

{{-- Tombol kembali ke halaman daftar toko --}}
<a href="{{ route('toko.index') }}"
   class="inline-block mt-6 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition">
    ← Kembali ke daftar Toko
</a>

@endsection {{-- Akhir dari section konten --}}
