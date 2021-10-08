<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_post', function (Blueprint $table) {
            $table->bigIncrements('id_rpost');
            $table->integer('id_user');
            $table->integer('id_post');
            $table->string('komentar_post');
            $table->smallInteger('thumbs');
            $table->smallInteger('status_claim');
            $table->integer('rpost_up');
            $table->integer('rpost_down');
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
        Schema::dropIfExists('review_post');
    }
}
