@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content') {{-- Awal dari bagian konten --}}

<h1 class="text-3xl font-bold mb-4 text-green-900">Daftar Toko</h1>

{{-- Tombol untuk menambahkan toko baru --}}
<a href="{{ route('toko.create') }}"
   class="text-xl inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Toko
</a>

{{-- Menampilkan pesan sukses jika ada --}}
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- Tabel data toko --}}
<div class="overflow-x-auto">
    <div class="border-2 border-green-500 rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="px-4 py-3 text-center border border-green-500">No</th>
                    <th class="px-4 py-3 text-center border border-green-500">Nama Toko</th>
                    <th class="px-4 py-3 text-center border border-green-500">Alamat</th>
                    <th class="px-4 py-3 text-center border border-green-500">Nomor Telepon</th>
                    <th class="px-4 py-3 text-center border border-green-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tokos as $toko)
                <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">
                    <td class="px-4 py-3 text-center border border-green-500">{{ $loop->iteration }}</td>

                    <td class="px-4 py-3 border border-green-500">
                        <a href="{{ route('toko.show', $toko) }}" class="text-green-900 hover:underline">
                            {{ $toko->nama_toko }}
                        </a>
                    </td>

                    <td class="px-4 py-3 text-center border border-green-500">{{ $toko->alamat }}</td>

                    <td class="px-4 py-3 text-center border border-green-500">{{ $toko->nomor_telepon }}</td>

                    <td class="px-4 py-3 text-center border border-green-500">
                        <a href="{{ route('toko.edit', $toko) }}"
                           class="inline-block px-3 py-1 mr-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                            Edit
                        </a>

                        <form action="{{ route('toko.destroy', $toko) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus toko ini?')"
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

@endsection {{-- Akhir dari section konten --}}
