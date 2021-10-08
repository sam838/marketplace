<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateDreturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dretur', function (Blueprint $table) {
            $table->integer('id_transaksi');
            $table->integer('id_dsneaker');
            $table->integer('jumlah');
            $table->string('alasan_pengembalian');
            $table->string('status_pengembalian');
            $table->string('resi_pengembalian');
            $table->string('id_seller');
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
        Schema::dropIfExists('dretur');
    }
}
