@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content') {{-- Awal dari section 'content' --}}

<h1 class="text-2xl font-bold mb-4 text-green-900">Tambah Toko</h1>

{{-- Menampilkan error validasi jika ada --}}
@if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form untuk menambahkan data toko --}}
<form action="{{ route('toko.store') }}" method="POST" class="space-y-4">
    @csrf {{-- Token keamanan Laravel untuk mencegah CSRF --}}

    {{-- Input nama toko --}}
    <div>
        <label class="block mb-1 font-semibold text-green-800">Nama Toko</label>
        <input type="text" name="nama_toko" value="{{ old('nama_toko') }}"
               class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600"
               required>
    </div>

    {{-- Input alamat toko --}}
    <div>
        <label class="block mb-1 font-semibold text-green-800">Alamat</label>
        <textarea name="alamat" rows="3"
                  class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600"
                  required>{{ old('alamat') }}</textarea>
    </div>

    {{-- Input nama pemilik --}}
    <div>
        <label class="block mb-1 font-semibold text-green-800">Nomor Telepon</label>
        <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
               class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600"
               required>
    </div>

    {{-- Tombol aksi --}}
    <div class="flex items-center gap-4 mt-6">
        <button type="submit"
                class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
            Simpan
        </button>

        <a href="{{ route('toko.index') }}"
           class="px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition">
            ← Kembali
        </a>
    </div>
</form>

@endsection {{-- Akhir section konten --}}
