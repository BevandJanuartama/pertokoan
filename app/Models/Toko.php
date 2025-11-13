<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Toko
 *
 * Merepresentasikan tabel 'toko' di database.
 * Setiap toko bisa memiliki banyak produk.
 */
class Toko extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     */
    protected $table = 'toko';

    /**
     * Kolom-kolom yang bisa diisi secara massal (mass assignable).
     */
    protected $fillable = [
        'nama_toko',
        'alamat',
        'nomor_telepon',
    ];

    /**
     * Relasi one-to-many dengan model Produk.
     * Satu toko bisa memiliki banyak produk.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_toko');
    }
}
