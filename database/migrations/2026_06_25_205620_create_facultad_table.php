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
    Schema::create('facultad', function (Blueprint $table) {
        $table->integer('Codigo')->autoIncrement();
        $table->string('Nombre', 100);
        $table->string('Decano', 100);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultad');
    }
};
