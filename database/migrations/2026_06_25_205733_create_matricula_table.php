<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->integer('Codigo')->autoIncrement();
            $table->date('FechaMatricula');
            $table->integer('Codigo_Estudiante');
            $table->integer('Codigo_Seccion');
            $table->integer('Codigo_PeriodoAcademico');
            $table->unique(['Codigo_Estudiante','Codigo_Seccion','Codigo_PeriodoAcademico'], 'uq_mat_est_sec_per');
            $table->foreign('Codigo_Estudiante')
                  ->references('Codigo')->on('estudiante')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('Codigo_Seccion')
                  ->references('Codigo')->on('seccion')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('Codigo_PeriodoAcademico')
                  ->references('Id')->on('periodo_academico')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matricula');
    }
};