<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->integer('id_kota');
            $table->string('username');
            $table->string('password');
            $table->string('nama');
            $table->string('email');
            $table->tinyInteger('status_verifikasi');
            $table->string('jenis_user');
            $table->smallInteger('status_ban');
            $table->string('alamat_user');
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
        Schema::dropIfExists('user');
    }
}
