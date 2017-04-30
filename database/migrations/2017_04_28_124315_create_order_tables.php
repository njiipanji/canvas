<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_pesanan')->unique();
            $table->string('nama_pesanan');
            $table->string('jenis_pesanan');
            $table->integer('jumlah_pesanan');
            $table->integer('dp_pesanan');
            $table->integer('total_harga_pesanan');
            $table->string('keterangan_pesanan');
            $table->string('progres_pesanan');
            $table->string('nama_pemesan');
            $table->string('nomor_pemesan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
