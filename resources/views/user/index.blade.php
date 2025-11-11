<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Toko</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">

    <!-- Header dengan Logout -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="text-primary">🛍️ Daftar Toko</h2>

      <!-- Tombol Logout -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </div>

    <!-- Daftar Toko -->
    <div class="row">
      @foreach($tokos as $toko)
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">{{ $toko->nama_toko }}</h5>
              <p class="card-text">
                <strong>Alamat:</strong> {{ $toko->alamat }} <br>
                <strong>Telepon:</strong> {{ $toko->nomor_telepon }}
              </p>
              <a href="{{ route('user.show', $toko) }}" class="btn btn-primary w-100">
                Lihat Detail
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</body>
</html>
