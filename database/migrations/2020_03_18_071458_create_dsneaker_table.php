<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsneakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsneaker', function (Blueprint $table) {
            $table->bigIncrements('id_dsneaker');
            $table->integer('id_sneaker');
            $table->float('ukuran_sneaker');
            $table->tinyInteger('status_stok');
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
        Schema::dropIfExists('dsneaker');
    }
}
