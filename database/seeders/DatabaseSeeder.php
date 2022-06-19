<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SuperuserSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id'=>1,
                'name'=>'superuser',
                'email'=>'some@mail.com',
                'password'=>Hash::make('12345'),
            ]
        );
        DB::table('administradores')->insert(
            [
                'id'=>1,
            ]
        );
        DB::table('users')->insert(
            [
                'id'=>2,
                'name'=>'ClienteEjemplo',
                'email'=>'asdf@mail.com',
                'password'=>Hash::make('12345'),
            ]
        );
        DB::table('clientes')->insert(
            [
                'id'=>2
            ]
        );
        DB::table('habitaciones')->insert(
            [   
                'id'=>1,
                'localizacion'=>'205',
                'tipo'=>'suite'
            ]
            
        );
        DB::table('habitaciones')->insert(
            [
                'id'=>2,
                'localizacion'=>'206',
                'tipo'=>'suite',
            ]
        );
        DB::table('contratos')->insert(
            [
                'id'=>1,
                'precioTotal'=>58.32,
                'fecha_comiezo'=>'2020-6-6',
                'fecha_final'=>'2020-6-30',
                'clientesId'=>2,
            ]
        );
        DB::table('contrato_habitaciones')->insert(
            [
                'habitacionId'=>1,
                'contratoId'=>1
            ]
        );
        DB::table('contrato_habitaciones')->insert(
            [
                'habitacionId'=>2,
                'contratoId'=>1
            ]
        );
    }
}
