@extends('layouts.app') {{-- Menggunakan layout utama aplikasi --}}

@section('content') {{-- Awal dari section konten --}}

<h1 class="text-2xl font-bold mb-4 text-green-900">Edit Toko</h1>

{{-- Form edit data toko --}}
<form action="{{ route('toko.update', $toko->id) }}" method="POST" 
      class="bg-white p-6 border border-green-300 rounded-lg shadow-sm max-w-xl">
    @csrf {{-- Token keamanan untuk mencegah CSRF --}}
    @method('PUT') {{-- Method spoofing untuk update (karena HTML hanya dukung GET/POST) --}}

    {{-- Input Nama Toko --}}
    <div class="mb-4">
        <label for="nama_toko" class="block text-green-800 font-semibold mb-2">Nama Toko:</label>
        <input type="text" name="nama_toko" id="nama_toko"
               value="{{ old('nama_toko', $toko->nama_toko) }}"
               required
               class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('nama_toko')
            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Input Alamat Toko --}}
    <div class="mb-4">
        <label for="alamat" class="block text-green-800 font-semibold mb-2">Alamat:</label>
        <textarea name="alamat" id="alamat" rows="3"
                  class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                  required>{{ old('alamat', $toko->alamat) }}</textarea>
        @error('alamat')
            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Input Pemilik Toko --}}
    <div class="mb-4">
        <label for="pemilik" class="block text-green-800 font-semibold mb-2">Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" id="nomor_telepon"
               value="{{ old('nomor_telepon', $toko->nomor_telepon) }}"
               required
               class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('nomor_telepon')
            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tombol aksi --}}
    <div class="flex gap-4">
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition">
            Update
        </button>

        <a href="{{ route('toko.index') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded transition inline-block text-center">
            Batal
        </a>
    </div>
</form>

@endsection {{-- Akhir dari section konten --}}
