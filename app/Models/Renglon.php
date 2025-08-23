<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renglon extends Model
{
    protected $table = 'cat_renglon';
    
    protected $fillable = [
        'nombre',
        'activo',
    ];
    
    protected $casts = [
        'activo' => 'boolean',
    ];
}
