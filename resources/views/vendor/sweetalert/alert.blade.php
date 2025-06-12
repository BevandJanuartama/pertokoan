{{-- Mengecek apakah SweetAlert perlu dimuat berdasarkan konfigurasi atau session --}}
@if (config('sweetalert.alwaysLoadJS') === true || Session::has('alert.config') || Session::has('alert.delete'))

    {{-- Jika animasi diaktifkan, muat stylesheet Animate.css --}}
    @if (config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif

    {{-- Jika tema SweetAlert bukan 'default', muat tema yang sesuai dari CDN --}}
    @if (config('sweetalert.theme') != 'default')
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-{{ config('sweetalert.theme') }}" rel="stylesheet">
    @endif

    {{-- Jika pengaturan tidak melarang pemuatan JS, muat library SweetAlert --}}
    @if (config('sweetalert.neverLoadJS') === false)
        <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @endif

    {{-- Jika ada session alert untuk delete atau konfigurasi alert lainnya --}}
    @if (Session::has('alert.delete') || Session::has('alert.config'))
        <script>
            // Tambahkan event listener untuk semua klik
            document.addEventListener('click', function(event) {
                // Cek apakah elemen yang diklik atau induknya memiliki atribut data-confirm-delete
                var target = event.target;
                var confirmDeleteElement = target.closest('[data-confirm-delete]');

                // Jika ditemukan elemen dengan data-confirm-delete
                if (confirmDeleteElement) {
                    event.preventDefault(); // Hentikan default action (biasanya redirect)

                    // Tampilkan SweetAlert konfirmasi delete
                    Swal.fire({!! Session::pull('alert.delete') !!}).then(function(result) {
                        if (result.isConfirmed) {
                            // Jika pengguna konfirmasi, buat form delete secara dinamis
                            var form = document.createElement('form');
                            form.action = confirmDeleteElement.href;
                            form.method = 'POST';

                            // Masukkan token CSRF dan metode DELETE
                            form.innerHTML = `
                            @csrf
                            @method('DELETE')
                        `;
                            document.body.appendChild(form);
                            form.submit(); // Submit form
                        }
                    });
                }
            });

            {{-- Tampilkan alert umum jika ada konfigurasi alert --}}
            @if (Session::has('alert.config'))
                Swal.fire({!! Session::pull('alert.config') !!});
            @endif
        </script>
    @endif
@endif
