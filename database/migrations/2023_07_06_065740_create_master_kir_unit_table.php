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
        Schema::create('master_kir_unit', function (Blueprint $table) {
            $table->id();
            $table->string('no_pol')->nullable();
            $table->unsignedBigInteger('id_unit')->nullable();
            // $table->string('type_unit')->nullable();
            $table->string('tahun_pembuatan')->nullable();
            $table->string('owner')->nullable();
            $table->string('stnk')->nullable();
            $table->string('pajak')->nullable();
            $table->string('kir')->nullable();
            $table->foreign('id_unit')->references('id')->on('master_unit');
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
        Schema::dropIfExists('master_kir_unit');
    }
};
