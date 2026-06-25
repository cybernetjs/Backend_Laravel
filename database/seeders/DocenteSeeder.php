<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocenteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('docente')->insert([
            [
                'Nombre'    => 'Carlos',
                'Apellidos' => 'Ruiz Perez',
                'Categoria' => 'Principal',
                'Email'     => 'carlos.ruiz@uncp.edu.pe',
            ],
        ]);
    }
}