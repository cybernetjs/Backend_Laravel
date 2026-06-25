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
    Schema::create('docente', function (Blueprint $table) {
        $table->integer('Codigo')->autoIncrement();
        $table->string('Nombre', 100);
        $table->string('Apellidos', 100);
        $table->string('Categoria', 50);
        $table->string('Email', 100)->unique();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente');
    }
};
