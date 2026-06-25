<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('seccion', function (Blueprint $table) {
        $table->integer('Codigo')->autoIncrement();
        $table->string('Nombre', 20);
        $table->integer('Aforo');
        $table->integer('Codigo_Curso');
        $table->integer('Codigo_Docente');
        $table->integer('Codigo_PeriodoAcademico');
        $table->foreign('Codigo_Curso')
              ->references('Codigo')->on('curso')
              ->onUpdate('cascade')->onDelete('restrict');
        $table->foreign('Codigo_Docente')
              ->references('Codigo')->on('docente')
              ->onUpdate('cascade')->onDelete('restrict');
        $table->foreign('Codigo_PeriodoAcademico')
              ->references('Id')->on('periodo_academico')
              ->onUpdate('cascade')->onDelete('restrict');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion');
    }
};
