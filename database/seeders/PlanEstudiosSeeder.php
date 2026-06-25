<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanEstudiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plan_estudios')->insert([
            [
                'Version'             => '2020',
                'Anio'                => 2020,
                'Codigo_Especialidad' => 1,
            ],
        ]);
    }
}