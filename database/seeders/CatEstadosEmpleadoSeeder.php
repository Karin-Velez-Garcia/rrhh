<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatEstadosEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the cat_estados_empleado table with initial data.
     */
    public function run()
    {
        DB::table('cat_estados_empleado')->insert([
            [
                'nombre' => 'Activo',
                'es_final' => 0
            ],
            [
                'nombre' => 'Inactivo',
                'es_final' => 0
            ],
            [
                'nombre' => 'Suspendido',
                'es_final' => 0
            ],
            [
                'nombre' => 'Baja',
                'es_final' => 1
            ]
        ]);
    }
}