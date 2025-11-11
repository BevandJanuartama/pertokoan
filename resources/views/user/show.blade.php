<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Toko - {{ $toko->nama_toko }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    {{-- Judul dan Info Toko --}}
    <h2 class="text-primary mb-3">{{ $toko->nama_toko }}</h2>
    <p><strong>Alamat:</strong> {{ $toko->alamat }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $toko->nomor_telepon }}</p>

    <hr>

    {{-- Daftar Produk --}}
    <h4 class="mt-4 mb-3">🧾 Daftar Produk di Toko Ini</h4>

    @if($produks->isEmpty())
      <div class="alert alert-warning">Belum ada produk di toko ini.</div>
    @else
      <div class="row">
        @foreach($produks as $produk)
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              @if($produk->foto)
                <img src="{{ asset('storage/' . $produk->foto) }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
              @endif
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                @if($produk->deskripsi)
                  <p class="card-text text-muted flex-grow-1">{{ $produk->deskripsi }}</p>
                @endif
                <p class="fw-bold mb-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                <span class="badge bg-success mb-2">Stok: {{ $produk->stok }}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    {{-- Tombol kembali --}}
    <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">⬅ Kembali ke Daftar Toko</a>
  </div>
</body>
</html>
