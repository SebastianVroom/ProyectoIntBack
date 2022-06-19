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
        Schema::table('contratos',function(Blueprint $table){
            $table->foreign('clientesId')->references('id')->on('clientes');
        });
        Schema::table('citas',function(Blueprint $table){
            $table->foreign('servicioId')->references('id')->on('servicios');
            $table->foreign('responsableId')->references('id')->on('responsables');
        });
        
        Schema::table('horarios',function(Blueprint $table){
            $table->foreign('servicioId')->references('id')->on('servicios');
            $table->foreign('responsableId')->references('id')->on('responsables');
        });

        Schema::table('responsables',function(Blueprint $table){
            $table->foreign('id')->references('id')->on('empleados');
            $table->foreign('servicioId')->references('id')->on('servicios');
        });
        Schema::table('horarios_empleados',function(Blueprint $table){
            $table->foreign('empleadoId')->references('id')->on('empleados');
            $table->foreign('horarioId')->references('id')->on('horarios');
        });

        Schema::table('servicios_kits',function(Blueprint $table){
            $table->foreign('servicioId')->references('id')->on('servicios');
            $table->foreign('kitId')->references('id')->on('kits');
        });
        Schema::table('kits_contratos',function(Blueprint $table){
            $table->foreign('contratoId')->references('id')->on('contratos');
            $table->foreign('kitId')->references('id')->on('kits');
        });

        Schema::table('contrato_habitaciones',function(Blueprint $table){
            $table->foreign('habitacionId')->references('id')->on('habitaciones');
            $table->foreign('contratoId')->references('id')->on('contratos');
        });

        Schema::table('empleados',function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users');
        });

        Schema::table('clientes',function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users');
        });

        Schema::table('administradores',function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos',function(Blueprint $table){
            $table->dropForeignId('contratos_clientesId_foreign');
        });
        Schema::table('citas',function(Blueprint $table){
            $table->dropForeignId('citas_servicioId_foreign');
        });
        
        Schema::table('horarios',function(Blueprint $table){
            $table->dropForeignId('horarios_servicioId_foreign');
            $table->dropForeignId('horarios_responsableId_foreign');
        });

        Schema::table('responsables',function(Blueprint $table){
            $table->dropForeignId('responsables_id_foreign');
            $table->dropForeignId('responsables_servicioId_foreign');
        });
        Schema::table('horarios_empleados',function(Blueprint $table){
            $table->dropForeignId('horarios_empleados_empleadoId_foreign');
            $table->dropForeignId('horarios_empleados_horarioId_foreign');
        });

        Schema::table('servicios_kits',function(Blueprint $table){
            $table->dropForeignId('servicios_kits_servicioId_foreign');
            $table->dropForeignId('servicios_kits_kitId_foreign');
        });
        Schema::table('kits_contratos',function(Blueprint $table){
            $table->dropForeignId('kits_contratos_contratoId_foreign');
            $table->dropForeignId('kits_contratos_kitId_foreign');
        });

    }
};
