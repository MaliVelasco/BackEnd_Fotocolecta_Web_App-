<?php

use App\Http\Controllers\speciesController;
use App\Http\Controllers\regionController;
use App\Http\Controllers\municipioController;
use App\Http\Controllers\climaController;
use App\Http\Controllers\coleccionesController;
use App\Http\Controllers\proyectosController;
use App\Http\Controllers\institucionesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(speciesController::class)->group(function(){
     Route::post('agregarSpecie', 'newSpecie');
     Route::get('species', 'getSpecies');
     Route::get('specie/{id}', 'getSpeciesById');   
     Route::delete('eliminarSpecie/{id}' , 'deleteSpeciesById');
     Route::post('updateSpecie/{id}', 'updateSpecieById');
});

Route::controller(regionController::class)->group(function(){
    Route::post('nuevaRegion', 'newRegion');
    Route::get('regiones', 'getRegion');
    Route::get('region/{id}', 'getRegionById');
    Route::delete('eliminarRegion/{id}', 'deleteRegionById');
});
Route::controller(climaController::class)->group(function(){
    Route::post('agregarClima', 'newClima');
    Route::get('climas', 'getClima');
    Route::get('clima/{id}', 'getClimaById');
    Route::delete('eliminarClima/{id}', 'deleteClimaById');

});

Route::controller(municipioController::class)->group(function(){ 
    Route::post('nuevoMunicipio', 'newMunicipio');
    Route::get('municipios', 'getMunicipio');
    Route::get('municipio/{id}', 'getMunicipioById');
    Route::delete('eliminarMunicipio/{id}', 'deleteMunicipioById');
});

Route::controller(coleccionesController::class)->group(function(){
    Route::post('agregarColeccion', 'newColeccion');
    Route::get('colecciones', 'getColecciones');
    Route::get('coleccion/{id}', 'getColeccionById');
    Route::delete('eliminarColeccion/{id}', 'deleteColeccionById');
});

Route::controller(institucionesController::class)->group(function(){
    Route::post('agregarInstitucion', 'newInstitucion');
    Route::get('instituciones', 'getInstituciones');
    Route::get('institucion/{id}', 'getInstitucionById');
    Route::delete('eliminarInstitucion/{id}', 'deleteInstitucionById');
});


Route::controller(proyectosController::class)->group(function(){
    Route::post('agregarProyecto', 'newProyecto');
    Route::get('proyectos', 'getProyectos');
    Route::get('proyecto/{id}', 'getProyectoById');
    Route::delete('eliminarProyecto/{id}', 'deleteProyectoById');
});

