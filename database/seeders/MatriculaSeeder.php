<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matricula')->insert([
            [
                'FechaMatricula'          => '2026-03-01',
                'Codigo_Estudiante'       => 1,
                'Codigo_Seccion'          => 1,
                'Codigo_PeriodoAcademico' => 1,
            ],
            [
                'FechaMatricula'          => '2026-03-01',
                'Codigo_Estudiante'       => 1,
                'Codigo_Seccion'          => 2,
                'Codigo_PeriodoAcademico' => 1,
            ],
        ]);
    }
}
