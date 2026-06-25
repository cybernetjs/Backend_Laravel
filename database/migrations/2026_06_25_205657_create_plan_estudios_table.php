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
    Schema::create('plan_estudios', function (Blueprint $table) {
        $table->integer('Codigo')->autoIncrement();
        $table->string('Version', 20);
        $table->integer('Anio');
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
        Schema::dropIfExists('plan_estudios');
    }
};
