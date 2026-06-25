<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('curso')->insert([
            [
                'Nombre'              => 'Inteligencia Artificial',
                'Creditos'            => 4,
                'HorasTeoria'         => 2,
                'HorasPractica'       => 4,
                'Semestre'            => 9,
                'Codigo_PlanEstudios' => 1,
            ],
            [
                'Nombre'              => 'Tesis I',
                'Creditos'            => 4,
                'HorasTeoria'         => 2,
                'HorasPractica'       => 4,
                'Semestre'            => 10,
                'Codigo_PlanEstudios' => 1,
            ],
        ]);
    }
}
