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
            $table->bigInteger('id_pic_dokumen')->unsigned();
            $table->date('schedule_time');
            $table->string('status_scheduler', 80)->nullable();
            $table->foreign('id_pic_dokumen')->references('id_pic_dokumen')->on('pic_dokumen')->onUpdate('cascade')->onDelete('cascade');

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
