<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ContratoHabitacion;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\HorariosEmpleadosController;
use App\Http\Controllers\KitContratosController;
use App\Http\Controllers\KitController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ServiciosKitController;
use App\Http\Controllers\ServiciosController;
use App\http\Controllers\AuthController;
use App\Http\Controllers\AdministradorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//rutas publicas
Route::get('/citas',[CitasController::class,'index']);
Route::get('/citas/{id}',[CitasController::class,'show']);

Route::get('/habitacionkit',[ContratoHabitacion::class,'index']);
Route::get('/habitacionkit/{id}',[ContratoHabitacion::class,'show']);

Route::get('/habitacion',[HabitacionController::class,'index']);
Route::get('/habitacion/{id}',[HabitacionController::class,'show']);

Route::get('/kit',[KitController::class,'index']);
Route::get('/kit/{id}',[KitController::class,'show']);;

Route::get('/servicioskit',[ServiciosKitController::class,'index']);
Route::get('/servicioskit/{id}',[ServiciosKitController::class,'show']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout',[AuthController::class,'logout']);
    //user required
});

Route::group(['middleware' => ['auth:sanctum','ability:adminToken,clienteToken']],function(){
    //cliente
    Route::get('/getuserrooms',[ContratoController::class,'getUserContratos']);
    
});


Route::group(['middleware' => ['auth:sanctum','ability:adminToken,empleadoToken']],function(){
    //Employee
    
    Route::get('/horarioempleado',[HorariosEmpleadosController::class,'index']);
    Route::get('/horarioempleado/{id}',[HorariosEmpleadosController::class,'show']);
    
    Route::get('/horario',[HorariosController::class,'index']);
    Route::get('/horario/{id}',[HorariosController::class,'show']);
});


Route::group(['middleware' => ['auth:sanctum','ability:adminToken,responsableToken']],function(){
    //Responsable
    Route::post('/citas',[CitasController::class,'store']);
    Route::put('/citas/{id}',[CitasController::class,'update']);
    Route::delete('/citas/{id}',[CitasController::class,'delete']);

    Route::get('/empleado',[EmpleadoController::class,'index']);
    Route::get('/empleado/{id}',[EmpleadoController::class,'show']);

    Route::post('/horario',[HorariosController::class,'store']);
    Route::put('/horario/{id}',[HorariosController::class,'update']);
    Route::delete('/horario/{id}',[HorariosController::class,'delete']);
        
    Route::post('/horarioempleado',[HorariosEmpleadosController::class,'store']);
    Route::put('/horarioempleado/{id}',[HorariosEmpleadosController::class,'update']);
    Route::delete('/horarioempleado/{id}',[HorariosEmpleadosController::class,'delete']);
    
    Route::get('/servicios',[ServiciosController::class,'index']);
    Route::get('/servicios/{id}',[ServiciosController::class,'show']);
});

Route::group(['middleware' => ['auth:sanctum','ability:adminToken']],function(){
    //Admin only
    
    Route::get('/clientes',[ClienteController::class,'index']);
    Route::get('/clientes/{id}',[ClienteController::class,'show']);
    Route::put('/clientes/{id}',[ClienteController::class,'update']);
    Route::post('/clientes',[ClienteController::class,'store']);
    Route::delete('/clientes/{id}',[ClienteController::class,'delete']);

    Route::get('/contrato',[ContratoController::class,'index']);
    Route::get('/contrato/{id}',[ContratoController::class,'show']);
    Route::post('/contrato',[ContratoController::class,'store']);
    Route::put('/contrato/{id}',[ContratoController::class,'update']);
    Route::delete('/contrato/{id}',[ContratoController::class,'delete']);
    
    Route::get('/kitcontrato',[KitContratosController::class,'index']);
    Route::get('/kitcontrato/{id}',[KitContratosController::class,'show']);
    Route::post('/kitcontrato',[KitContratosController::class,'store']);
    Route::put('/kitcontrato/{id}',[KitContratosController::class,'update']);
    Route::delete('/kitcontrato/{id}',[KitContratosController::class,'delete']);

    Route::post('/empleado',[EmpleadoController::class,'store']);
    Route::put('/empleado/{id}',[EmpleadoController::class,'update']);
    Route::delete('/empleado/{id}',[EmpleadoController::class,'delete']);

    Route::post('/habitacionkit',[ContratoHabitacion::class,'store']);
    Route::put('/habitacionkit/{id}',[ContratoHabitacion::class,'update']);
    Route::delete('/habitacionkit/{id}',[ContratoHabitacion::class,'delete']);

    Route::get('/responsable',[ResponsableController::class,'index']);
    Route::get('/responsable/{id}',[ResponsableController::class,'show']);
    Route::post('/responsable',[ResponsableController::class,'store']);
    Route::put('/responsable/{id}',[ResponsableController::class,'update']);
    Route::delete('/responsable/{id}',[ResponsableController::class,'delete']);

    Route::post('/kit',[KitController::class,'store']);
    Route::put('/kit/{id}',[KitController::class,'update']);
    Route::delete('/kit/{id}',[KitController::class,'delete']);

    Route::post('/servicioskit',[ServiciosKitController::class,'store']);
    Route::put('/servicioskit/{id}',[ServiciosKitController::class,'update']);
    Route::delete('/servicioskit/{id}',[ServiciosKitController::class,'delete']);

    Route::post('/servicios',[ServiciosController::class,'store']);
    Route::put('/servicios/{id}',[ServiciosController::class,'update']);
    Route::delete('/servicios/{id}',[ServiciosController::class,'delete']);

    Route::post('/habitacion',[HabitacionController::class,'store']);
    Route::put('/habitacion/{id}',[HabitacionController::class,'update']);
    Route::delete('/habitacion/{id}',[HabitacionController::class,'delete']);

    Route::get('/admin',[AdministradorController::class,'index']);
    Route::get('/admin/{id}',[AdministradorController::class,'show']);
    Route::put('/admin/{id}',[AdministradorController::class,'update']);
    Route::post('/admin',[AdministradorController::class,'store']);
    Route::delete('/admin/{id}',[AdministradorController::class,'delete']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});