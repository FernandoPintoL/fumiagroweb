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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique()->default('')->nullable();
            $table->string('detalle')->default('')->nullable();
            $table->unsignedBigInteger('tipo_vehiculo_id')->nullable();
            $table->timestamps();
            $table->foreign('tipo_vehiculo_id')
                ->references('id')
                ->on('tipo_vehiculos')
                ->noActionOnDelete()
                ->noActionOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
