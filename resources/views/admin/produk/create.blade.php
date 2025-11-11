@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-900">Tambah Produk</h1>

{{-- Tampilkan error validasi --}}
@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
        <ul class="list-disc pl-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produk.store') }}" method="POST" class="bg-green-50 p-6 rounded border border-green-300 max-w-lg">
    @csrf

    <div class="mb-6">
        <label for="nama_produk" class="block text-green-900 font-semibold mb-1">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" required
               value="{{ old('nama_produk') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    <div class="mb-6">
        <label for="id_toko" class="block text-green-900 font-semibold mb-1">Toko</label>
        <div class="relative">
            <select name="id_toko" id="id_toko" required
                    class="w-full p-2 pr-10 border border-green-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="" disabled {{ old('id_toko') ? '' : 'selected' }}>-- Pilih Toko --</option>
                @foreach ($tokos as $toko)
                    <option value="{{ $toko->id }}" {{ old('id_toko') == $toko->id ? 'selected' : '' }}>
                        {{ $toko->nama_toko }}
                    </option>
                @endforeach
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-4 h-4 text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <label for="harga" class="block text-green-900 font-semibold mb-1">Harga</label>
        <input type="number" name="harga" id="harga" required
               value="{{ old('harga') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    <div class="mb-6">
        <label for="stok" class="block text-green-900 font-semibold mb-1">Stok</label>
        <input type="number" name="stok" id="stok" required
               value="{{ old('stok') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    <button type="submit"
            class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded transition">
        Simpan
    </button>
</form>

<a href="{{ route('produk.index') }}"
   class="inline-block mt-4 bg-gray-200 hover:bg-gray-300 text-green-900 px-5 py-2 rounded transition">
    ← Kembali ke Daftar Produk
</a>
@endsection
