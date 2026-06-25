<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoAcademicoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('periodo_academico')->insert([
            [
                'Semestre'     => '2026-I',
                'Fecha_Inicio' => '2026-03-01',
                'Fecha_Fin'    => '2026-07-31',
            ],
        ]);
    }
}