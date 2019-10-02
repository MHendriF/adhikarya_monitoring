<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_dokumen', function (Blueprint $table) {
            $table->bigIncrements('id_pic_dokumen');

            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_dokumen')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen');

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
        Schema::dropIfExists('pic_dokumen');
    }
}
