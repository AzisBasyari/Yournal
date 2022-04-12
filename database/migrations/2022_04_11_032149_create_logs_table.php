<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('aktivitas');
            $table->string('nama_tempat')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tanggal_perjalanan')->nullable();
            $table->time('jam_perjalanan')->nullable();
            $table->float('suhu_tubuh')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('nama_tempat_lama')->nullable();
            $table->string('alamat_lama')->nullable();
            $table->date('tanggal_perjalanan_lama')->nullable();
            $table->time('jam_perjalanan_lama')->nullable();
            $table->float('suhu_tubuh_lama')->nullable();
            $table->text('deskripsi_lama')->nullable();
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
        Schema::dropIfExists('logs');
    }
};
