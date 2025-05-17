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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('status_autorizacion')->default("")->nullable();
            $table->string('detalle')->default("")->nullable();
            $table->unsignedBigInteger('propiedad_id')->nullable();
            $table->unsignedBigInteger('sub_propiedad_id')->nullable();
            $table->unsignedBigInteger('guardia_id')->nullable();
            $table->unsignedBigInteger('vehiculo_id')->nullable();
            $table->unsignedBigInteger('ingresante_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // user de registro
            $table->timestamps();
            $table->foreign('propiedad_id')->references('id')->on('propiedades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('sub_propiedad_id')->references('id')->on('sub_propiedades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('ingresante_id')->references('id')->on('ingresantes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('guardia_id')->references('id')->on('guardias')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
