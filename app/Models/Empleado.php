<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'codigo',
        'nombres',
        'apellidos',
        'dpi',
        'nit',
        'igss',
        'fecha_nacimiento',
        'estado_civil_id',
        'sexo_id',
        'telefono',
        'email',
        'direccion',
        'contacto_emergencia',
        'telefono_emergencia',
        'banco_id',
        'tipo_cuenta_id',
        'cuenta_bancaria',
        'fecha_ingreso',
        'fecha_egreso',
        'supervisor_id',
        'unidad_id',
        'puesto_actual_id',
        'activo'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_ingreso' => 'date',
        'fecha_egreso' => 'date',
        'activo' => 'boolean',
    ];

    // Relaciones
    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'estado_civil_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Empleado::class, 'supervisor_id');
    }

    public function subordinados()
    {
        return $this->hasMany(Empleado::class, 'supervisor_id');
    }

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

    public function getNombreCompletoAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }
}