<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;

    protected $table = 'cat_motivo';

    protected $fillable = [
        'nombre',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}