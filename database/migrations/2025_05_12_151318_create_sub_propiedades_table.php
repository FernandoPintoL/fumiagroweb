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
        Schema::create('sub_propiedades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propiedad_id')->default(1)->nullable();
            $table->string('name')->default("")->nullable();
            $table->string('detalle')->default("")->nullable();
            $table->unsignedInteger('tipo_espacios_id')->default(1)->nullable();
            $table->timestamps();
            $table->foreign( 'propiedad_id' )->references( 'id' )->on('propiedades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign( 'tipo_espacios_id' )->references( 'id' )->on('tipo_espacios')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_propiedades');
    }
};
