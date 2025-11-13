<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Produk
 *
 * Merepresentasikan tabel 'produk' di database.
 * Digunakan untuk menyimpan data produk yang dimiliki oleh toko tertentu.
 */
class Produk extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan
     *
     * @var string
     */
    protected $table = 'produk';

    /**
     * Kolom yang bisa diisi secara massal (mass assignable)
     *
     * @var array<string>
     */
    protected $fillable = [
        'nama_produk', // Nama produk
        'harga',       // Harga produk
        'stok',        // Jumlah stok produk
        'id_toko',     // Foreign key ke tabel Toko
    ];

    /**
     * Relasi Produk ke Toko
     *
     * Satu produk dimiliki oleh satu toko (Many-to-One)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
