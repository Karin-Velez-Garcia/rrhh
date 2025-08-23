<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'cat_tipo_documento';

    protected $fillable = [
        'nombre',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    // Scope para obtener solo los tipos de documento activos
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    // Accessor para mostrar el estado como texto
    public function getEstadoTextoAttribute()
    {
        return $this->activo ? 'Activo' : 'Inactivo';
    }
}