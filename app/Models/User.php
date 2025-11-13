<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Model User
 *
 * Merepresentasikan tabel 'users' di database.
 * Digunakan untuk autentikasi dan manajemen user.
 */
class User extends Authenticatable
{
    /** 
     * Menggunakan trait HasFactory untuk factory testing/seed.
     * Menggunakan trait Notifiable untuk notifikasi (email, database, dll)
     */
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi secara massal (mass assignable)
     *
     * @var array<string>
     */
    protected $fillable = [
        'username',      // Username login
        'password',      // Password (akan di-hash)
        'level',         // Level user (admin/user)
        'nama_lengkap',  // Nama lengkap user
        'telepon',       // Nomor telepon, bisa null
    ];

    /**
     * Kolom yang harus disembunyikan saat serialisasi (misal saat JSON output)
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut tertentu agar otomatis dikonversi
     * 
     * - 'email_verified_at' otomatis jadi datetime
     * - 'password' otomatis di-hash saat disimpan
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
