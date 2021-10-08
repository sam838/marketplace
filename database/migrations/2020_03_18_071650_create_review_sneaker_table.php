<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewSneakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_sneaker', function (Blueprint $table) {
            $table->bigIncrements('id_rsneaker');
            $table->integer('id_sneaker');
            $table->integer('id_user');
            $table->integer('rate');
            $table->string('komentar_sneaker');
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
        Schema::dropIfExists('review_sneaker');
    }
}
