<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            FacultadSeeder::class,
            EspecialidadSeeder::class,
            PlanEstudiosSeeder::class,
            PeriodoAcademicoSeeder::class,
            DocenteSeeder::class,
            EstudianteSeeder::class,
            CursoSeeder::class,
            SeccionSeeder::class,
            MatriculaSeeder::class,
            NotaSeeder::class,
        ]);
    }
}