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
    Schema::create('estudiante', function (Blueprint $table) {
        $table->integer('Codigo')->autoIncrement();
        $table->string('Nombre', 100);
        $table->string('Apellidos', 100);
        $table->string('DNI', 15)->unique();
        $table->string('Direccion', 150)->nullable();
        $table->integer('Codigo_Especialidad');
        $table->foreign('Codigo_Especialidad')
              ->references('Codigo')->on('especialidad')
              ->onUpdate('cascade')->onDelete('restrict');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante');
    }
};
