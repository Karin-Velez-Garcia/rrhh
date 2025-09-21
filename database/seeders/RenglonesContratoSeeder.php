<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RenglonesContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the renglones_contrato table with initial data.
     */
    public function run()
    {
        DB::table('renglones_contrato')->insert([
            [
                'codigo' => '011',
                'nombre' => 'Renglón 011',
                'descripcion' => 'Personal permanente'
            ],
            [
                'codigo' => '029',
                'nombre' => 'Renglón 029',
                'descripcion' => 'Personal por contrato administrativo'
            ]
        ]);
    }
}