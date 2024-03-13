<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
      
    ];

    public function species()
    {
        return $this->hasMany(Species::class);
    }
    
}
