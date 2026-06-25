<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('facultad')->insert([
            [
                'Nombre' => 'Facultad de Ingeniería',
                'Decano' => 'Dr. Mario Ruiz',
            ],
        ]);
    }
}
