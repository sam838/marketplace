<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htrans', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->integer('id_user');
            $table->integer('id_kota');
            $table->date('tgl_beli');
            $table->integer('jumlah_barang');
            $table->integer('total');
            $table->string('detail_pengiriman');
            $table->string('status_pengiriman');
            $table->integer('biaya_pengiriman');
            $table->integer('id_seller');
            $table->integer('id_addr');
            $table->string('resi');
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
        Schema::dropIfExists('htrans');
    }
}
