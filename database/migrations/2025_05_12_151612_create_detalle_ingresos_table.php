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
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingreso_id');
            $table->unsignedBigInteger('status_ingreso_id');
            $table->string('tipo_documento')->default('')->nullable();
            $table->timestamps();
            $table->foreign('ingreso_id')->references('id')->on('ingresos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('status_ingreso_id')->references('id')->on('status_ingresos')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ingresos');
    }
};
