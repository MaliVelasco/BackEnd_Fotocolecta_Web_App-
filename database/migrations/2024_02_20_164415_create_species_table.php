<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->string('nombre');
            $table->float('msnm');
            $table->string('fotocolector');
            $table->string('laboratorio');
            $table->string('responsable_de_montado');   

            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('coleccion_id');
            $table->foreign('coleccion_id')->references('id')->on('colecciones')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('institucion_id');
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('clima_id');
            $table->foreign('clima_id')->references('id')->on('climas')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('species');
    }
};
