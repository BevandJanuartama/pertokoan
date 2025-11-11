<!DOCTYPE html>
<html>
<head>
    <title>Toko Ijo</title> {{-- Judul halaman di tab browser --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Link CDN Tailwind CSS untuk styling responsif dan modern --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800"> {{-- Warna latar belakang dan teks --}}

    {{-- Navbar / Navigasi utama --}}
    <nav class="bg-green-800 text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">

            {{-- Logo atau nama aplikasi --}}
            <div class="text-lg font-bold tracking-wide">
                Toko Ijo
            </div>

            {{-- Link navigasi --}}
            <div class="space-x-4">
                {{-- Menu ke halaman pasien --}}
                <a href="{{ route('toko.index') }}" class="hover:bg-green-700 px-3 py-2 rounded transition">
                    Toko
                </a>

                {{-- Menu ke halaman antrian --}}
                <a href="{{ route('produk.index') }}" class="hover:bg-green-700 px-3 py-2 rounded transition">
                    Produk
                </a>

                {{-- Menu tambahan jika ingin dikembangkan --}}
                {{-- <a href="#" class="hover:bg-green-700 px-3 py-2 rounded transition">Dokter</a> --}}
            </div>
        </div>
    </nav>

    {{-- Area utama untuk menampilkan konten dari halaman lain --}}
    <div class="container mx-auto p-4">
        @yield('content') {{-- Bagian konten akan diisi oleh file seperti index, create, dll --}}

        {{-- Plugin SweetAlert untuk notifikasi sukses atau error --}}
        @include('sweetalert::alert')
    </div>
</body>
</html>