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
        Schema::create('guardias', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("")->nullable();
            $table->string('nroDocumento')->default("")->nullable();
            $table->string('celular')->default("")->nullable();
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign( 'tipo_documento_id' )->references( 'id' )->on( 'tipo_documentos' )->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardias');
    }
};
