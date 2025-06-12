<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'produk';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'id_toko'
    ];

    // Relasi ke model Toko (Many to One)
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
