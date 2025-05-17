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
        Schema::create('galeria_ingresantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ingresante_id")->nullable();
            $table->string('photo_path')->default("")->nullable();
            $table->string("detalle")->default("")->nullable();
            $table->timestamps();
            $table->foreign( "ingresante_id" )->references( "id" )->on("ingresantes")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeria_ingresantes');
    }
};
