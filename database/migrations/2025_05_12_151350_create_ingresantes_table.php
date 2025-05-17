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
        Schema::create('ingresantes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->string('nroDocumento')->unique();
            $table->string('celular')->default('')->nullable();
            $table->boolean('is_permitido')->default(true)->nullable(); //Esta es mi lista negra
            $table->longText('description_is_no_permitido')->default('')->nullable();
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->timestamps();
            $table->foreign( 'tipo_documento_id' )->references( 'id' )->on( 'tipo_documentos' )->noActionOnDelete()->noActionOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresantes');
    }
};
