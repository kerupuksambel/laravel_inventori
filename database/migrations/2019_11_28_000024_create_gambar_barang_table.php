<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_barang', function (Blueprint $table) {
            $table->bigIncrements('gambar_id');
            $table->unsignedBigInteger('gambar_barang_id');
            $table->foreign('gambar_barang_id')->references('barang_id')->on('barang');
            $table->string('gambar_path', 255);
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
        Schema::dropIfExists('gambar_barang');
    }
}
