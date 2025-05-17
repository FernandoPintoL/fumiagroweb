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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->nullable();
            $table->string('detalle')->default('')->nullable();
            $table->string('direccion')->default('')->nullable();
            $table->string('latitud')->default('')->nullable();
            $table->string('longitud')->default('')->nullable();
            $table->unsignedBigInteger('propietario_id')->nullable(); // algun user administrador
            $table->unsignedBigInteger('tipo_propiedad_id')->nullable();
            $table->timestamps();
            $table->foreign( 'propietario_id' )->references( 'id' )->on( 'propietarios' )->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign( 'tipo_propiedad_id' )->references( 'id' )->on( 'tipo_propiedades' )->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
