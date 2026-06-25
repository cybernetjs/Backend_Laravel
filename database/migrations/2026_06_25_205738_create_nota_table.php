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
    Schema::create('nota', function (Blueprint $table) {
        $table->integer('Codigo')->autoIncrement();
        $table->decimal('NotaParcial', 4, 2)->nullable();
        $table->decimal('NotaFinal', 4, 2)->nullable();
        $table->string('Estado', 20)->default('PENDIENTE');
        $table->integer('Codigo_Matricula')->unique();
        $table->foreign('Codigo_Matricula')
              ->references('Codigo')->on('matricula')
              ->onUpdate('cascade')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
