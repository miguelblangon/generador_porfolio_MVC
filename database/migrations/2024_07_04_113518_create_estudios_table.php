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
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plantilla_usuario_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre')->nullable();
            $table->integer('year_inicio')->nullable();
            $table->string('year_fin')->nullable();
            $table->string('centro')->nullable();
            $table->text('contenido')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios');
    }
};
