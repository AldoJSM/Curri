<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyect', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_proyecto');
            $table->string('Descripcion');
            $table->date('Fecha');
            $table->string('Puesto');
            $table->string('Empresa');
            $table->string('URL_repositorio');
            $table->string('Imagen');
            //relacion con tabla profile
            $table->foreignId('profile_id')->constrained('profile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyect');
    }
};
