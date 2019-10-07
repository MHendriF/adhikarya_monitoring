<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->bigIncrements('id_dokumen');
            $table->string('kode_dokumen',100)->unique();
            $table->string('nama_dokumen',400);
            $table->string('status_dokumen',100)->nullable();
            $table->string('keterangan_dokumen',400)->nullable();

            $table->date('deadline_dokumen')->nullable();
            $table->date('tanggal_pengajuan')->nullable();
            $table->date('tanggal_diterima_mk')->nullable();
            $table->date('tanggal_diapprove_mk')->nullable();
            $table->date('tanggal_diapprove_owner')->nullable();
            $table->date('tanggal_diterima_adhikarya')->nullable();

            $table->bigInteger('id_jenis_dokumen')->unsigned();
            $table->foreign('id_jenis_dokumen')->references('id_jenis_dokumen')->on('jenis_dokumen');

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
        Schema::dropIfExists('dokumen');
    }
}
