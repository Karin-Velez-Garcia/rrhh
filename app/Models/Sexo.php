<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cat_sexo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'activo',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'activo' => 'boolean',
    ];
}
