<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration ini digunakan untuk membuat tabel `users`
 * yang menyimpan data akun pengguna (user & admin).
 * 
 * Kolom yang disediakan:
 * - id: primary key (auto increment)
 * - username: nama pengguna unik untuk login
 * - password: kata sandi terenkripsi (bcrypt)
 * - level: peran pengguna (contoh: 'user', 'admin')
 * - nama_lengkap: nama asli pengguna
 * - telepon: nomor telepon (opsional)
 * - timestamps: waktu pembuatan dan pembaruan data
 */
return new class extends Migration {
    /**
     * Jalankan migration (membuat tabel users)
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Kolom ID utama (auto increment)
            $table->id();

            // Kolom username, harus unik agar tidak ada duplikat login
            $table->string('username')->unique();

            // Kolom password (disimpan dalam bentuk hash bcrypt)
            $table->string('password');

            // Kolom level untuk menentukan peran user ('user', 'admin', dll)
            $table->string('level')->default('user');

            // Kolom nama lengkap pengguna
            $table->string('nama_lengkap');

            // Kolom telepon opsional (boleh kosong)
            $table->string('telepon')->nullable();

            // Kolom timestamps otomatis (created_at & updated_at)
            $table->timestamps();
        });
    }

    /**
     * Rollback migration (menghapus tabel users)
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
