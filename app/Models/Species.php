<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;
    protected $fillable = [
      'image',
      'nombre',
      'sexo',
      'msnm',
      'fotocolector', 
      'laboratorio',
      'responsable_de_montado',
      'proyecto_id',
      'institucion_id',
      'coleccion_id',
      'municipio_id',
      'region_id',
      'clima_id'

    
     

    ];

    public function municipios(){
      return $this->hasMany(municipio::class);
    }
    public function regions(){
      return $this->hasMany(region::class);
    }
    public function climas(){
      return $this->hasMany(clima::class);
    }
}
