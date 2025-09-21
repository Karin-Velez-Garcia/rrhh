<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatTiposDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the cat_tipos_documento table with initial data.
     */
    public function run()
    {
        DB::table('cat_tipos_documento')->insert([
            [
                'nombre' => 'DPI',
                'requiere_vencimiento' => 0,
                'es_obligatorio_ingreso' => 1,
                'dias_aviso_vencimiento' => 0
            ],
            [
                'nombre' => 'Antecedentes Penales',
                'requiere_vencimiento' => 0,
                'es_obligatorio_ingreso' => 1,
                'dias_aviso_vencimiento' => 0
            ],
            [
                'nombre' => 'Antecedentes Policíacos',
                'requiere_vencimiento' => 0,
                'es_obligatorio_ingreso' => 1,
                'dias_aviso_vencimiento' => 0
            ],
            [
                'nombre' => 'Licencia de Conducir',
                'requiere_vencimiento' => 1,
                'es_obligatorio_ingreso' => 0,
                'dias_aviso_vencimiento' => 30
            ]
        ]);
    }
}