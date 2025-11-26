<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $level
     */
    public function handle(Request $request, Closure $next, $level)
    {
        // Cek apakah user sudah login dan level user sesuai dengan level yang dibutuhkan
        if (!Auth::check() || Auth::user()->level !== $level) {
            abort(403, 'Akses ditolak.'); // Jika tidak cocok, tampilkan error 403
        }

        // Jika lolos pengecekan, lanjutkan ke request berikutnya
        return $next($request);
    }
}
