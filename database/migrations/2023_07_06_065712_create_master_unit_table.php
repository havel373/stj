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
        Schema::create('master_unit', function (Blueprint $table) {
            $table->id();
            $table->string('no_pol')->nullable();
            $table->string('type_unit')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->unsignedBigInteger('id_driver')->nullable();
            $table->foreign('id_driver')->references('id')->on('master_driver');
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
        Schema::dropIfExists('master_unit');
    }
};
