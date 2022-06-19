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
        Schema::create('horarios_empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('empleadoId');
            $table->unsignedBigInteger('horarioId');
            $table->date('fecha');
            $table->primary(['empleadoId','horarioId','fecha']);
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
        Schema::dropIfExists('horarios_empleados');
    }
};
