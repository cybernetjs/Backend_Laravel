<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nota')->insert([
            [
                'NotaParcial'      => 14.00,
                'NotaFinal'        => 15.00,
                'Estado'           => 'APROBADO',
                'Codigo_Matricula' => 1,
            ],
            [
                'NotaParcial'      => 12.00,
                'NotaFinal'        => 13.00,
                'Estado'           => 'APROBADO',
                'Codigo_Matricula' => 2,
            ],
        ]);
    }
}