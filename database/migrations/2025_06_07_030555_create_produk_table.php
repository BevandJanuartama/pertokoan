<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    // Membuat tabel 'produk' di database
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();  // ID produk sebagai primary key
            
            // Foreign key ke tabel 'toko'
            $table->foreignId('id_toko')->constrained('toko')->onDelete('cascade');

            $table->string('nama_produk');     // Nama produk
            $table->decimal('harga', 10,);   // Harga produk
            $table->integer('stok');           // Jumlah stok produk
            
            $table->timestamps();              // Kolom created_at dan updated_at
        });
    }

    // Hapus tabel 'produk' saat rollback
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
