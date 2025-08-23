<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAlerta extends Model
{
    use HasFactory;

    protected $table = 'cat_tipo_alerta';

    protected $fillable = [
        'nombre',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('activo', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('activo', false);
    }

    // Accessors
    public function getActivoTextoAttribute()
    {
        return $this->activo ? 'Activo' : 'Inactivo';
    }
}