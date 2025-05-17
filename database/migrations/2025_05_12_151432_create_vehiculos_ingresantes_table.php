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
        Schema::create('vehiculos_ingresantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehiculo_id')->nullable()->default(null);
            $table->unsignedBigInteger('ingresantes_id')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('vehiculo_id')
                ->references('id')
                ->on('vehiculos')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('ingresantes_id')
                ->references('id')
                ->on('ingresantes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos_ingresantes');
    }
};
