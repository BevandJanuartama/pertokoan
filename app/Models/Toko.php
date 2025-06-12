<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'toko';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_toko',
        'alamat',
        'nomor_telepon',
    ];

    // Relasi one-to-many: satu toko punya banyak produk
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_toko');
    }
}
