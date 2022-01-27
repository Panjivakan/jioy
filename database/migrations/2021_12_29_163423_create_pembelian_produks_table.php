<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_produks', function (Blueprint $table) {
            $table->id();
            $table->integer('pembelian_id');
            $table->integer('pelanggan_id');
            $table->integer('produk_id');
            $table->string('nama_produk', 100);
            $table->string('foto_produk', 100);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subharga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_produks');
    }
}
