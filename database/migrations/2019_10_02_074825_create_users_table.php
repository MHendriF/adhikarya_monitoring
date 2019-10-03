<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('username',50);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_user');
            $table->string('reset_password_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->bigInteger('id_jabatan')->unsigned()->nullable();
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_divisi')->unsigned()->nullable();
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_lembaga')->unsigned()->nullable();
            $table->foreign('id_lembaga')->references('id_lembaga')->on('lembaga')->onUpdate('cascade')->onDelete('cascade');

            $table->rememberToken();
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
