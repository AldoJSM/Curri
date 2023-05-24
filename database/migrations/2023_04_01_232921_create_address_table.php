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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->integer('Numero_calle');
            $table->string('Calle');
            $table->string('Colonia');
            //relacionar con tabla municipio
            $table->foreignId('municipio_id')->constrained('municipio');
            //relacionar con tabla state
            $table->foreignId('state_id')->constrained('state');
            //relacionar con tabla country
            $table->foreignId('country_id')->constrained('country');
            $table->integer('Codigo_postal');
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
        Schema::dropIfExists('address');
    }
};
