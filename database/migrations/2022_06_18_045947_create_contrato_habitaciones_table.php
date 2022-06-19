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
        Schema::create('contrato_habitaciones', function (Blueprint $table) {
            $table->unsignedBigInteger('habitacionId');
            $table->unsignedBigInteger('contratoId');
            $table->primary(['habitacionId','contratoId']);
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
        Schema::dropIfExists('contrato_habitaciones');
    }
};
