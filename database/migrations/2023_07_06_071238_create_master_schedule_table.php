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
        Schema::create('master_schedule', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('id_unit');
            $table->unsignedBigInteger('id_driver');
            $table->unsignedBigInteger('id_customer');
            $table->string('muat')->nullable();
            $table->string('bongkar')->nullable();
            $table->string('note')->nullable();
            $table->string('status');
            $table->foreign('id_unit')->references('id')->on('master_unit');
            $table->foreign('id_driver')->references('id')->on('master_driver');
            $table->foreign('id_customer')->references('id')->on('master_customer');
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
        Schema::dropIfExists('master_schedule');
    }
};
