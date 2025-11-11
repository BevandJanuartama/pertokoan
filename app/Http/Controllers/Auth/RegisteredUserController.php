<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan form register.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Proses register user baru.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Simpan data user baru
        $user = User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
            'level' => 'user', // default
        ]);

        // Buat kredensial untuk login otomatis
        $credentials = $request->only('username', 'password');

        // Coba autentikasi berdasarkan username & password
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect sesuai level user
            $user = Auth::user();
            if ($user->level === 'admin') {
                return redirect()->intended('/toko');
            } else {
                return redirect()->intended('/user');
            }
        }

        // Jika gagal login otomatis (harusnya jarang)
        return redirect()->route('login')->with('status', 'Akun berhasil dibuat, silakan login.');
    }
}
