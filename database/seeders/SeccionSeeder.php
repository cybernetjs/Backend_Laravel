<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('seccion')->insert([
            [
                'Nombre'                  => 'A',
                'Aforo'                   => 30,
                'Codigo_Curso'            => 1,
                'Codigo_Docente'          => 1,
                'Codigo_PeriodoAcademico' => 1,
            ],
            [
                'Nombre'                  => 'A',
                'Aforo'                   => 30,
                'Codigo_Curso'            => 2,
                'Codigo_Docente'          => 1,
                'Codigo_PeriodoAcademico' => 1,
            ],
        ]);
    }
}