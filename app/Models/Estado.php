<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'cat_estado';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'activo'
    ];
    
    protected $casts = [
        'activo' => 'boolean'
    ];
}
