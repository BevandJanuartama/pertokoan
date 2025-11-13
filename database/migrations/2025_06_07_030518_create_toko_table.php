<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration ini digunakan untuk membuat tabel 'toko'
 * yang menyimpan data toko.
 *
 * Kolom yang disediakan:
 * - id: primary key
 * - nama_toko: nama toko
 * - alamat: alamat toko
 * - nomor_telepon: nomor telepon toko
 * - timestamps: created_at & updated_at
 */
class CreateTokoTable extends Migration
{
    /**
     * Jalankan migration (membuat tabel 'toko')
     */
    public function up()
    {
        Schema::create('toko', function (Blueprint $table) {
            // Kolom ID utama (auto increment)
            $table->id();

            // Nama toko
            $table->string('nama_toko');

            // Alamat toko
            $table->string('alamat');

            // Nomor telepon toko
            $table->string('nomor_telepon');

            // Kolom timestamps otomatis (created_at & updated_at)
            $table->timestamps();
        });
    }

    /**
     * Rollback migration (menghapus tabel 'toko')
     */
    public function down()
    {
        Schema::dropIfExists('toko');
    }
}
