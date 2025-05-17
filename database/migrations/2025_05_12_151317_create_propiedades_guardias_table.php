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
        Schema::create('propiedades_guardias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propiedad_id')->nullable();
            $table->unsignedBigInteger('guardia_id')->nullable();
            $table->json('permisos')->nullable(); // Almacenar permisos específicos por condominio
            $table->string('role')->default('')->nullable();
            $table->string('permission')->default('')->nullable();
            $table->timestamps();
            $table->foreign('propiedad_id')->references('id')->on('propiedades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('guardia_id')->references('id')->on('guardias')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades_guardias');
    }
};
