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
        Schema::create('kits_contratos', function (Blueprint $table) {
            $table->unsignedBigInteger('contratoId');
            $table->unsignedBigInteger('kitId');
            $table->primary(['contratoId','kitId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kits_contratos');
    }
};
