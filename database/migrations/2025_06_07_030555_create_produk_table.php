<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration ini digunakan untuk membuat tabel 'produk'
 * yang menyimpan data produk milik toko tertentu.
 *
 * Kolom yang disediakan:
 * - id: primary key
 * - id_toko: foreign key ke tabel 'toko'
 * - nama_produk: nama produk
 * - harga: harga produk (decimal)
 * - stok: jumlah stok tersedia
 * - timestamps: created_at & updated_at
 */
class CreateProdukTable extends Migration
{
    /**
     * Jalankan migration (membuat tabel 'produk')
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            // Kolom ID utama (auto increment)
            $table->id();

            // Foreign key ke tabel 'toko', hapus produk jika toko dihapus
            $table->foreignId('id_toko')->constrained('toko')->onDelete('cascade');

            // Nama produk
            $table->string('nama_produk');

            // Harga produk dengan presisi 10 digit dan 2 angka desimal
            $table->decimal('harga', 10, 2);

            // Stok produk
            $table->integer('stok');

            // Kolom timestamps otomatis (created_at & updated_at)
            $table->timestamps();
        });
    }

    /**
     * Rollback migration (menghapus tabel 'produk')
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
