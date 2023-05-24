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
        Schema::create('lenguage', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_lenguaje');
            $table->string('Descripcion');
            $table->string('Imagen');
            $table->string('Documentacion_URL');
            $table->string('Nivel');
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
        Schema::dropIfExists('lenguage');
    }
};
