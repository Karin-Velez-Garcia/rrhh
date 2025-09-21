<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatTiposPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the cat_tipos_permiso table with initial data.
     */
    public function run()
    {
        DB::table('cat_tipos_permiso')->insert([
            [
                'nombre' => 'Vacaciones',
                'descuenta_saldo' => 1,
                'requiere_soporte' => 0,
                'dias_maximo_anual' => 15
            ],
            [
                'nombre' => 'Permiso con goce',
                'descuenta_saldo' => 0,
                'requiere_soporte' => 1,
                'dias_maximo_anual' => null
            ],
            [
                'nombre' => 'Permiso sin goce',
                'descuenta_saldo' => 0,
                'requiere_soporte' => 0,
                'dias_maximo_anual' => null
            ],
            [
                'nombre' => 'Médico',
                'descuenta_saldo' => 0,
                'requiere_soporte' => 1,
                'dias_maximo_anual' => null
            ]
        ]);
    }
}