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
        Schema::create('master_customer', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer')->nullable();
            $table->longtext('address')->nullable();
            $table->string('pic')->nullable();
            $table->string('email')->nullable();
            $table->string('owner')->nullable();
            $table->string('no_hp_pic')->nullable();
            $table->enum('tipe', ['bml','stj'])->default(null)->nullable();
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
        Schema::dropIfExists('master_customer');
    }
};
