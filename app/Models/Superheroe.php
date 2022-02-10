<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superheroe extends Model
{
    use HasFactory;
    protected $fillable = [
        'personaje',
        'nombre',
        'estado',
        'raza',
        'poder',
        'editorial',
        'raza',
        'genero',
    ];
}
