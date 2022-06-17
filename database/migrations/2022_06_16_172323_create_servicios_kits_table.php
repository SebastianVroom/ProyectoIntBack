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
        Schema::create('servicios_kits', function (Blueprint $table) {
            $table->unsignedBigInteger('servicioId');
            $table->unsignedBigInteger('kitId');
            $table->integer('numCitas');
            $table->primary(['servicioId','kitId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_kits');
    }
};
