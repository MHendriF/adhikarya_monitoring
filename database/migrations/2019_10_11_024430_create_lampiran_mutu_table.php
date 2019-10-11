<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampiranMutuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampiran_mutu', function (Blueprint $table) {
            $table->bigIncrements('id_lampiran_mutu');
            $table->bigInteger('id_dokumen')->unsigned();
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_file',200);
            $table->string('path',80);
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
        Schema::dropIfExists('lampiran_mutu');
    }
}
