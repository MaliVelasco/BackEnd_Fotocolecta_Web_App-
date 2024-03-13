<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion'
       
    ];

    public function species()
    {
        return $this->hasMany(Species::class);
    }


}
