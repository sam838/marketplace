<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSneakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sneaker', function (Blueprint $table) {
            $table->bigIncrements('id_sneaker');
            $table->integer('id_user');
            $table->integer('id_kategori');
            $table->string('nama_sneaker');
            $table->string('brand_sneaker');
            $table->integer('harga_sneaker');
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
        Schema::dropIfExists('sneaker');
    }
}
