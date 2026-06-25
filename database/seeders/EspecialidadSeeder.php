<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('especialidad')->insert([
            [
                'Nombre'          => 'Ingeniería de Sistemas',
                'Modalidad'       => 'Presencial',
                'Codigo_Facultad' => 1,
            ],
        ]);
    }
}
