<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Produk
 *
 * Model ini merepresentasikan tabel 'produk' pada database.
 * Digunakan untuk mengelola data produk yang dimiliki oleh suatu toko.
 */
class Produk extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     * Ditentukan secara manual karena nama tabel tidak menggunakan bentuk jamak.
     *
     * @var string
     */
    protected $table = 'produk';

    /**
     * Daftar kolom yang diizinkan untuk mass assignment.
     * Dengan fillable, hanya kolom ini yang boleh diisi saat melakukan create/update,
     * sehingga mencegah terjadinya mass assignment vulnerability.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_produk', // Nama produk
        'harga',       // Harga produk
        'stok',        // Jumlah stok produk
        'id_toko',     // Foreign key ke tabel Toko
    ];

    /**
     * Relasi Many-to-One ke model Toko.
     *
     * Penjelasan:
     * - Setiap produk pasti dimiliki oleh satu toko.
     * - Foreign key 'id_toko' pada tabel produk menghubungkannya ke tabel toko.
     * - Dengan relasi ini, kita dapat memanggil:
     *        $produk->toko  untuk mendapatkan data toko pemilik produk.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
