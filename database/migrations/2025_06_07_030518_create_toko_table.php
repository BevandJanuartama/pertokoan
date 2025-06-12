<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokoTable extends Migration
{
    // Fungsi up() untuk membuat tabel 'toko'
    public function up()
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->id();                         // Kolom ID (primary key)
            $table->string('nama_toko');          // Nama toko
            $table->string('alamat');             // Alamat toko
            $table->string('nomor_telepon');      // Nomor telepon toko
            $table->timestamps();                 // Kolom created_at & updated_at
        });
    }

    // Fungsi down() untuk menghapus tabel 'toko'
    public function down()
    {
        Schema::dropIfExists('toko');
    }
}
