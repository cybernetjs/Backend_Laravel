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
    Schema::create('periodo_academico', function (Blueprint $table) {
        $table->integer('Id')->autoIncrement();
        $table->string('Semestre', 20);
        $table->date('Fecha_Inicio');
        $table->date('Fecha_Fin');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodo_academico');
    }
};
