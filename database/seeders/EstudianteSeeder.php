<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estudiante')->insert([
            [
                'Nombre'              => 'Juan',
                'Apellidos'           => 'Pérez López',
                'DNI'                 => '12345678',
                'Direccion'           => 'Jr. Los Pinos 123, Huancayo',
                'Codigo_Especialidad' => 1,
            ],
        ]);
    }
}