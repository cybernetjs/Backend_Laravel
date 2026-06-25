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
    Schema::create('curso', function (Blueprint $table) {
        $table->integer('Codigo')->autoIncrement();
        $table->string('Nombre', 100);
        $table->integer('Creditos');
        $table->integer('HorasTeoria');
        $table->integer('HorasPractica');
        $table->integer('Codigo_PlanEstudios');
        $table->foreign('Codigo_PlanEstudios')
              ->references('Codigo')->on('plan_estudios')
              ->onUpdate('cascade')->onDelete('restrict');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso');
    }
};
