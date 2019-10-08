<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulerEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduler_email', function (Blueprint $table) {
            $table->bigIncrements('id_scheduler_email');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_dokumen')->unsigned();
            $table->string('status_dokumen', 80)->nullable();
            $table->date('schedule_time');
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
        Schema::dropIfExists('scheduler_email');
    }
}
