<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Toko
 *
 * Model ini merepresentasikan tabel 'toko' pada database.
 * Model digunakan sebagai penghubung antara tabel database dan logika aplikasi,
 * sehingga data bisa diambil, dibuat, diperbarui, ataupun dihapus dengan mudah.
 */
class Toko extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel yang digunakan oleh model ini.
     * Secara default Laravel akan memakai nama jamak ("tokos"),
     * sehingga kita perlu menentukan manual karena nama tabel menggunakan bentuk tunggal.
     *
     * @var string
     */
    protected $table = 'toko';

    /**
     * Kolom-kolom yang diizinkan untuk mass assignment.
     * Artinya kolom ini bisa diisi langsung saat melakukan create() atau update().
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_toko',                //nama toko
        'alamat',                   //alamat toko           
        'nomor_telepon',            //nomor telepon toko
    ];

    /**
     * Relasi One-to-Many dengan model Produk.
     *
     * Penjelasan:
     * - Satu toko bisa memiliki banyak produk.
     * - Foreign key pada tabel 'produk' adalah 'id_toko'.
     * - Dengan relasi ini, kita bisa memanggil:
     *        $toko->produks  untuk mengambil semua produk di toko tersebut.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_toko');
    }
}
